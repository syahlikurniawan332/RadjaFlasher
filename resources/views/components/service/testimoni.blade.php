@props(['items'])

<div class="mb-12">
    <div id="masonry-gallery">
        <!-- SIZER (WAJIB ADA) -->
        <div class="masonry-sizer"></div>

        @foreach ($items as $item)
        <div class="masonry-item">
            <img
                src="{{ $item['image'] }}"
                alt="{{ $item['alt'] ?? 'Foto dokumentasi servis' }}"
                class="w-full rounded-xl transition-transform duration-300 ease-out hover:scale-[1.03]"
                loading="lazy">
        </div>
        @endforeach
    </div>

    <!-- footer -->
    <div class="mt-12 pt-8">
        <div class="relative">
            <!-- Accent line -->
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <div class="h-1 w-16 bg-linear-to-r from-red-400 to-orange-400 rounded-full"></div>
            </div>

            <!-- Content -->
            <div class="text-center pt-4 mt-3">
                <div class="inline-flex items-center gap-2 bg-gray-50 px-4 py-2 rounded-full mb-3">
                    <span class="h-2 w-2 bg-red-500 rounded-full"></span>
                    <span class="text-sm font-medium text-gray-700">
                        Dokumentasi Servis
                    </span>
                </div>
                <p class="text-gray-600">
                    {{ count($items) }} foto dokumentasi tersedia
                </p>
            </div>
        </div>
    </div>
</div>