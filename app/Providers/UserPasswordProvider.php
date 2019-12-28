<?php

namespace App\Providers;

use App\Services\User\AuthenticatePasswordInterface;
use App\Services\User\AuthenticatePasswordService;
use App\Services\User\UpdatePasswordInterface;
use App\Services\User\UpdatePasswordService;
use Illuminate\Support\ServiceProvider;

class UserPasswordProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UpdatePasswordInterface::class, UpdatePasswordService::class);
        $this->app->bind(AuthenticatePasswordInterface::class, AuthenticatePasswordService::class);
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
