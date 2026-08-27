<x-layouts.app :title="$title" :description="$description">
    <section class="relative bg-linear-to-b from-orange-100 to-red-700 text-white overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl py-20">
            <div class="text-center max-w-3xl mx-auto">
                <div class="inline-flex items-center gap-2 bg-red-700 text-white px-4 py-2 rounded-full mb-6">
                    <span class="text-lg">📝</span>
                    <span class="text-sm font-semibold">ARTIKEL & TIPS</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Tips & Panduan <span class="text-red-600">Perawatan HP</span>
                </h1>

                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Informasi terbaru seputar perbaikan, perawatan, dan troubleshooting HP.
                    Disusun sebagai panduan umum sebelum melakukan perawatan atau servis perangkat.
                </p>
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

    <div class="container mx-auto px-4 py-12">
        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
            <article 
                class="group bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 cursor-pointer"
                onclick="openArticleModal({{ $article['id'] }})">
                
                <!-- Article Image -->
                <div class="h-48 overflow-hidden bg-gray-100">
                    <img 
                        src="{{ $article['image'] }}" 
                        alt="{{ $article['title'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <!-- Article Content -->
                <div class="p-6">
                    <!-- Meta Info -->
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs rounded-full font-medium">
                            {{ $article['category'] }}
                        </span>
                        <span class="text-xs text-gray-500">
                            {{ date('d M Y', strtotime($article['published_at'])) }}
                        </span>
                        <span class="text-xs text-gray-500">•</span>
                        <span class="text-xs text-gray-500">
                            {{ $article['read_time'] }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h2 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
                        {{ $article['title'] }}
                    </h2>

                    <!-- Excerpt -->
                    <p class="text-gray-600 mb-4 line-clamp-2">
                        {{ $article['excerpt'] }}
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-1.5 mb-4">
                        @foreach(array_slice($article['tags'], 0, 3) as $tag)
                        <span class="inline-block px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-md">
                            {{ $tag }}
                        </span>
                        @endforeach
                        @if(count($article['tags']) > 3)
                        <span class="inline-block px-2 py-1 bg-gray-100 text-gray-500 text-xs rounded-md">
                            +{{ count($article['tags']) - 3 }}
                        </span>
                        @endif
                    </div>

                    <!-- Author & CTA -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-sm font-bold text-blue-700">
                                    {{ strtoupper(substr($article['author'], 0, 1)) }}
                                </span>
                            </div>
                            <span class="text-sm text-gray-700">{{ $article['author'] }}</span>
                        </div>
                        
                        <button class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center gap-1">
                            Baca
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Empty State -->
        @if(count($articles) == 0)
        <div class="text-center py-16">
            <div class="mb-4">
                <span class="text-6xl">📝</span>
            </div>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada artikel</h3>
            <p class="text-gray-500">Artikel sedang dalam persiapan. Nantikan artikel terbaru kami!</p>
        </div>
        @endif
    </div>

    <!-- Article Detail Modal -->
    <div id="articleModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/70">
        <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 md:p-8">
                <!-- Close Button -->
                <button 
                    onclick="closeArticleModal()"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 p-2 hover:bg-gray-100 rounded-lg z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Modal Content -->
                <div id="articleModalContent">
                    <!-- Content akan diisi oleh JavaScript -->
                    <div class="text-center py-12">
                        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
                        <p class="mt-4 text-gray-600">Memuat artikel...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk Modal -->
    <script>
        // Variabel global untuk menyimpan semua articles
        const allArticles = @json($articles);

        // Fungsi untuk membuka modal artikel
        function openArticleModal(articleId) {
            console.log('Opening article:', articleId);
            
            // Tampilkan modal
            const modal = document.getElementById('articleModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
            
            // Cari artikel dari data lokal atau fetch dari API
            let article = allArticles.find(a => a.id == articleId);
            
            if (article) {
                // Jika ditemukan di data lokal, langsung render
                renderArticleModal(article);
            } else {
                // Jika tidak ditemukan, fetch dari API
                fetchArticle(articleId);
            }
        }
        
        // Fungsi untuk fetch artikel dari API
        async function fetchArticle(articleId) {
            try {
                const response = await fetch(`/article/${articleId}`);
                if (!response.ok) {
                    throw new Error('Article not found');
                }
                const article = await response.json();
                renderArticleModal(article);
            } catch (error) {
                renderErrorModal(error.message);
            }
        }
        
        // Fungsi untuk merender konten modal
        function renderArticleModal(article) {
            const modalContent = document.getElementById('articleModalContent');
            
            // Format tanggal
            const publishedDate = new Date(article.published_at);
            const formattedDate = publishedDate.toLocaleDateString('id-ID', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            // Buat HTML untuk artikel
            const articleHTML = `
                <!-- Article Image -->
                <div class="mb-8 -mx-6 -mt-6 md:-mx-8 md:-mt-8">
                    <div class="h-64 md:h-80 overflow-hidden rounded-t-2xl">
                        <img 
                            src="${article.image}" 
                            alt="${article.title}"
                            class="w-full h-full object-cover">
                    </div>
                </div>
                
                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm rounded-full font-medium">
                        ${article.category}
                    </span>
                    <span class="text-sm text-gray-500">
                        ${formattedDate}
                    </span>
                    <span class="text-sm text-gray-500">•</span>
                    <span class="text-sm text-gray-500">
                        ${article.read_time}
                    </span>
                    <span class="text-sm text-gray-500">•</span>
                    <span class="text-sm text-gray-500">
                        Oleh: ${article.author}
                    </span>
                </div>
                
                <!-- Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-6">
                    ${article.title}
                </h1>
                
                <!-- Excerpt -->
                <div class="text-lg text-gray-700 mb-8 bg-blue-50 p-4 rounded-lg">
                    ${article.excerpt}
                </div>
                
                <!-- Content -->
                <div class="prose max-w-none text-gray-700 mb-8">
                    ${article.content.split('\n').map(paragraph => 
                        `<p class="mb-4">${paragraph}</p>`
                    ).join('')}
                </div>
                
                <!-- Tags -->
                <div class="mb-8">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">Tags:</h3>
                    <div class="flex flex-wrap gap-2">
                        ${article.tags.map(tag => 
                            `<span class="inline-block px-3 py-1.5 bg-gray-100 text-gray-700 border border-gray-200 rounded-lg text-sm font-medium">
                                ${tag}
                            </span>`
                        ).join('')}
                    </div>
                </div>
                
                <!-- Share Section -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Bagikan Artikel Ini</h3>
                    <div class="flex flex-wrap gap-3">
                        <button 
                            onclick="shareArticle('${article.title}', '${window.location.origin}/article/${article.id}')"
                            class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-medium hover:bg-blue-200 transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </button>
                        <button 
                            onclick="shareArticle('${article.title}', '${window.location.origin}/article/${article.id}')"
                            class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg font-medium hover:bg-blue-100 transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.213c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            Twitter
                        </button>
                        <button 
                            onclick="shareWhatsApp('${article.title}', '${window.location.origin}/article/${article.id}')"
                            class="px-4 py-2 bg-green-100 text-green-700 rounded-lg font-medium hover:bg-green-200 transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.72 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.76.982.998-3.675-.236-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.9 6.994c-.004 5.45-4.438 9.88-9.888 9.88m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.333.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.333 11.893-11.893 0-3.18-1.24-6.162-3.495-8.411"/>
                            </svg>
                            WhatsApp
                        </button>
                    </div>
                </div>
            `;
            
            modalContent.innerHTML = articleHTML;
        }
        
        // Fungsi untuk error modal
        function renderErrorModal(errorMessage) {
            const modalContent = document.getElementById('articleModalContent');
            modalContent.innerHTML = `
                <div class="text-center py-12">
                    <span class="text-5xl">😕</span>
                    <h3 class="text-xl font-semibold text-gray-700 mt-4 mb-2">Artikel Tidak Ditemukan</h3>
                    <p class="text-gray-500 mb-6">${errorMessage}</p>
                    <button 
                        onclick="closeArticleModal()"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Tutup
                    </button>
                </div>
            `;
        }
        
        // Fungsi untuk menutup modal
        function closeArticleModal() {
            const modal = document.getElementById('articleModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            
            // Reset konten modal
            document.getElementById('articleModalContent').innerHTML = `
                <div class="text-center py-12">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
                    <p class="mt-4 text-gray-600">Memuat artikel...</p>
                </div>
            `;
        }
        
        // Fungsi share ke WhatsApp
        function shareWhatsApp(title, url) {
            const text = `Baca artikel ini: "${title}" ${url}`;
            window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank');
        }
        
        // Fungsi share umum
        function shareArticle(title, url) {
            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: `Baca artikel ini: ${title}`,
                    url: url
                });
            } else {
                // Fallback untuk browser yang tidak support Web Share API
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
            }
        }
        
        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Close modal ketika klik di luar konten
            const modal = document.getElementById('articleModal');
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeArticleModal();
                    }
                });
            }
            
            // Close modal dengan Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                    closeArticleModal();
                }
            });
        });
    </script>
</x-layouts.app>