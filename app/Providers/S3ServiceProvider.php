<?php

namespace App\Providers;

use App\Services\File\FileStorageWithUrlInterface;
use App\Services\File\S3FileService;
use Illuminate\Support\ServiceProvider;

class S3ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FileStorageWithUrlInterface::class, S3FileService::class);
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
