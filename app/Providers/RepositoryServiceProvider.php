<?php

namespace App\Providers;

use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Timeline\TimelineDataTypeRepository;
use App\Repositories\Timeline\TimelineDataTypeRepositoryInterface;
use App\Repositories\Timeline\TimelineRepository;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Post\PostRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(TimelineRepositoryInterface::class, TimelineRepository::class);
        $this->app->bind(TimelineDataTypeRepositoryInterface::class, TimelineDataTypeRepository::class);
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
