<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use App\Services\GalleryService;
use App\Services\BeforeAfterService;
use App\Services\TestimoniService;
use App\Services\ContentNavigationService;

class HomePageController extends Controller
{
    public function __construct(
        protected GalleryService $galleryService,
    ) {}


    public function index(ReviewService $reviewService)
    {
        return view('pages.home', [
            'reviews' => $reviewService->all(),
        ]);
    }

    public function services(
        ContentNavigationService $navigation,
        BeforeAfterService $beforeAfterService,
        TestimoniService $testimoniService

    ) {
        // Ambil tipe konten dari query string
        // Default ke before-after agar konsisten dengan fokus awal
        $type = request('type', 'before-after');
        $allowedTypes = ['before-after', 'testimonials'];
        if (! in_array($type, $allowedTypes, true)) {
            $type = 'before-after';
        }

        // Variabel data yang akan dikirim ke view
        $items = [];

        // hitung items berdasarkan tipe
        $counts = [
            'testimonials'    => count($testimoniService->all()),
            'before-after' => count($beforeAfterService->all()),
        ];

        // Tentukan domain service berdasarkan tipe konten
        switch ($type) {

            case 'testimonials':
                $items = $testimoniService->all();
                break;

            case 'before-after':
                // Ambil seluruh data before & after
                $items = $beforeAfterService->all();
                break;

                // case 'services':
                //     $items = $serviceCatalogService->all();
                //     break;

        }

        return view('pages.services', [
            // Judul halaman
            'title' => 'Dokumentasi Layanan Servis HP - Radja Flasher',
            'description' => 'Dokumentasi before & after serta testimoni terkait layanan perbaikan Android dan iPhone di Radja Flasher.',

            // Tab navigasi (UI concern)
            'tabs'  => $navigation->tabs($type),

            // Tipe konten aktif
            'type'  => $type,

            // Data utama untuk dirender
            'items' => $items,

            // Hitungan item per kategori
            'counts' => $counts,
        ]);
    }


    public function gallery()
    {
        return view('pages.gallery', $this->galleryService->getGalleryData());
    }

    public function article()
    {
        return view('pages.article', [
            'articles' => config('articles', []),
            'title' => 'Artikel & Tips Perawatan HP - Radja Flasher',
            'description' => 'Artikel dan tips praktis seputar perawatan Android dan iPhone, troubleshooting, serta informasi sebelum melakukan servis perangkat.',
        ]);
    }

    public function getArticle(int $id)
    {
        $article = collect(config('articles', []))->firstWhere('id', $id);

        abort_if(! $article, 404);

        return response()->json($article);
    }
}
