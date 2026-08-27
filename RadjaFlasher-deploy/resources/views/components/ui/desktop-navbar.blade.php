@props([
    'items' => [
        [
            'label' => 'Beranda',
            'url' => route('home'),
            'route' => 'home',
        ],
        [
            'label' => 'Layanan',
            'url' => route('services'),
            'route' => 'services',
        ],
        [
            'label' => 'Galeri',
            'url' => route('gallery'),
            'route' => 'gallery',
        ],
        [
            'label' => 'Artikel',
            'url' => route('article'),
            'route' => 'article',
        ],
    ],
])

<div class="hidden items-center gap-1 lg:flex">
    @foreach ($items as $item)
        @php
            $isActive =
                isset($item['route']) &&
                request()->routeIs($item['route']);
        @endphp

        <a
            href="{{ $item['url'] }}"
            @if ($isActive) aria-current="page" @endif
            class="
                relative rounded-lg px-4 py-2.5 text-sm font-medium
                transition-colors duration-200

                {{ $isActive
                    ? 'bg-red-50 text-red-700'
                    : 'text-gray-600 hover:bg-gray-50 hover:text-red-700'
                }}
            "
        >
            {{ $item['label'] }}

            @if ($isActive)
                <span
                    class="absolute bottom-0 left-1/2 h-0.5 w-5
                           -translate-x-1/2 rounded-full bg-red-600"
                    aria-hidden="true"
                ></span>
            @endif
        </a>
    @endforeach

    <div class="ml-3">
        <x-buttons.whatsapp
            size="md"
            class="bg-red-600 hover:bg-red-700"
        >
            Konsultasi
        </x-buttons.whatsapp>
    </div>
</div>