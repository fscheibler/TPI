<?php

namespace App\Providers;

use App\Services\OhDearService;
use Illuminate\Support\ServiceProvider;

class OhDearServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() :void
    {
        $this->app->singleton(OhDearService::class, function ($app) {
            return new OhDearService(config('services.oh_dear.key'), config('services.oh_dear.uri'));
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
