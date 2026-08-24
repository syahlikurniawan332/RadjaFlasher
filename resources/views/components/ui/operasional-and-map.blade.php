@php
$hours = config('business.hours');
$dayLabels = ['mon' => 'Senin','tue' => 'Selasa','wed' => 'Rabu','thu' => 'Kamis','fri' => 'Jumat','sat' => 'Sabtu','sun' => 'Minggu'];
$todayKey = strtolower(now()->format('D'));
@endphp

<div class="relative">

    <div class="absolute top-0 right-4 lg:right-10 w-40 h-40 opacity-20 -translate-y-8 translate-x-8">
        <img
            src="{{ asset('images/undraw_searching-everywhere_tffi.svg') }}"
            alt="Workshop Detail"
            class="w-full h-full">
    </div>

    <div class="absolute bottom-20 left-4 lg:left-10 w-40 h-40 opacity-10 -translate-y-8 translate-x-8">
        <img
            src="{{ asset('images/operasional.svg') }}"
            alt="Workshop Detail"
            class="w-full h-full">
    </div>

    <div class="text-center mb-12 relative">
        <div class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-full mb-4 border border-blue-200">
            <span class="text-lg">📍</span>
            <span class="font-medium text-sm">LOKASI & JAM BUKA</span>
        </div>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Kunjungi Workshop Radja Flasher</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Workshop kami siap melayani sesuai jadwal operasional</p>
    </div>

    <div class="grid lg:grid-cols-5 gap-8 max-w-6xl mx-auto ">
        <!-- Hours Card -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                <h3 class="text-xl font-bold text-gray-800 mb-6 pb-4 border-b border-gray-100">Jam Buka</h3>
                <div class="space-y-3">
                    @foreach ($hours as $dayKey => $time)
                    @php $isToday = $dayKey === $todayKey; @endphp
                    <div class="flex items-center justify-between py-3 {{ $isToday ? 'border-l-4 border-blue-500 pl-3 -ml-1' : '' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-gray-500 text-sm w-16">{{ $dayLabels[$dayKey] }}</span>
                            @if($isToday)
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">Hari Ini</span>
                            @endif
                        </div>
                        <span class="font-medium text-gray-800">{{ $time[0] }} – {{ $time[1] }}</span>
                    </div>
                    @endforeach
                </div>

                <!-- Current Status -->
                <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Status</p>
                            <p class="font-medium text-gray-800">{{ now()->translatedFormat('H:i') }} WIB</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="h-3 w-3 rounded-full {{ $isOpen ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            <span class="font-bold {{ $isOpen ? 'text-green-700' : 'text-red-700' }}">
                                {{ $isOpen ? 'BUKA' : 'TUTUP' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Card -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                <div class="h-84 md:h-92">
                    <iframe src="{{ config('business.maps_embed_url') }}"
                        width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="w-full h-full">
                    </iframe>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Lokasi Workshop</h3>
                    <p class="text-gray-600 mb-4">{{ config('business.city') }}</p>
                    <a href="{{ config('business.maps_url') }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-5 py-2.5 border border-red-500 text-red-600 rounded-lg hover:bg-blue-50 font-medium">
                        <span>🗺️</span> Buka di Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>