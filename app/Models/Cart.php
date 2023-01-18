<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

   public $products = null;
   public $total_qty = 0;
   public $total_price = 0;

   public function __construct($old_cart)
   {
       if($old_cart){
        $this->products = $old_cart->products;
        $this->total_qty = $old_cart->total_qty;
        $this->total_price = $old_cart->total_price;

       }
   }

   public function add($product, $id){
       $stored_product = ['qty'=>0, 'price'=>$product->price, 'product'=>$product];
       if($this->products){
            if(array_key_exists($id, $this->products)){
                $stored_product = $this->products[$id] ;
            }; 
       }  
       $stored_product['qty']++;
       $stored_product['price'] = $product->price * $stored_product['qty'];
       $this->products[$id] = $stored_product;
       $this->total_qty++;
       $this->total_price += $product->price;
   }

   public function decrease($product, $id){
        $stored_product = $this->products[$id] ;
        $stored_product['qty']--;
        $stored_product['price'] = $product->price * $stored_product['qty'];
        $this->products[$id] = $stored_product;
        $this->total_qty--;
        $this->total_price += $product->price;
  }

  public function remove($product, $id){
    $stored_product = $this->products[$id] ;
    unset($this->products[$id]);
    $this->total_qty = $this->total_qty - $stored_product['qty'] ;
    $this->total_price = $this->total_price - $stored_product['price'];
}

   
}
