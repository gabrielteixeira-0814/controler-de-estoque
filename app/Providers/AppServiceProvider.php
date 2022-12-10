<?php

namespace App\Providers;

use DB;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // User
        $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\UserRepositoryEloquent');

        // User
        $this->app->bind('App\Repositories\ProductRepositoryInterface', 'App\Repositories\ProductRepositoryEloquent');
    }
}
