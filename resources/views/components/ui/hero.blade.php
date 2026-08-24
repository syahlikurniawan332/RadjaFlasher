<section class="relative bg-linear-to-b from-white from-0% via-red-300 via-50% to-white to-100% text-gray-800 overflow-hidden">
    <!-- Background Blurs -->
    <div class="absolute inset-0">
        <!-- Small image bottom left -->
        <div class="absolute bottom-10 left-10 w-40 h-40 opacity-20">
            <img 
                src="{{ asset('images/doc_6.webp') }}" 
                alt="Workshop Detail"
                class="w-full h-full object-cover rounded-full shadow-lg"
            >
            <!-- Circular border -->
            <div class="absolute inset-0 border border-red-200/20 rounded-full"></div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-10 relative z-10">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <!-- Content -->
            <div>
                <div class="inline-block px-4 py-2 bg-red-600 text-white rounded-full mb-6">
                    <span class="text-sm font-semibold">🛠️ SPESIALIS PERBAIKAN HP</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6">
                    Radja Flasher<br>
                    <span class="bg-linear-to-r from-red-600 to-orange-600 bg-clip-text text-transparent">
                        Service Center
                    </span>
                </h1>
                
                <p class="text-xl text-gray-600 mb-10 max-w-lg">
                    Punya kendala pada Android atau iPhone? Konsultasikan gejalanya terlebih dahulu untuk mengetahui opsi pemeriksaan dan perbaikan yang sesuai.
                </p>
                
                <!-- Trust points tanpa angka yang belum terverifikasi -->
                <div class="grid gap-3 sm:grid-cols-3 mb-10">
                    <div class="rounded-xl border border-red-100 bg-white/80 px-4 py-3 text-sm font-medium text-gray-700 shadow-sm">
                        📱 Android & iPhone
                    </div>
                    <div class="rounded-xl border border-red-100 bg-white/80 px-4 py-3 text-sm font-medium text-gray-700 shadow-sm">
                        🔎 Konsultasi kendala
                    </div>
                    <div class="rounded-xl border border-red-100 bg-white/80 px-4 py-3 text-sm font-medium text-gray-700 shadow-sm">
                        📍 Workshop di Mandau
                    </div>
                </div>
                
                <x-buttons.whatsapp size="xl" class="bg-red-600 hover:bg-red-700">
                    Chat untuk Konsultasi
                </x-buttons.whatsapp>
            </div>

            <!-- Image Carousel Container -->
            <div class="block">
                <div class="relative">
                    <!-- Glow Effect -->
                    <div class="absolute -inset-4 bg-linear-to-r from-red-200 to-orange-100 rounded-3xl blur-xl opacity-40"></div>
                    
                    <!-- Carousel Container -->
                    <div 
                        x-data="imageCarousel()"
                        x-init="init()"
                        @mouseenter="pause()"
                        @mouseleave="play()"
                        class="relative bg-white p-6 rounded-3xl shadow-lg border border-gray-200 overflow-hidden"
                    >
                        <!-- Carousel Images -->
                        <div class="overflow-hidden rounded-2xl">
                            <div 
                                class="flex transition-transform duration-700 ease-in-out"
                                :style="`transform: translateX(-${currentIndex * 100}%)`"
                            >
                                <!-- Image 1 -->
                                <div class="w-full shrink-0">
                                    <img 
                                        src="{{ asset('images/doc_15.webp') }}" 
                                        alt="Aktivitas perbaikan perangkat di Radja Flasher"
                                        fetchpriority="high"
                                        class="w-full h-[280px] sm:h-[340px] lg:h-[400px] object-cover"
                                    >
                                </div>
                                <!-- Image 2 -->
                                <div class="w-full shrink-0">
                                    <img 
                                        src="{{ asset('images/doc_16.webp') }}" 
                                        alt="Workshop Radja Flasher"
                                        loading="lazy"
                                        class="w-full h-[280px] sm:h-[340px] lg:h-[400px] object-cover"
                                    >
                                </div>
                                <!-- Image 3 -->
                                <div class="w-full shrink-0">
                                    <img 
                                        src="{{ asset('images/doc_17.webp') }}" 
                                        alt="Proses perbaikan perangkat"
                                        loading="lazy"
                                        class="w-full h-[280px] sm:h-[340px] lg:h-[400px] object-cover"
                                    >
                                </div>
                            </div>
                        </div>
                        
                        <!-- Static Badges (Tidak ikut carousel) -->
                        <!-- Bottom Right Badge -->
                        <div class="absolute bottom-6 right-6 bg-white/90 backdrop-blur-sm text-gray-800 px-4 py-3 rounded-xl shadow-md border border-gray-200">
                            <div class="flex items-center gap-2">
                                <span class="text-2xl text-red-600">⚡</span>
                                <div>
                                    <p class="font-bold text-sm">KONSULTASI DULU</p>
                                    <p class="text-xs text-gray-500">Cek kendala & opsi perbaikan</p>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel Navigation Dots -->
                        <div class="flex justify-center gap-2 mt-4">
                            <template x-for="(_, index) in totalSlides">
                                <button
                                    @click="goToSlide(index)"
                                    :class="currentIndex === index 
                                        ? 'bg-red-600' 
                                        : 'bg-gray-300'"
                                    class="h-2 w-2 rounded-full transition-all duration-300"
                                    :aria-label="'Go to slide ' + (index + 1)"
                                ></button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alpine.js Carousel Script -->
<script>
function imageCarousel() {
    return {
        currentIndex: 0,
        totalSlides: 3, // Sesuaikan dengan jumlah gambar
        interval: null,
        
        init() {
            this.startAutoPlay();
        },
        
        startAutoPlay() {
            this.interval = setInterval(() => {
                this.nextSlide();
            }, 3000); // 3 detik
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