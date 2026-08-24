@props(['isOpen' => true])

<span class="flex items-center gap-2">
    @if ($isOpen)
    <span class="text-gray-200 font-semibold">
        🟢 Buka Sekarang
    </span>
    @else
    <span class="text-gray-200 font-semibold">
        🔴 Tutup
    </span>
    @endif
</span>