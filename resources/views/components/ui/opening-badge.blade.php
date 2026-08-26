@props(['isOpen' => true])

<span class="inline-flex items-center gap-2 font-medium">
    <span
        class="h-2 w-2 rounded-full {{ $isOpen ? 'bg-green-400' : 'bg-white/70' }}"
        aria-hidden="true"
    ></span>

    <span>
        {{ $isOpen ? 'Buka Sekarang' : 'Sedang Tutup' }}
    </span>
</span>