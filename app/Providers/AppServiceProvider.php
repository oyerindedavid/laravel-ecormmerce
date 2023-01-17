<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view){
            $old_cart = Session::get('cart');
            $cart = new Cart($old_cart);
            $view->with('cart_products', $cart->products)
            ->with('cart_qty', $cart->total_qty)
            ->with('cart_total', $cart->total_price);
        });
    }
}
