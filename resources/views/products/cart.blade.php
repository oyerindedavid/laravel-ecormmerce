<x-layout>
   
    <div class="shopping-cart-area  pt-80 pb-80">
        <div class="container">	
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping-cart">
                        <!-- Nav tabs -->
                        <ul class="cart-page-menu nav row clearfix mb-30" role="tablist">
                            <li><a class="{{$active_tab == 'shopping-cart' ? 'active' : ''}}"   href="#shopping-cart" data-bs-toggle="tab" aria-selected="true" role="tab">shopping cart</a></li>
                            <li><a class="{{$active_tab == 'wishlist' ? 'active' : ''}}" href="#wishlist" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">wishlist</a></li>
                            <li><a class="{{$active_tab == 'checkout' ? 'active' : ''}}" href="#check-out" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">check out</a></li>
                            <li><a class="{{$active_tab == 'order-complete' ? 'active' : ''}}" href="#order-complete" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">order complete</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- shopping-cart start -->
                            <div class="tab-pane {{$active_tab == 'shopping-cart' ? 'active' : ''}}" id="shopping-cart" role="tabpanel">
                                
                                    <div class="shop-cart-table">
                                        <div class="table-content table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product-thumbnail">Product</th>
                                                        <th class="product-price">Price</th>
                                                        <th class="product-quantity">Quantity</th>
                                                        <th class="product-subtotal">Total</th>
                                                        <th class="product-remove">Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(Session::has('cart'))
                                                    @foreach($cart_products as $product)
                                                    <tr>
                                                        <td class="product-thumbnail  text-left">
                                                            <!-- Single-product start -->
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                    <a href="single-product.html"><img src="{{ asset('import/img/product/' . $product['product']['image_url'] . '.jpg') }}" alt=""></a>
                                                                </div>
                                                                <div class="product-info">
                                                                    <h4 class="post-title"><a class="text-light-black" href="#">{{$product['product']['product_name']}}</a></h4>
                                                                    <p class="mb-0">Color :  Black</p>
                                                                    <p class="mb-0">Size :     SL</p>
                                                                </div>
                                                            </div>
                                                            <!-- Single-product end -->												
                                                        </td>
                                                        <td class="product-price">${{$product['product']['price']}}</td>
                                                        <td class="product-remove">
                                                            <div class="row">
                                                                <div class="col-md-4"><a href="/cart/{{$product['product']['id']}}/edit?action=decrease"><i class="zmdi zmdi-minus"></i></a></div>
                                                                <div class="col-md-4">{{$product['qty']}}</div>
                                                                <div class="col-md-4"><a href="/cart/{{$product['product']['id']}}/edit?action=increase"><i class="zmdi zmdi-plus"></i></a></div>
                                                            </div>
                                                        </td>
                                                        <td class="product-subtotal">${{$product['product']['price'] * $product['qty'] }}</td>
                                                        <td class="product-remove">
                                                            <a href="/cart/{{$product['product']['id']}}/edit?action=remove"><i class="zmdi zmdi-close"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
													@endif
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @unless(Session::has('coupon'))
                                        <div class="col-md-6">
                                            <div class="customer-login mt-30">
                                                <form method="POST" action="/cart/coupon/apply">
                                                @csrf

                                                <h4 class="title-1 title-border text-uppercase">coupon discount</h4>
                                                <p class="text-gray">You can use any of these code as sample 1234xyyz,  5677rtyy,  7890yuio</p>
                                                @error('coupon')
                                                <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                @enderror
                                                <input type="text" placeholder="Enter your code here." name="coupon" value="{{old('coupon')}}">
                                                <button type="submit" data-text="apply coupon" class="button-one submit-button mt-15">apply coupon</button>
                                                </form>
                                            </div>
                                        </div>
                                        @else

                                        <div class="col-md-6">
                                            <div class="customer-login mt-30">
                                                <form method="POST" action="/cart/coupon/unapply">
                                                @csrf

                                                <h4 class="title-1 title-border text-uppercase">coupon applied</h4>
                                                <p class="text-gray">Use this button to unapply the coupon</p>
                                                @error('coupon')
                                                <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                @enderror
                                                <button type="submit" data-text="unapply coupon" class="button-one submit-button mt-15">Remove coupon</button>
                                                </form>
                                            </div>
                                        </div>
                                        @endunless
                                        
                                        <div class="col-md-6">
                                            <div class="customer-login payment-details mt-30">
                                                <h4 class="title-1 title-border text-uppercase">payment details</h4>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left">Cart Subtotal</td>
                                                            <td class="text-end">${{ $subtotal }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Vat</td>
                                                            <td class="text-end">${{$vat}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Shipping fee</td>
                                                            <td class="text-end">{{ Session::has('shipping_fee') ? '$' . Session::get('shipping_fee') : '--' }}</td>
                                                        </tr>
                                                        @if(Session::has('coupon'))
                                                        <tr>
                                                            <td class="text-left" style="color:rgb(61, 6, 6)" >Discount</td>
                                                            <td class="text-end" style="color:rgb(61, 6, 6)">${{Session::get('coupon')->amount}}</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td class="text-left">Total</td>
                                                            <td class="text-end">${{ $net_total }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <form action="/calculate/shipping_fee" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="customer-login mt-30">
                                                <h4 class="title-1 title-border text-uppercase">calculate shipping</h4>
                                                <p class="text-gray">Enter your coupon code if you have one!</p>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Address" id="address" name="address" value="{{old('address')}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Postal code" id="postal_code" name="postal_code" value="{{old('postal_code')}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="City" id="city" name="city" value="{{old('city')}}">
                                                    </div>
                                                </div>

                                                <button type="submit" data-text="Submit" class="button-one submit-button mt-15 ">Submit</button>
                                            </div>											
                                        </div>
                                    </form>
                                    </div>
                                	
                            </div>
                            <!-- shopping-cart end -->
                            <!-- wishlist start -->
                            <div class="tab-pane {{$active_tab == 'wishlist' ? 'active' : ''}}" id="wishlist" role="tabpanel">
                                <form action="#">
                                    <div class="shop-cart-table">
                                        <div class="table-content table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product-thumbnail">Product</th>
                                                        <th class="product-price">Price</th>
                                                        <th class="product-stock">stock status</th>
                                                        <th class="product-add-cart">Add to cart</th>
                                                        <th class="product-remove">Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($wishlist as $product)
                                                    <tr>
                                                        <td class="product-thumbnail  text-left">
                                                            <!-- Single-product start -->
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                    <a href="single-product.html"><img src="{{ asset('import/img/product/' . $product->image_url .'.jpg') }}" alt=""></a>
                                                                </div>
                                                                <div class="product-info">
                                                                    <h4 class="post-title"><a class="text-light-black" href="#"> {{$product->product_name}}</a></h4>
                                                                    <p class="mb-0">Color :  Black</p>
                                                                    <p class="mb-0">Size : SL</p>
                                                                </div>
                                                            </div>
                                                            <!-- Single-product end -->				
                                                        </td>
                                                        <td class="product-price">${{$product->price}}</td>
                                                        <td class="product-stock">in stock</td>
                                                        <td class="product-add-cart">
                                                            <a class="text-light-black" href="/cart/{{$product->id}}/add"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </td>
                                                        <td class="product-remove">
                                                            <form action="/wishlist/{{$product->id}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button data-text="delete" type="submit" class="button-one submit-btn-4"><i class="zmdi zmdi-close"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>									
                            </div>
                            <!-- wishlist end -->
                            <!-- check-out start -->
                            <div class="tab-pane {{$active_tab == 'checkout' ? 'active' : ''}}" id="check-out" role="tabpanel">
                                <form action="/place-order" method="POST">
                                    @csrf
                                    <div class="shop-cart-table check-out-wrap">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="billing-details pr-20">
                                                    <h4 class="title-1 title-border text-uppercase mb-30">billing details</h4>
                                                    <input type="text" placeholder="Your first name here..." name="b_firstname">
                                                    @error('b_firstname')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="Your last name here..." name="b_lastname">
                                                    @error('b_lastname')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="Address..." name="b_address">
                                                    @error('b_address')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="Postal code..." name="b_postal_code">
                                                    @error('b_postal_code')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="City..." name="b_city">
                                                    @error('b_city')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <select class="custom-select mb-15" name="b_country">
                                                        <option>Country</option>
                                                        <option value="US" selected>Canada</option>
                                                        <option value="CA">United States</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-xs-30">
                                                <div class="billing-details pl-20">
                                                    <h4 class="title-1 title-border text-uppercase mb-30">Shipping details</h4>
                                                    <input type="text" placeholder="Your first name here..." name="firstname">
                                                    @error('firstname')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="Your last name here..." name="lastname">
                                                    @error('lastname')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="Email..." name="email">
                                                    @error('email')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="Contact phone..." name="phone">
                                                    @error('phone')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="Address..." name="address">
                                                    @error('address')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="Postal code..." name="postal_code">
                                                    @error('postal_code')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <input type="text" placeholder="City..." name="city">
                                                    @error('city')
                                                    <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                                    @enderror
                                                    <select class="custom-select mb-15" name="country">
                                                        <option>Country</option>
                                                        <option value="US" selected>Canada</option>
                                                        <option value="CA">United States</option>
                                                    </select>
                                                    <p class="mb-0">
                                                        <input type="checkbox" name="update_address" value="1" checked>
                                                        <label for="address"><span>Save as my address</span></label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="our-order payment-details mt-60 pr-20">
                                                    <h4 class="title-1 title-border text-uppercase mb-30">our order</h4>
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th><strong>Product</strong></th>
                                                                <th class="text-end"><strong>Total</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(Session::has('cart'))
                                                            @foreach($cart_products as $product)
                                                            <tr>
                                                                <td>{{$product['product']['product_name']}}  x {{$product['qty']}}</td>
                                                                <td class="text-end">${{$product['product']['price'] * $product['qty'] }}</td>
                                                            </tr>
                                                            @endforeach
													        @endif
                                                            
                                                            <tr>
                                                                <td class="text-left">Cart Subtotal</td>
                                                                <td class="text-end">${{$subtotal}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Vat</td>
                                                                <td class="text-end">${{$vat}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Shipping fee</td>
                                                                <td class="text-end">{{ Session::has('shipping_fee') ? '$' . Session::get('shipping_fee') : '--' }}</td>
                                                            </tr>
                                                            @if(Session::has('coupon'))
                                                            <tr>
                                                                <td class="text-left" style="color:rgb(61, 6, 6)" >Discount</td>
                                                                <td class="text-end" style="color:rgb(61, 6, 6)">${{Session::get('coupon')->amount}}</td>
                                                            </tr>
                                                            @endif
                                                            <tr>
                                                                <td class="text-left">Total</td>
                                                                <td class="text-end">${{ $net_total }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- payment-method -->
                                            <div class="col-md-6">
                                                <div class="payment-method mt-60  pl-20">
                                                    <h4 class="title-1 title-border text-uppercase mb-30">payment method</h4>
                                                    <div class="payment-accordion">
                                                        <!-- Accordion start  -->
                                                        <h3 class="payment-accordion-toggle active">Direct Bank Transfer</h3>
                                                        <div class="payment-content default">
                                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
                                                        </div> 
                                                        <!-- Accordion end -->
                                                        <!-- Accordion start -->
                                                        <h3 class="payment-accordion-toggle">Cheque Payment</h3>
                                                        <div class="payment-content">
                                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                        </div>
                                                        <!-- Accordion end -->
                                                        <!-- Accordion start -->
                                                        <h3 class="payment-accordion-toggle">PayPal</h3>
                                                        <div class="payment-content">
                                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                            <a href="#"><img src="{{ asset('import/img/payment/1.png') }}" alt=""></a>
                                                            <a href="#"><img src="{{ asset('import/img/payment/2.png') }}" alt=""></a>
                                                            <a href="#"><img src="{{ asset('import/img/payment/3.png') }}" alt=""></a>
                                                            <a href="#"><img src="{{ asset('import/img/payment/4.png') }}" alt=""></a>
                                                        </div>
                                                        <!-- Accordion end --> 
                                                        <button class="button-one submit-button mt-15" data-text="place order" type="submit">place order</button>			
                                                    </div>															
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>											
                            </div>
                            <!-- check-out end -->
                            <!-- order-complete start -->
                            <div class="tab-pane {{$active_tab == 'order-complete' ? 'active' : ''}}" id="order-complete" role="tabpanel">
                                <form action="#">
                                    <div class="thank-recieve bg-white mb-30">
                                        <p>Thank you. Your order has been received.</p>
                                    </div>
                                    <div class="order-info bg-white text-center clearfix mb-30">
                                        <div class="single-order-info">
                                            <h4 class="title-1 text-uppercase text-light-black mb-0">order no</h4>
                                            <p class="text-uppercase text-light-black mb-0"><strong>{{ session('order_id') }}</strong></p>
                                        </div>
                                        <div class="single-order-info">
                                            <h4 class="title-1 text-uppercase text-light-black mb-0">Date</h4>
                                            <p class="text-uppercase text-light-black mb-0"><strong>{{ now()->toFormattedDateString() }}</strong></p>
                                        </div>
                                        <div class="single-order-info">
                                            <h4 class="title-1 text-uppercase text-light-black mb-0">Total</h4>
                                            <p class="text-uppercase text-light-black mb-0"><strong>$ {{ $net_total }}</strong></p>
                                        </div>
                                        <div class="single-order-info">
                                            <h4 class="title-1 text-uppercase text-light-black mb-0">payment method</h4>
                                            <p class="text-uppercase text-light-black mb-0"><a href="#"><strong>check payment</strong></a></p>
                                        </div>
                                    </div>
                                    <div class="shop-cart-table check-out-wrap">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="our-order payment-details pr-20">
                                                    <h4 class="title-1 title-border text-uppercase mb-30">our order</h4>
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th><strong>Product</strong></th>
                                                                <th class="text-end"><strong>Total</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(Session::has('cart'))
                                                            @foreach($cart_products as $product)
                                                            <tr>
                                                                <td>{{$product['product']['product_name']}}  x {{$product['qty']}}</td>
                                                                <td class="text-end">${{$product['product']['price'] * $product['qty'] }}</td>
                                                            </tr>
                                                            @endforeach
													        @endif
                                                            
                                                            <tr>
                                                                <td class="text-left">Cart Subtotal</td>
                                                                <td class="text-end">${{$subtotal}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Vat</td>
                                                                <td class="text-end">${{$vat}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Shipping fee</td>
                                                                <td class="text-end">{{ Session::has('shipping_fee') ? '$' . Session::get('shipping_fee') : '--' }}</td>
                                                            </tr>
                                                            @if(Session::has('coupon'))
                                                            <tr>
                                                                <td class="text-left" style="color:rgb(61, 6, 6)" >Discount</td>
                                                                <td class="text-end" style="color:rgb(61, 6, 6)">${{Session::get('coupon')->amount}}</td>
                                                            </tr>
                                                            @endif
                                                            <tr>
                                                                <td class="text-left">Total</td>
                                                                <td class="text-end">${{ $net_total }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- payment-method -->
                                            <div class="col-md-6 mt-xs-30">
                                                <div class="payment-method  pl-20">
                                                    <h4 class="title-1 title-border text-uppercase mb-30">payment method</h4>
                                                    <div class="payment-accordion">
                                                        <!-- Accordion start  -->
                                                        <h3 class="payment-accordion-toggle active">Direct Bank Transfer</h3>
                                                        <div class="payment-content default">
                                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
                                                        </div> 
                                                        <!-- Accordion end -->
                                                        <!-- Accordion start -->
                                                        <h3 class="payment-accordion-toggle">Cheque Payment</h3>
                                                        <div class="payment-content">
                                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                        </div>
                                                        <!-- Accordion end -->
                                                        <!-- Accordion start -->
                                                        <h3 class="payment-accordion-toggle">PayPal</h3>
                                                        <div class="payment-content">
                                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                            <a href="#"><img src="{{ asset('import/img/payment/1.png') }}" alt=""></a>
                                                            <a href="#"><img src="{{ asset('import/img/payment/2.png') }}" alt=""></a>
                                                            <a href="#"><img src="{{ asset('import/img/payment/3.png') }}" alt=""></a>
                                                            <a href="#"><img src="{{ asset('import/img/payment/4.png') }}" alt=""></a>
                                                        </div>
                                                        <!-- Accordion end --> 
                                                        <button class="button-one submit-button mt-15" data-text="place order" type="submit">place order</button>			
                                                    </div>															
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>										
                            </div>
                            <!-- order-complete end -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="shippingAddressModal" tabindex="-1" role="dialog">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     </div>
                     <div class="modal-body">
                         <div class="modal-product">
                             <div class="">
                                 <span class="text-center"><h3>Shipping Address</h3></span>
                                 <p><b>Entered Address</b></p>
                                 <p>This is the address you entered</p>
                                 <p><b>Recommended Address</b></p>
                                 <p>This is the address you entered</p>

                                 <div class="mt-30">
                                    <button class="btn btn-success" type="button">Uses Recommended</button><br>
                                </div>
                                 
                             </div><!-- .product-info -->
                         </div><!-- .modal-product -->
                     </div><!-- .modal-body -->
                 </div><!-- .modal-content -->
             </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
     </div>
</x-layout>



<script>
   $(document).ready(function(){
        const queryStrings = window.location.search;
        var urlParams = new URLSearchParams(queryStrings);

        if(urlParams.get('can_ship') == 0){
           alert('Sorry, we currently don\'t ship to this address');
        }

        switch(urlParams.get('prompt')){
            case 'b_address' :
                alert('Please enter a valid billing address');
            case 's_address' :
                alert('Please enter a valid shipping address');
        }

        $('.get-quote').click(function(){
          $('#shippingAddressModal').modal('show');
        });
    })
</script>