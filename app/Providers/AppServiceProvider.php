<?php

namespace App\Providers;

use DB;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\EntryProductRepositoryEloquent;
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

        // Product
        $this->app->bind('App\Repositories\ProductRepositoryInterface', 'App\Repositories\ProductRepositoryEloquent');

        // Entry Product
        $this->app->bind('App\Repositories\EntryProductRepositoryInterface', 'App\Repositories\EntryProductRepositoryEloquent');
    }
}
