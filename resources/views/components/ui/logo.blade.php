@props([
    'title' => config('business.name'),
    'showTagline' => true,
    'logo' => asset('images/logo.webp'),
])

<div class="flex items-center gap-3">
    <div class="h-11 w-11 flex items-center justify-center overflow-hidden">
        <img
            src="{{ $logo }}"
            alt="{{ $title }} Logo"
            class="h-8 w-8 object-contain rounded-xl"
            loading="lazy"
        >
    </div>

    <div>
        <h1 class="text-xl font-bold text-gray-900">{{ $title }}</h1>
        @if($showTagline)
        <p class="text-xs text-gray-500 hidden sm:block">
            Service Android & iPhone
        </p>
        @endif
    </div>
</div>