<button
    type="button"
    @click="mobileMenuOpen = !mobileMenuOpen"
    class="
        flex h-10 w-10 items-center justify-center rounded-xl
        text-gray-700 transition-colors
        hover:bg-red-50 hover:text-red-700
        focus:outline-none focus:ring-2 focus:ring-red-500/30
        lg:hidden
    "
    aria-label="Buka atau tutup menu navigasi"
    :aria-expanded="mobileMenuOpen.toString()"
    aria-controls="mobile-navigation"
>
    <svg
        x-show="!mobileMenuOpen"
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        aria-hidden="true"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
        />
    </svg>

    <svg
        x-show="mobileMenuOpen"
        x-cloak
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        aria-hidden="true"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
        />
    </svg>
</button>