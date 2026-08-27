@props([
    'title' => config('business.name'),
    'isOpen' => true,
])

<header
    x-data="{
        isScrolled: false,
        mobileMenuOpen: false
    }"
    @scroll.window="isScrolled = window.scrollY > 10"
    @keydown.escape.window="mobileMenuOpen = false"
    class="sticky top-0 z-40"
>
    <x-ui.top-bar :isOpen="$isOpen" />

    <nav
        class="border-b bg-white/95 backdrop-blur transition-all duration-300"
        :class="isScrolled
            ? 'border-gray-200 py-2 shadow-md'
            : 'border-transparent py-3 sm:py-4'"
    >
        <div class="container mx-auto flex items-center justify-between px-4">
            <x-ui.logo :title="$title" />

            <x-ui.desktop-navbar />

            <x-ui.mobile-togle />
        </div>

        <x-ui.mobile-navbar />
    </nav>
</header>