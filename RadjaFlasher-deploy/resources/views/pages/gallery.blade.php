<x-layouts.app :title="$title" :description="$description">

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-linear-to-b from-orange-100 to-red-700 text-white">
        <div class="container mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">

                {{-- Badge --}}
                <div
                    class="mb-6 inline-flex items-center gap-2 rounded-full
                           border border-white/30 bg-red-700 px-4 py-2
                           text-white backdrop-blur-sm"
                >
                    <span class="h-2 w-2 rounded-full bg-white"></span>
                    <span class="text-sm font-semibold">
                        DOKUMENTASI RADJA FLASHER
                    </span>
                </div>

                {{-- Title --}}
                <h1 class="mb-6 text-4xl font-bold md:text-5xl lg:text-6xl">
                    Galeri
                    <span
                        class="bg-linear-to-r from-red-600 to-red-700
                               bg-clip-text text-transparent"
                    >
                        Aktivitas Servis
                    </span>
                </h1>

                {{-- Description --}}
                <p class="mx-auto mb-8 max-w-2xl text-xl text-white/90">
                    Kumpulan dokumentasi aktivitas, proses pemeriksaan,
                    dan penanganan perangkat di Radja Flasher.
                </p>

                {{-- Total --}}
                <div class="text-lg">
                    <span class="font-bold">
                        {{ $totalItems }} foto
                    </span>
                    dokumentasi tersedia
                </div>
            </div>
        </div>

        {{-- Wave Divider --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg
                viewBox="0 0 1200 120"
                preserveAspectRatio="none"
                class="h-16 w-full"
                aria-hidden="true"
            >
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25"
                    fill="white"
                ></path>

                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5"
                    fill="white"
                ></path>

                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    fill="white"
                ></path>
            </svg>
        </div>
    </section>

    {{-- Gallery --}}
    <section class="bg-white py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div id="masonry-gallery">

                {{-- Masonry sizer --}}
                <div class="masonry-sizer"></div>

                @foreach ($galleryItems as $item)
                    <div class="masonry-item">
                        <img
                            src="{{ asset($item['image']) }}"
                            alt="{{ $item['alt'] ?? 'Dokumentasi aktivitas servis Radja Flasher' }}"
                            class="w-full rounded-xl transition-transform
                                   duration-300 ease-out hover:scale-[1.03]"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                @endforeach

            </div>

            {{-- Gallery Footer --}}
            <div class="mt-12 pt-8">
                <div class="relative">

                    {{-- Accent --}}
                    <div
                        class="absolute left-1/2 top-0
                               -translate-x-1/2 -translate-y-1/2"
                    >
                        <div
                            class="h-1 w-16 rounded-full
                                   bg-linear-to-r from-red-400 to-orange-400"
                        ></div>
                    </div>

                    <div class="mt-3 pt-4 text-center">

                        <div
                            class="mb-3 inline-flex items-center gap-2
                                   rounded-full bg-gray-50 px-4 py-2"
                        >
                            <span class="h-2 w-2 rounded-full bg-red-500"></span>

                            <span class="text-sm font-medium text-gray-700">
                                Dokumentasi Servis
                            </span>
                        </div>

                        <p class="text-gray-600">
                            {{ $totalItems }} foto dokumentasi tersedia
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </section>

</x-layouts.app>