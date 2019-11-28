<?php

namespace App\Providers;

use App\Services\Tag\TagService;
use App\Services\Tag\TagServiceInterface;
use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TagServiceInterface::class, TagService::class);
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
