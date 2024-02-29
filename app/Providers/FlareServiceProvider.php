<?php

namespace App\Providers;

use App\Services\FlareService;
use Illuminate\Support\ServiceProvider;

class FlareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(FlareService::class, function ($app) {
            return new FlareService(config('services.flare.key'), config('services.flare.uri'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
