@props(['isOpen' => true])

<div class="hidden lg:block bg-red-600 text-white text-sm">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <div class="flex items-center gap-4">
            <x-ui.opening-badge :isOpen="$isOpen" />
            <span>{{ config('business.city') }}</span>
        </div>
        <div class="flex items-center gap-4">
            <a href="tel:{{ config('business.phone') }}" class="hover:underline">
                {{ config('business.phone_label') }}
            </a>
            <a href="{{ config('business.maps_url') }}" target="_blank" rel="noopener noreferrer" class="hover:underline">
                Lihat di Maps
            </a>
        </div>
    </div>
</div>