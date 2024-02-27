<?php

namespace App\Providers;

use App\Services\OhDearService;
use Illuminate\Support\ServiceProvider;

class OhDearServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(OhDearService::class, function ($app) {
            return new OhDearService(config('provider.ohdear.api_key'));
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
