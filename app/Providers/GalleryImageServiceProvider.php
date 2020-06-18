<?php

namespace App\Providers;

use App\Services\Gallery\GalleryImageService;
use App\Services\Gallery\GalleryImageServiceInterface;
use Illuminate\Support\ServiceProvider;

class GalleryImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GalleryImageServiceInterface::class, GalleryImageService::class);
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
