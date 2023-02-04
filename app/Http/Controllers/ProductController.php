<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //Show all product listing
    public function index(){
        //dd($request->session()->get('cart')->products);
        //dd(request('color'));
        return view('homepage', [
            'products' => Product::latest()
                  ->filter(request(['color']))
                  ->paginate(8),
            'colors' => Color::get(),
        ]);
    }

    //Show a product
    public function show(Product $product){
        return view('products.product-detail',[
            'product' => $product
        ]);
    }

}