<?php

namespace App\Providers;

use DB;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\EntryProductRepositoryEloquent;
use App\Repositories\ItemEntryProductRepositoryEloquent;
use App\Repositories\OutputProductRepositoryEloquent;
use App\Repositories\ItemOutputProductRepositoryEloquent;
use App\Repositories\ProductRequisitionRepositoryEloquent;
use App\Repositories\ItemProductRequisitionRepositoryEloquent;
use App\Repositories\InventoryRepositoryEloquent;
use App\Repositories\ReportRepositoryEloquent;
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

         // Item Entry Product
         $this->app->bind('App\Repositories\ItemEntryProductRepositoryInterface', 'App\Repositories\ItemEntryProductRepositoryEloquent');

        // Output Product
        $this->app->bind('App\Repositories\OutputProductRepositoryInterface', 'App\Repositories\OutputProductRepositoryEloquent');

        // Item Output Product
        $this->app->bind('App\Repositories\ItemOutputProductRepositoryInterface', 'App\Repositories\ItemOutputProductRepositoryEloquent');

        // Requisition Product
        $this->app->bind('App\Repositories\ProductRequisitionRepositoryInterface', 'App\Repositories\ProductRequisitionRepositoryEloquent');

        // Item Requisition Product
        $this->app->bind('App\Repositories\ItemProductRequisitionRepositoryInterface', 'App\Repositories\ItemProductRequisitionRepositoryEloquent');

        // Inventory
        $this->app->bind('App\Repositories\InventoryRepositoryInterface', 'App\Repositories\InventoryRepositoryEloquent');

        // Inventory
        $this->app->bind('App\Repositories\ReportRepositoryInterface', 'App\Repositories\ReportRepositoryEloquent');
    }
}
