@props(['items'])

<div class="mb-12">

    {{-- Documentation Preview --}}
    <div id="masonry-gallery">
        <div class="masonry-sizer"></div>

        @foreach ($items as $item)
            <div class="masonry-item">
                <img
                    src="{{ $item['image'] }}"
                    alt="{{ $item['alt'] ?? 'Dokumentasi aktivitas servis Radja Flasher' }}"
                    class="w-full rounded-xl transition-transform duration-300 ease-out hover:scale-[1.03]"
                    loading="lazy"
                    decoding="async"
                >
            </div>
        @endforeach
    </div>

    {{-- Footer --}}
    <div class="mt-12 pt-8">
        <div class="relative">

            {{-- Accent line --}}
            <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2">
                <div class="h-1 w-16 rounded-full bg-linear-to-r from-red-400 to-orange-400"></div>
            </div>

            <div class="mt-3 pt-4 text-center">

                <div class="mb-3 inline-flex items-center gap-2 rounded-full bg-gray-50 px-4 py-2">
                    <span class="h-2 w-2 rounded-full bg-red-500"></span>

                    <span class="text-sm font-medium text-gray-700">
                        Dokumentasi Servis
                    </span>
                </div>

                <p class="text-gray-600">
                    Menampilkan {{ count($items) }} foto dokumentasi pilihan
                </p>

                <a
                    href="{{ route('gallery') }}"
                    class="mt-5 inline-flex items-center gap-2 rounded-xl
                           border border-red-200 bg-red-50
                           px-5 py-3 font-semibold text-red-700
                           transition-colors
                           hover:border-red-300 hover:bg-red-100"
                >
                    Lihat Semua Dokumentasi
                    <span aria-hidden="true">→</span>
                </a>

            </div>
        </div>
    </div>

</div>