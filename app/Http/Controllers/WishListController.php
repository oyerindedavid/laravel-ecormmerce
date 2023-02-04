<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function store($id){
        if(!Auth::check()){
            return redirect('/login');
        }

        $product = Product::find($id);

        //Add product to wish list
        Wishlist::create([
            'product_id' => $product->id,
            'user_id' => auth()->id()
        ]);

        return redirect('/index');
    }

    public function destroy($id){
        $wishlist = Wishlist::where('product_id',$id)->get()->first();
        //dd($wishlist);
        
        if($wishlist->user_id == auth()->id()){
            $wishlist->delete();
        }

        return redirect('/cart?active-tab=wishlist');
    }


}
