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

    public function add(Request $request, $id){
        $product = Product::find($id);
        $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($old_cart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect('/index');
    }

    public function edit(Request $request, $id){
        $product = $request->session()->has('cart')[$id];
        dd($product);
    }

    public function delete(Request $request, $id){
        
    }

    
}
