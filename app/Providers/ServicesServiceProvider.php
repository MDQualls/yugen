<?php

namespace App\Providers;

use App\Services\Tag\TagService;
use App\Services\Tag\TagServiceInterface;
use App\Services\Timeline\TimeLineDataService;
use App\Services\Timeline\TimeLineDataServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TagServiceInterface::class, TagService::class);
        $this->app->bind(TimeLineDataServiceInterface::class, TimeLineDataService::class);
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
