@props(['items' => [
['label' => 'Home', 'url' => route('home'), 'icon' => '🏠', 'route' => 'home'],
['label' => 'Services', 'url' => route('services'), 'icon' => '🔧', 'route' => 'services'],
['label' => 'Gallery', 'url' => route('gallery'), 'icon' => '📷', 'route' => 'gallery'],
['label' => 'Article', 'url' => route('article'), 'icon' => '📝', 'route' => 'article']
]])

<div
    id="mobile-navigation"
    x-show="mobileMenuOpen"
    x-cloak
    @click.outside="mobileMenuOpen = false"
    class="lg:hidden border-t bg-white">
    <div class="flex flex-col px-4 py-4 space-y-3">
        @foreach($items as $item)
        @php
        $isActive = isset($item['route'])
        && $item['route'] === Route::currentRouteName();
        @endphp
        <a href="{{ $item['url'] }}" class="nav-link {{ $isActive ? 'bg-gray-800 text-white font-bold underline' : '' }} w-full text-left px-4 py-3 rounded-lg hover:bg-red-50 hover:text-red-700 transition font-medium text-gray-700">
            <div class="flex items-center gap-3">
                <span class="text-lg">{{ $item['icon'] }}</span>
                <span>{{ $item['label'] }}</span>
            </div>
        </a>
        @endforeach

        <div class="border-t my-2"></div>

        <x-buttons.whatsapp class="w-full"> 
            Konsultasi via WhatsApp
        </x-buttons.whatsapp>
        <x-buttons.call class="w-full mt-2" />
    </div>
</div>