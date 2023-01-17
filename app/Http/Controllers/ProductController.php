<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //Show all product listing
    public function index(Request $request){
        //dd($request->session()->get('cart')->products);
        return view('homepage', [
            'products' => Product::latest()->Simplepaginate(8),
        ]);
    }

    //Show a product
    public function show(Product $product){
        return view('products.product-detail',[
            'product' => $product
        ]);
    }

}