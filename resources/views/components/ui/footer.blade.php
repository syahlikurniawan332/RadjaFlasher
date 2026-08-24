<footer id="contact" class="scroll-mt-28 bg-white text-gray-700 border-t border-gray-200 relative">
    <div class="absolute inset-0 opacity-40">
        <img src="{{ asset('images/wave.svg') }}"
            alt="Wave Pattern"
            class="w-full h-full object-cover bg-red-500">
    </div>
    <div class="container mx-auto px-4 py-12 relative">

        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">

            <!-- BRAND -->
            <div>
                <x-ui.logo />

                <p class="text-sm text-gray-600 mb-6">
                    Informasi layanan perbaikan Android & iPhone di {{ config('business.city') }}.
                    Hubungi kami untuk konsultasi kendala perangkat sebelum datang ke workshop.
                </p>

                <!-- Contact Quick -->
                <div class="space-y-2">
                    <a href="https://wa.me/{{ config('business.whatsapp') }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 text-green-600 hover:text-green-700 font-medium">
                        <span> <x-ui.icon-whatsapp /> </span> Konsultasi via WhatsApp
                    </a>
                    <br>
                    <a href="tel:{{ config('business.phone') }}"
                        class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-700 font-medium">
                        <span>📞</span> {{ config('business.phone_label') }}
                    </a>
                </div>
            </div>

            <!-- NAVIGATION -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Navigasi</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-red-600">Home</a></li>
                    <li><a href="{{ route('services') }}" class="text-gray-600 hover:text-red-600">Layanan</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-gray-600 hover:text-red-600">Gallery</a></li>
                    <li><a href="{{ route('article') }}" class="text-gray-600 hover:text-red-600">Artikel</a></li>
                </ul>
            </div>

            <!-- SERVICES -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Layanan</h3>
                <ul class="space-y-2 text-gray-600">
                    <li class="hover:text-blue-600">iPhone Repair</li>
                    <li class="hover:text-blue-600">Android Repair</li>
                    <li class="hover:text-blue-600">Sparepart smartphone</li>
                </ul>
            </div>

            <!-- CONTACT & LOCATION -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Lokasi & Kontak</h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2">
                        <span class="text-blue-500 mt-0.5">📍</span>
                        <div>
                            <p class="font-medium">{{ config('business.city') }}</p>
                            <a href="{{ config('business.maps_url') }}" target="_blank"
                                class="text-sm text-red-600 hover:underline">
                                Lihat di Google Maps →
                            </a>
                        </div>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-red-500">📞</span>
                        <a href="tel:{{ config('business.phone') }}" class="hover:text-red-600">
                            {{ config('business.phone_label') }}
                        </a>
                    </li>
                    <li class="pt-2">
                        <div class="inline-flex items-center gap-2 bg-red-50 text-red-700 px-3 py-1.5 rounded-lg">
                            <span class="text-sm">🕒</span>
                            <span class="text-sm font-medium">{{ $todayHours[0] }} - {{ $todayHours[1] }}</span>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

        <!-- BOTTOM BAR -->
        <div class="border-t border-gray-200 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center text-sm">
            <!-- Copyright -->
            <p class="text-gray-500 mb-4 md:mb-0">
                © {{ date('Y') }} <span class="text-red-600 font-medium">{{ config('business.name') }}</span>.
                Informasi layanan Radja Flasher di {{ config('business.city') }}.
            </p>
        </div>

    </div>
</footer>