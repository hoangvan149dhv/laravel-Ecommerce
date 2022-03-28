<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            \App\Repositories\UsersRepository::class,
            \App\Repositories\UsersRepositoryEloquent::class
        );

        $this->app->bind(
            \App\Repositories\CategoriesRepository::class,
            \App\Repositories\CategoriesRepositoryEloquent::class
        );
        //:end-bindings:
    }
}
