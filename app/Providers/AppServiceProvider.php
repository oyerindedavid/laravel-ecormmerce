<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Process;
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

            $subtotal = $cart->total_price;
            $coupon = Session::has('coupon') ? Session::get('coupon')->amount : 0;
            $shipping_fee = Session::has('shipping_fee') ? Session::get('shipping_fee') : 0;
              //Assuming vat is 10% 0f total purchase
            
            $process =  new Process();
            $vat = $process->calculateVat(subtotal:$subtotal); 
            $net_total = $process->calculateNetTotal(
                subtotal:$subtotal, 
                shipping_fee:$shipping_fee, 
                coupon:$coupon, 
                vat:$vat);
            
            $view->with('cart_products', $cart->products)
                ->with('cart_qty', $cart->total_qty)
                ->with('vat', $vat)
                ->with('subtotal', $subtotal)
                ->with('net_total', $net_total);
            });
    }
}
