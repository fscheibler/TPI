<?php

namespace App\Providers;

use App\Services\FlareService;
use Illuminate\Support\ServiceProvider;

class FlareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FlareService::class, function ($app) {
            return new FlareService(config('provider.flare.api_key'));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
