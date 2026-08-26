@php
    $hours = config('business.hours');

    $dayLabels = [
        'mon' => 'Senin',
        'tue' => 'Selasa',
        'wed' => 'Rabu',
        'thu' => 'Kamis',
        'fri' => 'Jumat',
        'sat' => 'Sabtu',
        'sun' => 'Minggu',
    ];

    $todayKey = strtolower(now()->format('D'));
@endphp

<div class="relative">

    {{-- Decorative illustrations --}}
    <div
        class="pointer-events-none absolute right-4 top-0 h-40 w-40
               -translate-y-8 translate-x-8 opacity-20 lg:right-10"
    >
        <img
            src="{{ asset('images/undraw_searching-everywhere_tffi.svg') }}"
            alt=""
            class="h-full w-full"
        >
    </div>

    <div
        class="pointer-events-none absolute bottom-20 left-4 h-40 w-40
               -translate-y-8 translate-x-8 opacity-10 lg:left-10"
    >
        <img
            src="{{ asset('images/operasional.svg') }}"
            alt=""
            class="h-full w-full"
        >
    </div>

    {{-- Heading --}}
    <div class="relative mb-12 text-center">
        <div
            class="mb-4 inline-flex items-center rounded-full
                   bg-red-600 px-4 py-2 text-white"
        >
            <span class="text-sm font-medium">
                LOKASI & JAM OPERASIONAL
            </span>
        </div>

        <h2 class="mb-3 text-3xl font-bold text-gray-900 md:text-4xl">
            Kunjungi Workshop Radja Flasher
        </h2>

        <p class="mx-auto max-w-2xl text-lg text-gray-600">
            Lihat lokasi workshop dan informasi jam operasional
            sebelum berkunjung.
        </p>
    </div>

    <div class="mx-auto grid max-w-6xl gap-8 lg:grid-cols-5">

        {{-- Operating hours --}}
        <div class="lg:col-span-2">
            <div
                class="rounded-2xl border border-gray-200 bg-white
                       p-6 shadow-sm"
            >
                <h3
                    class="mb-4 border-b border-gray-100 pb-4
                           text-xl font-bold text-gray-800"
                >
                    Jam Operasional
                </h3>

                <div class="space-y-1">
                    @foreach ($hours as $dayKey => $time)
                        @php
                            $isToday = $dayKey === $todayKey;
                        @endphp

                        <div
                            class="
                                flex items-center justify-between
                                rounded-lg px-3 py-3

                                {{ $isToday ? 'bg-red-50' : '' }}
                            "
                        >
                            <div class="flex items-center gap-2">
                                <span
                                    class="{{ $isToday
                                        ? 'font-semibold text-red-700'
                                        : 'text-gray-600'
                                    }}"
                                >
                                    {{ $dayLabels[$dayKey] }}
                                </span>

                                @if ($isToday)
                                    <span
                                        class="rounded-full bg-red-100
                                               px-2 py-0.5 text-xs
                                               font-medium text-red-700"
                                    >
                                        Hari Ini
                                    </span>
                                @endif
                            </div>

                            <span class="font-medium text-gray-800">
                                {{ $time[0] }} – {{ $time[1] }}
                            </span>
                        </div>
                    @endforeach
                </div>

                {{-- Current status --}}
                <div
                    class="mt-6 flex items-center justify-between
                           rounded-xl border border-gray-200
                           bg-gray-50 p-4"
                >
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                            Status saat ini
                        </p>

                        <p class="mt-1 text-sm font-medium text-gray-800">
                            {{ now()->format('H:i') }} WIB
                        </p>
                    </div>

                    <div class="flex items-center gap-2">
                        <span
                            class="h-2.5 w-2.5 rounded-full
                                   {{ $isOpen ? 'bg-green-500' : 'bg-gray-400' }}"
                        ></span>

                        <span
                            class="font-semibold
                                   {{ $isOpen ? 'text-green-700' : 'text-gray-600' }}"
                        >
                            {{ $isOpen ? 'Buka' : 'Tutup' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Map --}}
        <div class="lg:col-span-3">
            <div
                class="overflow-hidden rounded-2xl border
                       border-gray-200 bg-white shadow-sm"
            >
                <div class="h-80 md:h-96">
                    <iframe
                        src="{{ config('business.maps_embed_url') }}"
                        title="Lokasi Radja Flasher di Google Maps"
                        width="100%"
                        height="100%"
                        style="border: 0;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="h-full w-full"
                    ></iframe>
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">
                        Lokasi Workshop
                    </h3>

                    <p class="mt-2 text-gray-600">
                        {{ config('business.city') }}
                    </p>

                    <a
                        href="{{ config('business.maps_url') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="
                            mt-5 inline-flex items-center gap-2
                            rounded-lg border border-red-500
                            px-5 py-2.5 font-medium text-red-600
                            transition-colors
                            hover:bg-red-50
                        "
                    >
                        Buka di Google Maps
                        <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>