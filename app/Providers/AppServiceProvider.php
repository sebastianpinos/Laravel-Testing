<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MusicService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */


    public function register()
    {
        $this->app->singleton(MusicService::class, function ($app) {
            return new MusicService();
        });
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
