<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // You can cache this for performance
        $settings = Cache::remember('site_settings', now()->addHours(1), function () {
            return Setting::first();
        });

        // Share with all views
        View::share('settings', $settings);
    }
}
