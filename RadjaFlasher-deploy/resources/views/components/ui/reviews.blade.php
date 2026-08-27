@props(['reviews'])

@php
    $chunks = $reviews->chunk(3);
    $totalReviews = $reviews->count();
    $averageRating = $reviews->avg('rating');
@endphp

<!-- HAPUS wrapper section dan container -->
<div>
    <!-- Header dengan Stats -->
    <div class="text-center mb-16">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-full mb-4 border border-blue-200">
            <span class="h-2 w-2 bg-white rounded-full animate-pulse"></span>
            <span class="text-sm font-semibold">⭐ TESTIMONI PELANGGAN</span>
        </div>

        <!-- Title -->
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
            Ulasan <span class="bg-linear-to-r from-red-600 to-orange-600 bg-clip-text text-transparent">Google Maps</span>
        </h2>

        <!-- Stats Row -->
        <div class="flex flex-wrap justify-center gap-6 mb-6">
            <div class="flex items-center gap-2">
                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                    <span class="text-blue-600 text-sm font-bold">{{ $totalReviews }}</span>
                </div>
                <span class="text-gray-600">Ulasan Ditampilkan</span>
            </div>
            
            <div class="flex items-center gap-2">
                <div class="h-8 w-8 rounded-full bg-yellow-100 flex items-center justify-center">
                    <span class="text-yellow-700 text-sm font-bold">{{ number_format($averageRating, 1) }}</span>
                </div>
                <span class="text-gray-600">Rata-rata Cuplikan</span>
            </div>
        </div>

        <!-- Subtitle -->
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Cuplikan dari {{ $totalReviews }} ulasan asli pelanggan kami di Google Maps
        </p>
    </div>

    <!-- Carousel Container -->
    <div class="mb-16">
        <div 
            x-data="reviewCarousel({{ $chunks->count() }})"
            x-init="init()"
            @mouseenter="pause()"
            @mouseleave="play()"
            class="relative"
        >
            <!-- Slides -->
            <div class="overflow-hidden">
                <div 
                    class="flex transition-transform duration-700 ease-in-out"
                    :style="`transform: translateX(-${currentIndex * 100}%)`"
                >
                    @foreach($chunks as $i => $group)
                    <div class="w-full flex-shrink-0 px-4">
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($group as $review)
                            <div class="relative group bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:border-blue-200 hover:shadow-xl transition-all duration-500">
                                <!-- Rating Badge -->
                                <div class="absolute -top-3 -right-3 h-10 w-10 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center text-white text-sm font-bold shadow-md">
                                    {{ number_format((float) $review['rating'], 1) }}
                                </div>

                                <!-- User Avatar -->
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="relative">
                                        @if(!empty($review['foto_user']))
                                        <img 
                                            src="{{ $review['foto_user'] }}" 
                                            alt="{{ $review['user'] }}"
                                            class="h-12 w-12 rounded-full object-cover border-2 border-white shadow"
                                        >
                                        @else
                                        <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-400 to-cyan-400 flex items-center justify-center shadow">
                                            <span class="text-white font-bold text-lg">
                                                {{ strtoupper(substr($review['user'], 0, 1)) }}
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-bold text-gray-900">{{ $review['user'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $review['waktu'] }}</p>
                                    </div>
                                </div>

                                <!-- Stars -->
                                <div class="flex gap-0.5 mb-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= $review['rating'] ? 'text-yellow-500' : 'text-gray-200' }} text-lg">★</span>
                                    @endfor
                                </div>

                                <!-- Review Text -->
                                <div class="mb-6 relative">
                                    <div class="absolute -top-4 left-0 text-4xl text-blue-100 opacity-50">❝</div>
                                    <p class="text-gray-700 leading-relaxed text-sm relative z-10">
                                        {{ Str::limit($review['review'], 100) }}
                                    </p>
                                </div>

                                <!-- Source Badge -->
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <div class="flex items-center gap-2">
                                        <div class="h-6 w-6 rounded-full bg-blue-100 flex items-center justify-center">
                                            <span class="text-blue-600 text-xs">G</span>
                                        </div>
                                        <span class="text-xs text-gray-600">Google Maps</span>
                                    </div>
                                    <span class="text-blue-500 text-xs group-hover:translate-x-1 transition-transform">→</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Navigation Dots -->
            <div class="flex justify-center gap-3 mt-10">
                @foreach($chunks as $i => $_)
                <button
                    @click="goToSlide({{ $i }})"
                    :class="currentIndex === {{ $i }} 
                        ? 'bg-linear-to-r from-red-500 to-red-400' 
                        : 'bg-gray-300'"
                    class="h-2 rounded-full transition-all duration-500"
                    :style="currentIndex === {{ $i }} ? 'width: 32px' : 'width: 12px'"
                    aria-label="Go to slide {{ $i + 1 }}"
                ></button>
                @endforeach
            </div>

            <!-- Auto-play Indicator -->
            <div class="flex items-center justify-center gap-2 mt-6">
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <span class="flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                    <span>Berganti otomatis setiap 8 detik</span>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="text-center">
        <div class="inline-flex flex-col items-center gap-6">
            <!-- Trust Badges -->
            <div class="flex flex-wrap justify-center gap-4">
                <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-full border border-gray-200 shadow-sm">
                    <span class="text-green-600">✓</span>
                    <span class="text-sm text-gray-700">Ulasan dari Google Maps</span>
                </div>
                <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-full border border-gray-200 shadow-sm">
                    <span class="text-blue-600">📍</span>
                    <span class="text-sm text-gray-700">Google Business Profile</span>
                </div>
            </div>

            <!-- CTA Button -->
            <a
                href="{{ config('business.maps_url') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="group inline-flex items-center gap-3 px-8 py-4 bg-linear-to-r from-red-600 to-orange-500 text-white rounded-xl hover:shadow-xl hover:shadow-red-200 transition-all duration-300 font-semibold"
            >
                <span class="text-xl">🗺️</span>
                <div class="text-left">
                    <div class="text-sm opacity-90">Lihat Semua Ulasan di</div>
                    <div class="text-lg">Google Maps Business</div>
                </div>
                <span class="ml-4 group-hover:translate-x-1 transition-transform">→</span>
            </a>

            <!-- Small Note -->
            <p class="text-sm text-gray-500 max-w-md">
                {{ $totalReviews }} ulasan yang ditampilkan dari Google Maps
            </p>
        </div>
    </div>

    <!-- Alpine.js Carousel Logic -->
    <script>
        function reviewCarousel(totalSlides) {
            return {
                currentIndex: 0,
                totalSlides: totalSlides,
                interval: null,
                
                init() {
                    this.startAutoPlay();
                },
                
                startAutoPlay() {
                    this.interval = setInterval(() => {
                        this.nextSlide();
                    }, 8000); // 8 seconds
                },
                
                pause() {
                    if (this.interval) {
                        clearInterval(this.interval);
                        this.interval = null;
                    }
                },
                
                play() {
                    if (!this.interval) {
                        this.startAutoPlay();
                    }
                },
                
                nextSlide() {
                    this.currentIndex = (this.currentIndex + 1) % this.totalSlides;
                },
                
                prevSlide() {
                    this.currentIndex = (this.currentIndex - 1 + this.totalSlides) % this.totalSlides;
                },
                
                goToSlide(index) {
                    this.currentIndex = index;
                    this.pause();
                    this.play();
                }
            }
        }
    </script>
</div>