<x-layouts.app
    title="Radja Flasher - Phone Repair Specialist"
    description="Informasi layanan perbaikan Android dan iPhone, lokasi workshop, jam operasional, dokumentasi servis, dan ulasan pelanggan Radja Flasher.">

    <!-- Hero Section -->
    <x-ui.hero />

    <!-- Services Section -->
    <section id="operasional" class="scroll-mt-28 py-16 bg-linear-to-b from-white via-red-500/20 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <x-ui.operasional-and-map />
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="scroll-mt-28 py-20 bg-linear-to-b from-white via-red-50/40 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <x-ui.reviews :reviews="$reviews" />
        </div>
    </section>

</x-layouts.app>