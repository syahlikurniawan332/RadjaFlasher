@props(['items' => [
['label' => 'Home', 'url' => route('home'), 'route' => 'home'],
['label' => 'Services', 'url' => route('services'), 'route' => 'services'],
['label' => 'Gallery', 'url' => route('gallery'), 'route' => 'gallery'],
['label' => 'Article', 'url' => route('article'), 'route' => 'article']
]])

<div class="hidden lg:flex items-center gap-8 ">
    @foreach($items as $item)
    @php
    $isActive = isset($item['route'])
    && $item['route'] === Route::currentRouteName();
    @endphp

    <a
        href="{{ $item['url'] }}"
        class="nav-link {{ $isActive ? 'font-bold underline' : '' }} py-3 hover:text-red-700">
        {{ $item['label'] }}
    </a>
    
    @endforeach

    <x-buttons.whatsapp size="md" class="bg-red-600 hover:bg-red-700">Konsultasi</x-buttons.whatsapp>
</div>