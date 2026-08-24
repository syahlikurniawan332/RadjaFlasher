<x-layouts.app :title="$title" :description="$description">

    <!-- Hero Section Services -->
    <section class="relative bg-linear-to-b from-white to-red-600 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22 %3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22 %3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.1%22 %3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22 /%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl py-20 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div class="inline-flex items-center gap-2 bg-red-600 backdrop-blur-sm text-white px-4 py-2 rounded-full mb-6 border border-white/30">
                    <span class="text-lg">🛠️</span>
                    <span class="text-sm font-semibold">LAYANAN SERVIS HP</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                    Layanan <span class="bg-linear-to-r from-red-500 to-red-600 bg-clip-text text-transparent">Perbaikan</span>
                </h1>

                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Lihat dokumentasi perbaikan Android & iPhone serta konsultasikan kendala perangkat sebelum servis.
                </p>

                <div class="grid gap-3 sm:grid-cols-3 mb-10">
                    <div class="rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm font-medium text-white backdrop-blur-sm">📱 Android & iPhone</div>
                    <div class="rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm font-medium text-white backdrop-blur-sm">🔎 Diagnosa & konsultasi</div>
                    <div class="rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm font-medium text-white backdrop-blur-sm">🧰 Dokumentasi hasil servis</div>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="white"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="white"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="white"></path>
            </svg>
        </div>
    </section>

    <!-- Services Content -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <!-- Category Filter -->
            <div class="mb-12">
                <div class="flex flex-wrap gap-3 justify-center">
                    @foreach ($tabs as $tab)
                    <a
                        href="{{ route('services', ['type' => $tab['key']]) }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border transition-all duration-300 font-medium
                {{ $tab['is_active']
                    ? $tab['bg'].' '.$tab['text'].' shadow-lg'
                    : 'bg-white text-gray-700 border-gray-200 hover:shadow-md'
                }}">
                        <span class="text-xl">{{ $tab['icon'] }}</span>
                        <span>{{ $tab['label'] }}</span>

                        @if(isset($counts[$tab['key']]))
                        <span class="text-xs bg-white/20 px-2 py-1 rounded-full">
                            {{ $counts[$tab['key']] }}
                        </span>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Category Grid -->
            @switch($type)
            @case('testimonials')
            <x-service.testimoni :items="$items" />
            @break
            @case('before-after')
            <x-service.before-after :items="$items" />
            @break
            @endswitch

            <!-- CTA Section -->
            <div class="text-center bg-linear-to-r from-blue-50 to-cyan-50 rounded-2xl p-10 border border-blue-100">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Butuh Pemeriksaan untuk Kendala HP?</h2>
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                    Ceritakan gejala perangkat melalui WhatsApp atau kunjungi workshop untuk konsultasi awal.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-buttons.whatsapp size="lg" class="bg-linear-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600">
                        <span class="flex items-center gap-2">
                            Konsultasi via WhatsApp
                        </span>
                    </x-buttons.whatsapp>
                    <a
                        href="/#operasional"
                        class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-red-600 border border-red-300 rounded-xl hover:bg-red-50 font-medium transition-all duration-300">
                        <span>📍</span>
                        Kunjungi Workshop
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Before & After Comparison Section -->
    <section class="py-16 bg-linear-to-b from-white to-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-full mb-6 border border-white/30">
                    <span class="h-2 w-2 bg-green-200 rounded-full animate-pulse"></span>
                    <span class="text-sm font-semibold">CARA KAMI BEKERJA</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Perbaikan yang Terukur & Transparan</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Setiap perangkat ditangani dengan proses standar untuk memastikan hasil maksimal dan aman.</p>
            </div>

            <!-- Process Steps -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm">
                <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Proses Perbaikan Kami</h3>
                <div class="grid md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="h-16 w-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center text-2xl text-blue-600 mb-4">1</div>
                        <h4 class="font-bold text-gray-900 mb-2">Diagnosa</h4>
                        <p class="text-sm text-gray-600">Cek kerusakan secara detail</p>
                    </div>
                    <div class="text-center">
                        <div class="h-16 w-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center text-2xl text-blue-600 mb-4">2</div>
                        <h4 class="font-bold text-gray-900 mb-2">Konsultasi</h4>
                        <p class="text-sm text-gray-600">Diskusikan solusi & biaya</p>
                    </div>
                    <div class="text-center">
                        <div class="h-16 w-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center text-2xl text-blue-600 mb-4">3</div>
                        <h4 class="font-bold text-gray-900 mb-2">Perbaikan</h4>
                        <p class="text-sm text-gray-600">Dikerjakan sesuai hasil diagnosa</p>
                    </div>
                    <div class="text-center">
                        <div class="h-16 w-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center text-2xl text-blue-600 mb-4">4</div>
                        <h4 class="font-bold text-gray-900 mb-2">Testing</h4>
                        <p class="text-sm text-gray-600">Quality check sebelum serah terima</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison Modal -->
    <div id="comparisonModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/70">
        <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <!-- Modal Header -->
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h2 id="modalTitle" class="text-2xl font-bold text-gray-900"></h2>
                        <p id="modalCategory" class="text-sm text-gray-600 mt-1"></p>
                    </div>
                    <button
                        onclick="closeComparisonModal()"
                        class="text-gray-400 hover:text-gray-600 p-2 hover:bg-gray-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Before & After Images -->
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <div class="text-center font-medium text-gray-700 mb-2">SEBELUM PERBAIKAN</div>
                        <div class="h-64 bg-gray-200 rounded-xl overflow-hidden">
                            <img
                                id="modalBeforeImage"
                                alt="Before Repair"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="mt-3">
                            <h4 id="modalBeforeTitle" class="font-bold text-gray-900 mb-1"></h4>
                            <p id="modalBeforeDesc" class="text-sm text-gray-600"></p>
                        </div>
                    </div>
                    <div>
                        <div class="text-center font-medium text-gray-700 mb-2">SESUDAH PERBAIKAN</div>
                        <div class="h-64 bg-gray-200 rounded-xl overflow-hidden">
                            <img
                                id="modalAfterImage"
                                alt="After Repair"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="mt-3">
                            <h4 id="modalAfterTitle" class="font-bold text-gray-900 mb-1"></h4>
                            <p id="modalAfterDesc" class="text-sm text-gray-600"></p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Deskripsi Layanan</h3>
                    <p id="modalDescription" class="text-gray-700 leading-relaxed"></p>
                </div>

                <!-- Tags -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Jenis Kerusakan yang Ditangani</h3>
                    <div id="modalTags" class="flex flex-wrap gap-2"></div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                    <x-buttons.whatsapp
                        size="md"
                        class="flex-1 bg-linear-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600">
                        Konsultasi Servis Ini
                    </x-buttons.whatsapp>
                    <button
                        onclick="closeComparisonModal()"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 font-medium transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>