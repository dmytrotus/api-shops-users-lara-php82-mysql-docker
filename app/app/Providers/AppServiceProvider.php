<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Weather;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('Weather', Weather::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
