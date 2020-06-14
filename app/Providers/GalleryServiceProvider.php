<?php

namespace App\Providers;

use App\Services\Gallery\GalleryService;
use App\Services\Gallery\GalleryServiceInterface;
use Illuminate\Support\ServiceProvider;

class GalleryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GalleryServiceInterface::class, GalleryService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
