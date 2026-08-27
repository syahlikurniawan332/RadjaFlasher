<?php

namespace App\Services;

use Illuminate\Support\Collection;

class GalleryService
{
    public function getGalleryItems(): Collection
    {
        $items = collect(config('gallery.items', []));

        return $items->map(function ($item) {
            return [
                'id' => $item['id'],
                'image' => $item['image'],
                'alt' => $item['alt'],
            ];
        });
    }

    public function getGalleryData(): array
    {
        $metadata = config('gallery.metadata', []);
        $items = $this->getGalleryItems();

        return [
            'title' => $metadata['title'] ?? 'Gallery - Radja Flasher',
            'description' => $metadata['description'] ?? 'Dokumentasi aktivitas servis Radja Flasher.',
            'galleryItems' => $items,
            'totalItems' => $items->count(), 
        ];
    }
}
