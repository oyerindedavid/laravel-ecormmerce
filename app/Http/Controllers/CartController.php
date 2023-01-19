<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //Show all product listing
    public function index(Request $request){
        return view('products.cart', [
            'active_tab' => request('active-tab'),
        ]); 
    }

    //Add product to cart
    public function add(Request $request, $id){
        $product = Product::find($id);
        $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($old_cart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect('/index');
    }

    //Increase decrease and delete from cart
    public function edit(Request $request, $id){
        $product = Product::find($id);
        $old_cart = $request->session()->get('cart');
        $cart = new Cart($old_cart);

        if($request['action'] == 'increase'){
            $cart->add($product, $product->id);
        }elseif($request['action'] == 'decrease'){
            $cart->decrease($product, $product->id);
        }elseif($request['action'] == 'remove'){
            $cart->remove($product, $product->id);
        }

        $request->session()->put('cart', $cart);
        
        return redirect('/cart?active-tab=shopping-cart');
    }

    //Empty the cart
    public function clear(Request $request){
        $request->session()->get('cart')->flush();

        return redirect('index');
    }

    
}
