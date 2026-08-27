{{-- components/ui/buttons/call.blade.php --}}
@props([
    'size' => 'md',
    'variant' => 'primary',
    'fullWidth' => false,
    'phone' => config('business.phone'),
    'label' => config('business.phone_label')
])

@php
    $classes = [
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-5 py-3 text-base',
        'xl' => 'px-6 py-4 text-lg'
    ][$size];
    
    $variantClasses = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'secondary' => 'bg-blue-100 hover:bg-blue-200 text-blue-800',
        'outline' => 'border border-blue-600 text-blue-600 hover:bg-blue-50'
    ][$variant];
    
    $widthClass = $fullWidth ? 'w-full' : '';
@endphp

<a href="tel:{{ $phone }}"
   class="inline-flex items-center justify-center gap-2 rounded-lg font-semibold transition {{ $classes }} {{ $variantClasses }} {{ $widthClass }} {{ $attributes->get('class') }}">
    <span>📞</span>
    <span>Telepon: {{ $label }}</span>
</a>