<?php

namespace App\Providers;

use App\Services\Post\SummerNoteImageInterface;
use App\Services\Post\SummerNoteImageService;
use Illuminate\Support\ServiceProvider;

class SummerNoteImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SummerNoteImageInterface::class, SummerNoteImageService::class);
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
