<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Category\CategoryEloquentRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Post\PostEloquentRepository;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Comment\CommentEloquentRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\User\UserEloquentRepository;
use App\Repositories\User\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider{

    public function register(){

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryEloquentRepository::class
        );

        $this->app->bind(
            PostRepositoryInterface::class,
            PostEloquentRepository::class
        );

        $this->app->bind(
            CommentRepositoryInterface::class,
            CommentEloquentRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserEloquentRepository::class
        );
    }

    public function boot() {
      
    }
}
