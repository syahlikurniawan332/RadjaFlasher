@props(['title' => config('business.name'), 'isOpen' => true])

<header
    x-data="{
        isScrolled: false,
        mobileMenuOpen: false
    }"
    @scroll.window="isScrolled = window.scrollY > 10"
    class="sticky top-0 z-40 bg-white shadow-sm">
    
    <!-- TOP BAR -->
    <x-ui.top-bar :isOpen="$isOpen" />
    
    <!-- MAIN NAV -->
    <nav
        class="bg-white transition-all duration-300"
        :class="isScrolled ? 'py-3' : 'py-4'">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <!-- LOGO -->
            <x-ui.logo :title="$title" />
            
            <!-- DESKTOP NAV -->
            <x-ui.desktop-navbar />
            
            <!-- MOBILE TOGGLE -->
            <x-ui.mobile-togle />
        </div>
        
        <!-- MOBILE MENU -->
        <x-ui.mobile-navbar />
    </nav>
</header>