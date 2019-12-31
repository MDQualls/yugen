<?php

namespace App\Providers;

use App\Services\Notification\ResponseAlertInterface;
use App\Services\Notification\ResponseAlertService;
use Illuminate\Support\ServiceProvider;

class UserAlertProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ResponseAlertInterface::class, ResponseAlertService::class);
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
