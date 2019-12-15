<?php

namespace App\Providers;

use App\Services\Post\HeaderImageInterface;
use App\Services\Post\HeaderImageService;
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
        $this->app->bind(HeaderImageInterface::class, HeaderImageService::class);
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
