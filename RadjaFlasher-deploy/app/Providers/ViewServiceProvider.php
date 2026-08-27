<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\BusinessHoursService;
use App\Services\ReviewService;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $businessHours = app(BusinessHoursService::class);
            $reviews = app(ReviewService::class)->all(12);

            $view->with([
                'isOpen' => $businessHours->isOpen(),
                'todayHours' => $businessHours->todayHours(),
                'reviews' => $reviews,
            ]);
        });
    }
}
