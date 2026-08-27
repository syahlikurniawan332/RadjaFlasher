<?php

namespace App\Services;

class ContentNavigationService
{
    public function tabs(string $active): array
    {
        $tabs = config('content_navigation.tabs', []);
        $result = [];

        foreach ($tabs as $key => $tab) {
            $result[] = array_merge($tab, [
                'key'       => $key,
                'is_active' => $active === $key,
            ]);
        }

        return $result;
    }
}
