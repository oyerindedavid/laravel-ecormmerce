<?php

namespace App\Models;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class Process 
{
    use HasFactory;

    public function calculateNetTotal($subtotal, $vat, $shipping_fee, $coupon) : string{

        $net_total = round($subtotal + $shipping_fee + $vat, 2) - $coupon;

        return $net_total;
    }

    public function calculateVat($subtotal){

        //Assuming vat is 10% 0f subtotal
        return round(0.1 * $subtotal, 2);
    }

    public function  calculateShippingFee($distance) : array{

        if($distance < 500000){
            $data['shipping_fee'] = 50;
            $data['can_ship'] = 1;
            Request::session()->put('shipping_fee', $data['shipping_fee']);
        }else{
            $data['can_ship'] = 0;
        }

        return $data;
    }
}
