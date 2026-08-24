<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ReviewService
{
    public function all(int $limit = 18): Collection
    {
        $path = resource_path('data/ulasan.csv');

        if (! is_file($path) || ! is_readable($path)) {
            return collect();
        }

        $handle = fopen($path, 'r');
        if ($handle === false) {
            return collect();
        }

        $header = fgetcsv($handle);
        if (! $header) {
            fclose($handle);
            return collect();
        }

        // Hilangkan UTF-8 BOM dari kolom pertama jika CSV berasal dari Excel/Pandas.
        $header[0] = preg_replace('/^\xEF\xBB\xBF/', '', $header[0]);

        $reviews = collect();

        while (($row = fgetcsv($handle)) !== false && $reviews->count() < $limit) {
            if (count($row) !== count($header)) {
                continue;
            }

            $item = array_combine($header, $row);
            if (! $item) {
                continue;
            }

            $rating = (float) ($item['rating'] ?? 0);
            $item['rating'] = max(0, min(5, $rating));
            $item['user'] = trim($item['user'] ?? 'Pelanggan');
            $item['review'] = trim($item['review'] ?? '');

            if ($item['review'] === '') {
                continue;
            }

            $reviews->push($item);
        }

        fclose($handle);

        return $reviews;
    }
}
