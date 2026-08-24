<?php

namespace App\Services;

class TestimoniService
{
    public function all(): array
    {
        // Ambil data dari config
        // Jika tidak ada, fallback ke array kosong
        return config('Services.Testimoni.items', []);
    }
}