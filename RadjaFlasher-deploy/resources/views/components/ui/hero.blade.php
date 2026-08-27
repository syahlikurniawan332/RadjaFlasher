<section
    class="relative overflow-hidden bg-gradient-to-b from-white via-red-50 to-white text-gray-800"
>
    {{-- Decorative background --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute -right-24 top-10 h-72 w-72 rounded-full bg-red-200/30 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-72 w-72 rounded-full bg-orange-100/50 blur-3xl"></div>
    </div>

    <div class="container relative z-10 mx-auto px-4 py-14 sm:py-16 lg:py-20">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">

            {{-- Content --}}
            <div class="max-w-2xl">
                <div
                    class="mb-6 inline-flex items-center gap-2 rounded-full border border-red-200 bg-red-50 px-4 py-2 text-sm font-semibold text-red-700"
                >
                    <span aria-hidden="true">🛠️</span>
                    <span>Spesialis Perbaikan Smartphone</span>
                </div>

                <h1
                    class="text-4xl font-bold leading-tight tracking-tight text-gray-950 sm:text-5xl md:text-6xl"
                >
                    Solusi Perbaikan
                    <span
                        class="block bg-gradient-to-r from-red-600 to-orange-500 bg-clip-text text-transparent"
                    >
                        Android & iPhone
                    </span>
                </h1>

                <p
                    class="mt-6 max-w-xl text-lg leading-8 text-gray-600 sm:text-xl"
                >
                    Konsultasikan kendala perangkat terlebih dahulu untuk
                    mengetahui opsi pemeriksaan dan perbaikan yang sesuai
                    di Radja Flasher.
                </p>

                {{-- Trust points --}}
                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    <div
                        class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white/80 px-4 py-3 shadow-sm backdrop-blur"
                    >
                        <span class="text-lg" aria-hidden="true">📱</span>
                        <span class="text-sm font-medium text-gray-700">
                            Android & iPhone
                        </span>
                    </div>

                    <div
                        class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white/80 px-4 py-3 shadow-sm backdrop-blur"
                    >
                        <span class="text-lg" aria-hidden="true">🔎</span>
                        <span class="text-sm font-medium text-gray-700">
                            Konsultasi Kendala
                        </span>
                    </div>

                    <div
                        class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white/80 px-4 py-3 shadow-sm backdrop-blur"
                    >
                        <span class="text-lg" aria-hidden="true">📍</span>
                        <span class="text-sm font-medium text-gray-700">
                            Workshop di Mandau
                        </span>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <x-buttons.whatsapp
                        size="xl"
                        class="justify-center bg-red-600 hover:bg-red-700"
                    >
                        Konsultasi via WhatsApp
                    </x-buttons.whatsapp>

                    <a
                        href="{{ url('/services') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-6 py-3 font-semibold text-gray-700 transition hover:border-red-300 hover:bg-red-50 hover:text-red-700"
                    >
                        Lihat Layanan
                        <span class="ml-2" aria-hidden="true">→</span>
                    </a>
                </div>

                <p class="mt-4 text-sm leading-6 text-gray-500">
                    Sampaikan jenis perangkat dan kendala yang dialami agar
                    konsultasi awal lebih mudah.
                </p>
            </div>

            {{-- Carousel --}}
            <div class="relative">
                <div
                    class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-red-200/60 to-orange-100/60 blur-2xl"
                ></div>

                <div
                    x-data="imageCarousel()"
                    x-init="init()"
                    @mouseenter="pause()"
                    @mouseleave="play()"
                    class="relative overflow-hidden rounded-3xl border border-gray-200 bg-white p-3 shadow-xl sm:p-5"
                >
                    <div class="overflow-hidden rounded-2xl">
                        <div
                            class="flex transition-transform duration-700 ease-in-out"
                            :style="`transform: translateX(-${currentIndex * 100}%)`"
                        >
                            <div class="w-full shrink-0">
                                <img
                                    src="{{ asset('images/doc_15.webp') }}"
                                    alt="Aktivitas perbaikan perangkat di Radja Flasher"
                                    fetchpriority="high"
                                    class="h-[280px] w-full object-cover sm:h-[360px] lg:h-[430px]"
                                >
                            </div>

                            <div class="w-full shrink-0">
                                <img
                                    src="{{ asset('images/doc_16.webp') }}"
                                    alt="Area workshop Radja Flasher"
                                    loading="lazy"
                                    class="h-[280px] w-full object-cover sm:h-[360px] lg:h-[430px]"
                                >
                            </div>

                            <div class="w-full shrink-0">
                                <img
                                    src="{{ asset('images/doc_17.webp') }}"
                                    alt="Proses pemeriksaan perangkat di Radja Flasher"
                                    loading="lazy"
                                    class="h-[280px] w-full object-cover sm:h-[360px] lg:h-[430px]"
                                >
                            </div>
                        </div>
                    </div>

                    {{-- Information badge --}}
                    <div
                        class="absolute bottom-14 left-6 right-6 rounded-xl border border-white/50 bg-white/90 px-4 py-3 shadow-md backdrop-blur sm:left-auto sm:right-8 sm:w-auto"
                    >
                        <div class="flex items-center gap-3">
                            <span class="text-xl text-red-600" aria-hidden="true">
                                ⚡
                            </span>

                            <div>
                                <p class="text-sm font-bold text-gray-900">
                                    Konsultasikan Kendala
                                </p>

                                <p class="text-xs text-gray-500">
                                    Cek kondisi sebelum menentukan tindakan
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Carousel navigation --}}
                    <div class="mt-4 flex justify-center gap-2">
                        <template x-for="(_, index) in totalSlides" :key="index">
                            <button
                                type="button"
                                @click="goToSlide(index)"
                                :class="
                                    currentIndex === index
                                        ? 'w-6 bg-red-600'
                                        : 'w-2 bg-gray-300 hover:bg-gray-400'
                                "
                                class="h-2 rounded-full transition-all duration-300"
                                :aria-label="'Tampilkan gambar ' + (index + 1)"
                            ></button>
                        </template>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function imageCarousel() {
        return {
            currentIndex: 0,
            totalSlides: 3,
            interval: null,

            init() {
                const reduceMotion = window.matchMedia(
                    '(prefers-reduced-motion: reduce)'
                ).matches;

                if (!reduceMotion) {
                    this.play();
                }
            },

            play() {
                if (this.interval) {
                    return;
                }

                this.interval = setInterval(() => {
                    this.nextSlide();
                }, 4500);
            },

            pause() {
                if (this.interval) {
                    clearInterval(this.interval);
                    this.interval = null;
                }
            },

            nextSlide() {
                this.currentIndex =
                    (this.currentIndex + 1) % this.totalSlides;
            },

            goToSlide(index) {
                this.currentIndex = index;

                this.pause();
                this.play();
            }
        };
    }
</script>