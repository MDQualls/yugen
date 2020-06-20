<?php

namespace App\Providers;

use App\Services\Image\ImageStorageInterface;
use App\Services\Image\ImageStorageStorageService;
use Illuminate\Support\ServiceProvider;

class HeaderImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageStorageInterface::class, ImageStorageStorageService::class);
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
