<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Process;
use App\Models\Product;
use App\Models\ApiRequest;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ShippingDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //Show all product listing
    public function index(){

        $wishlist = DB::table('wishlists')
                        ->where('wishlists.user_id', auth()->id())
                        ->join('products', 'wishlists.product_id', '=','products.id')
                        ->get();

        return view('products.cart', [
            'active_tab' => request('active-tab'),
            'wishlist' => $wishlist
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

    public function apply_coupon(Request $request){
        $formField = $request->validate([
            'coupon' => 'required | min:8 | max:8'
        ]);

        $coupon = Coupon::where('code', $formField['coupon'])
                 ->get()
                 ->first();

        if($request->session()->has('coupon')){
            dd($request->session()->get('coupon'));
        }

        if(isset($coupon->code)){
            $request->session()->put('coupon', $coupon);
            return redirect('/cart?active-tab=shopping-cart');
        }else{
            return redirect('/cart?active-tab=shopping-cart')->withErrors(['coupon' => 'Invalid coupon']);
        }
    }

    public function unapply_coupon(Request $request){
        $request->session()->forget('coupon');

        return redirect('/cart?active-tab=shopping-cart');
    }

    public function calculate_shipping_fee(Request $request){
        $api = new ApiRequest();
        $process = new Process();

        $formField = $request->validate([
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required'
        ]);

        //Validate the user entered a address with google validation API
        $response = $api->validate_Address(
            address : $formField['address'], 
            postal_code : $formField['postal_code'],
            city : $formField['city']
        );
        $s_validation = $response['result']['verdict']['validationGranularity'];
        if($s_validation == 'OTHER'){
            //Prompt a change of shipping address if entry not ok
            return redirect('cart?active-tab=shopping-cart&prompt=s_address');
        }

        //Calculate distance of delivery to store
        $response_dis = $api->get_distance(
            from : '3173 E Shields Ave Fresno CA 93726wsl United States', 
            to : $response['result']['address']['formattedAddress'],
        );

        if($response_dis['rows'][0]['elements'][0]['status'] == 'ZERO_RESULTS'){
           return redirect('cart?active-tab=checkout&can_ship=0');
        }

        $distance = $response_dis['rows'][0]['elements'][0]['distance']['value'];

        //Calculate shipping fee base on disntace
        $result = $process->calculateShippingFee($distance);

        return redirect('cart?active-tab=shopping-cart&can_ship=' . $result['can_ship']);
   }

   public function place_order(Request $request){
       /*
          SUMMARY
          1. Laravel validation user entered billing and shipping information
          2. Google validation of user entered billing and shipping address
          3. Calculate distance from store to confirm if distance is covered
          4. Save record to database (order, address, shipping_info, transaction)
       */

       if(empty($request->session()->get('cart')->products)){
           return redirect('/index');
       }
  
       $api = new ApiRequest();
       $process = new Process();

       //Validate shipping and billing information
       $formField = $request->validate([
            'firstname' => 'required',
            'b_firstname' => 'required',
            'lastname' => 'required',
            'b_lastname' => 'required',
            'phone' => 'required | min:8',
            'email' => 'required | email',
            'address' => 'required',
            'b_address' => 'required',
            'postal_code' => 'required',
            'b_postal_code' => 'required',
            'city' => 'required',
            'b_city' => 'required'
       ]);

       $formField['update_address'] = $request->get('update_address');
       $formField['country'] = $request->get('country');

        //Validate billing address with google validation
        $b_response = $api->validate_Address(
            address:$formField['b_address'], 
            postal_code:$formField['b_postal_code'],
            city:$formField['b_city']
        );

        $b_validation = $b_response['result']['verdict']['validationGranularity'];
        if($b_validation == 'OTHER'){
            //Prompt a change of billing address if entry not ok
            return redirect('cart?active-tab=checkout&prompt=b_address');
        }

        //Validate shipping address
        $response = $api->validate_Address(
            address:$formField['address'], 
            postal_code:$formField['postal_code'],
            city:$formField['city']
        );
        $s_validation = $response['result']['verdict']['validationGranularity'];
        if($s_validation == 'OTHER'){
            //Prompt a change of shipping address if entry not ok
            return redirect('cart?active-tab=checkout&prompt=s_address');
        }

        //Calculate distance of delivery to store
        $response_dis = $api->get_distance(
            from : '3173 E Shields Ave Fresno CA 93726wsl United States', 
            to : $response['result']['address']['formattedAddress'],
        );
        //If no result for distance data
        if($response_dis['rows'][0]['elements'][0]['status'] == 'ZERO_RESULTS'){
            return redirect('cart?active-tab=checkout&can_ship=0');
        }
        $distance = $response_dis['rows'][0]['elements'][0]['distance']['value'];
        $result = $process->calculateShippingFee($distance); //Check if shipping covers this distance and determine shipping fee
        //If distance isnt covered
        if($result['can_ship'] == 0){
            return redirect('cart?active-tab=checkout&can_ship=' . $result['can_ship']);
        }

        //Update user address if user check the box
        if($formField['update_address'] == 1){
            Address::create([
                'address' => $formField['address'],
                'postal_code' => $formField['postal_code'],
                'city' => $formField['city'],
                'country' => $formField['country'],
                'user_id' => auth()->id()
            ]);
        }

        $order_id = Str::ulid();  //Create order number
        $old_cart = Session::get('cart');
        $cart = new Cart($old_cart);

        //Save ordered product to database
        foreach($cart->products as $product){
            Order::create([
                'id' => $order_id,
                'product_name' => $product['product']['product_name'],
                'quantity' => $product['qty'],
                'price' => $product['price'],
            ]);
        }

        //Save shipment information to database
        ShippingDetail::create([
            'order_id' => $order_id,
            'firstname' => $formField['firstname'],
            'lastname' => $formField['lastname'],
            'phone' => $formField['phone'],
            'email' => $formField['email'],
            'address' => $formField['address'],
            'postal_code' => $formField['postal_code'],
            'city' => $formField['city'],
            'country' => $formField['country'],
        ]);

        $coupon = Session::has('coupon') ? Session::get('coupon')->amount : 0;
        $shipping_fee = Session::has('shipping_fee') ? Session::get('shipping_fee') : 0;
        $process =  new Process();
        $vat = $process->calculateVat(subtotal:$cart->total_price); 
        $net_total = $process->calculateNetTotal(subtotal:$cart->total_price, shipping_fee:$shipping_fee, coupon:$coupon, vat:$vat);
        
        //Save transaction id
        Transaction::create([
            'id' => Str::ulid(),
            'order_id' => $order_id,
            'subtotal' => $cart->total_price,
            'shipping_fee' => Session::get('shipping_fee'),
            'vat' => $vat,
            'net_total' => $net_total,
            'discount' => Session::has('coupon') ? Session::get('coupon')->amount : '',
            'status' => 1
        ]);

        return redirect('cart?active-tab=order-complete')->with('order_id', $order_id);
    }  
}
