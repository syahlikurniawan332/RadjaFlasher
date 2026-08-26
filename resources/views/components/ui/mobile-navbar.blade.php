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

<div
    id="mobile-navigation"
    x-show="mobileMenuOpen"
    x-cloak
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    @click.outside="mobileMenuOpen = false"
    class="border-t border-gray-100 bg-white lg:hidden"
>
    <div class="container mx-auto space-y-1 px-4 py-4">
        @foreach ($items as $item)
            @php
                $isActive =
                    isset($item['route']) &&
                    request()->routeIs($item['route']);
            @endphp

            <a
                href="{{ $item['url'] }}"
                @click="mobileMenuOpen = false"
                @if ($isActive) aria-current="page" @endif
                class="
                    flex items-center justify-between rounded-xl
                    px-4 py-3 text-sm font-medium transition-colors

                    {{ $isActive
                        ? 'bg-red-50 text-red-700'
                        : 'text-gray-700 hover:bg-gray-50 hover:text-red-700'
                    }}
                "
            >
                <span>{{ $item['label'] }}</span>

                <span
                    class="{{ $isActive ? 'text-red-600' : 'text-gray-300' }}"
                    aria-hidden="true"
                >
                    →
                </span>
            </a>
        @endforeach

        <div class="pt-3">
            <x-buttons.whatsapp
                size="md"
                class="w-full justify-center bg-red-600 hover:bg-red-700"
            >
                Konsultasi via WhatsApp
            </x-buttons.whatsapp>
        </div>
    </div>
</div>