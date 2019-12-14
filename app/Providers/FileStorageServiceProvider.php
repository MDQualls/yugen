<?php

namespace App\Providers;

use App\Services\File\FileStorageInterface;
use App\Services\File\FileStorageService;
use Illuminate\Support\ServiceProvider;

class FileStorageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FileStorageInterface::class, FileStorageService::class);
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
