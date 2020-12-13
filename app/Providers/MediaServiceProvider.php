<?php

namespace App\Providers;

use App\Http\Controllers\VideoController;
use App\Services\Gallery\GalleryImageService;
use App\Services\Gallery\GalleryImageServiceInterface;
use App\Services\Video\Factory\VideoServiceFactory;
use App\Services\Video\VideoService;
use App\Services\Video\VideoServiceInterface;
use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GalleryImageServiceInterface::class, GalleryImageService::class);
        $this->app->bind(VideoServiceInterface::class, VideoService::class);
        $this->app->when([VideoController::class])
            ->needs(VideoServiceInterface::class)
            ->give(function ($app) {
                $factory = new VideoServiceFactory();
                return $factory->getInstance($app->make(config('adapter.video_adapter')));
            });
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
