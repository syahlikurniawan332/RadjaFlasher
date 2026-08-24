<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @php
        $pageTitle = $title ?? 'Radja Flasher - Service Android & iPhone';
        $pageDescription = $description ?? 'Informasi layanan perbaikan Android dan iPhone, dokumentasi hasil servis, jam operasional, dan lokasi Radja Flasher.';
        $canonicalUrl = url()->current();
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="robots" content="index,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="icon" href="{{ asset('images/logo.webp') }}">
    <meta name="theme-color" content="#dc2626">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ asset('images/logo.webp') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Additional Head Content -->
    {{ $head ?? '' }}
</head>
<body class="font-sans antialiased bg-gray-50" x-data="{ mobileMenuOpen: false }">
    <!-- Header Component -->
    <x-ui.header />
    
    <!-- Page Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <x-buttons.whatsapp-floating />

    <!-- Footer Component -->
    <x-ui.footer />

    <!-- Scripts Stack -->
    @stack('scripts')
</body>
</html>