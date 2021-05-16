<?php

namespace App\Providers;

use App\Services\Log\LogService;
use App\Services\Log\LogServiceInterface;
use App\Services\Tag\TagService;
use App\Services\Tag\TagServiceInterface;
use App\Services\Timeline\TimeLineDataService;
use App\Services\Timeline\TimeLineDataServiceInterface;
use App\Services\Timeline\TimeLineService;
use App\Services\Timeline\TimeLineServiceInterface;
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
        $this->app->bind(TimeLineServiceInterface::class, TimeLineService::class);
        $this->app->bind(LogServiceInterface::class, LogService::class);
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
