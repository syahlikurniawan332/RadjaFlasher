@props([
    'size' => 'md',
    'variant' => 'primary',
    'fullWidth' => false,
    'message' => config('business.message_template'),
    'phone' => config('business.whatsapp')
])

@php
    $waMessage = urlencode($message);
    $classes = [
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-5 py-3 text-base',
        'xl' => 'px-6 py-4 text-lg'
    ][$size];
    
    $variantClasses = [
        'primary' => 'bg-green-600 hover:bg-green-700 text-white',
        'secondary' => 'bg-green-100 hover:bg-green-200 text-green-800',
        'outline' => 'border border-green-600 text-green-600 hover:bg-green-50'
    ][$variant];
    
    $widthClass = $fullWidth ? 'w-full' : '';
@endphp

<a href="https://wa.me/{{ $phone }}?text={{ $waMessage }}"
   target="_blank"
   rel="noopener noreferrer"
   class="inline-flex items-center justify-center gap-2 rounded-lg font-semibold transition {{ $classes }} {{ $variantClasses }} {{ $widthClass }} {{ $attributes->get('class') }}">
    <span>
        <x-ui.icon-whatsapp />
    </span>
    <span>{{ $slot }}</span>
</a>