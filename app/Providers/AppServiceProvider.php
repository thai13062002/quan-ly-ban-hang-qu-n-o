<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\LikeProduct;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('user.layouts.master', function ($view) {
            $view->with('total_items',  Cart::where('user_id', auth()->id())->count());
        });
        view()->composer('user.layouts.master', function ($view) {
            $view->with('like_items',  LikeProduct::where('user_id', auth()->id())->count());
        });
    }
}
