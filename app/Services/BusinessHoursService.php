<?php

namespace App\Services;
use Carbon\Carbon;

class BusinessHoursService
{
    public function isOpen(): bool
    {
        $now = Carbon::now();
        $dayKey = strtolower($now->format('D'));

        $hours = config('business.hours');

        if (! isset($hours[$dayKey])) {
            return false;
        }

        [$open, $close] = $hours[$dayKey];

        $openTime  = Carbon::createFromTimeString($open);
        $closeTime = Carbon::createFromTimeString($close);

        return $now->between($openTime, $closeTime);
    }

    public function todayHours(): array
    {
        $dayKey = strtolower(now()->format('D'));

        return config('business.hours')[$dayKey] ?? [];
    }
}
