<?php

namespace App\Providers;

use App\Services\Image\ImageResizeInterface;
use App\Services\Image\InterventionService;
use Illuminate\Support\ServiceProvider;

class InterventionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageResizeInterface::class, InterventionService::class);
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
