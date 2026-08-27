<?php

namespace App\Services;

class BeforeAfterService
{
    public function all(): array
    {
        // Ambil data dari config
        // Jika tidak ada, fallback ke array kosong
        return config('Services.BeforeAfter.items', []);
    }

    public function find(int $id): ?array
    {
        // Loop seluruh item
        foreach ($this->all() as $item) {

            // Jika ID cocok, langsung kembalikan item
            if ($item['id'] === $id) {
                return $item;
            }
        }

        // Jika tidak ditemukan, kembalikan null
        return null;
    }
}
