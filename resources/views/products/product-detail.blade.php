@php
   $sizes = explode(',', $product->sizes); 
   $colors = explode(',', $product->colors); 
@endphp
<x-layout>
    <x-header-banner></x-header-banner>

    <div class="product-area single-pro-area pt-80 pb-80 product-style-2">
        <div class="container">	
            <div class="row shop-list single-pro-info no-sidebar">
                <!-- Single-product start -->
                <div class="col-lg-12">
                    <div class="single-product clearfix">
                        <!-- Single-pro-slider Big-photo start -->
                        <div class="single-pro-slider single-big-photo view-lightbox slider-for slick-initialized slick-slider">
                            <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 2170px;"><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 434px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                <img src="{{ asset('import/img/single-product/medium/1.jpg') }}" alt="">
                                <a class="view-full-screen" href="{{ asset('import/img/single-product/large/1.jpg') }}" data-lightbox="roadtrip" data-title="My caption" tabindex="0">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div><div class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 434px; position: relative; left: -434px; top: 0px; z-index: 998; opacity: 0;">
                                <img src="{{ asset('import/img/single-product/medium/2.jpg') }} " alt="">
                                <a class="view-full-screen" href="{{ asset('import/img/single-product/large/2.jpg') }}" data-lightbox="roadtrip" data-title="My caption" tabindex="-1">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div><div class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 434px; position: relative; left: -868px; top: 0px; z-index: 998; opacity: 0;">
                                <img src="{{ asset('import/img/single-product/medium/3.jpg') }}" alt="">
                                <a class="view-full-screen" href="{{ asset('import/img/single-product/large/3.jpg') }}" data-lightbox="roadtrip" data-title="My caption" tabindex="-1">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div><div class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide03" style="width: 434px; position: relative; left: -1302px; top: 0px; z-index: 998; opacity: 0;">
                                <img src="{{ asset('import/img/single-product/medium/4.jpg') }}" alt="">
                                <a class="view-full-screen" href="{{ asset('import/img/single-product/large/4.jpg') }}" data-lightbox="roadtrip" data-title="My caption" tabindex="-1">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div><div class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide04" style="width: 434px; position: relative; left: -1736px; top: 0px; z-index: 998; opacity: 0;">
                                <img src="{{ asset('import/img/single-product/medium/5.jpg') }}" alt="">
                                <a class="view-full-screen" href="{{ asset('import/img/single-product/large/5.jpg') }}" data-lightbox="roadtrip" data-title="My caption" tabindex="-1">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div></div></div>
                            
                        </div>	
                        <!-- Single-pro-slider Big-photo end -->								
                        <div class="product-info">
                            <div class="fix">
                                <h4 class="post-title floatleft">{{$product->product_name}}</h4>
                                <span class="pro-rating floatright">
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                    <span>( 27 Rating )</span>
                                </span>
                            </div>
                            <div class="fix mb-20">
                                <span class="pro-price">$ {{$product->price}}.00</span>
                            </div>
                            <div class="product-description">
                                <p>{{$product->product_description}}</p>
                            </div>
                            <!-- color start -->								
                            <div class="color-filter single-pro-color mb-20 clearfix">
                                <ul>
                                    <li><span class="color-title text-capitalize">color</span></li>
                                    @foreach($colors as $color)
                                    <li><a href="#"><span class="color color-{{$color}}"></span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- color end -->
                            <!-- Size start -->
                            <div class="size-filter single-pro-size mb-35 clearfix">
                                <ul> 
                                    <li><span class="color-title text-capitalize">size</span></li>
                                    @foreach($sizes as $size)
                                    <li><a href="#">{{$size}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Size end -->
                            <div class="clearfix">
                                <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                <div class="inc qtybutton">+</div></div>
                                <div class="product-action clearfix">
                                    <a href="/wishlist/{{$product->id}}/add" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                    <a href="/cart/{{$product->id}}/add" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                </div>
                            </div>
                            <!-- Single-pro-slider Small-photo start -->
                            <div class="single-pro-slider single-sml-photo slider-nav slick-initialized slick-slider"><div class="single-pro-arrow arrow-left slick-arrow" style=""><i class="zmdi zmdi-chevron-left"></i></div>
                                <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 1989px; transform: translate3d(-612px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-4" id="" aria-hidden="true" tabindex="-1" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/2.jpg') }}" alt="">
                                </div><div class="slick-slide slick-cloned" data-slick-index="-3" id="" aria-hidden="true" tabindex="-1" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/3.jpg') }}" alt="">
                                </div><div class="slick-slide slick-cloned" data-slick-index="-2" id="" aria-hidden="true" tabindex="-1" style="width: 153px;">
                                    <img src="{{ asset('import/img/img/single-product/small/4.jpg') }}" alt="">
                                </div><div class="slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true" tabindex="-1" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/5.jpg') }}" alt="">
                                </div><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/1.jpg') }}" alt="">
                                </div><div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide11" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/2.jpg') }}" alt="">
                                </div><div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide12" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/3.jpg') }}" alt="">
                                </div><div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide13" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/4.jpg') }}" alt="">
                                </div><div class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide14" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/5.jpg') }}" alt="">
                                </div><div class="slick-slide slick-cloned" data-slick-index="5" id="" aria-hidden="true" tabindex="-1" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/1.jpg') }}" alt="">
                                </div><div class="slick-slide slick-cloned" data-slick-index="6" id="" aria-hidden="true" tabindex="-1" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/2.jpg') }}" alt="">
                                </div><div class="slick-slide slick-cloned" data-slick-index="7" id="" aria-hidden="true" tabindex="-1" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/3.jpg') }}" alt="">
                                </div><div class="slick-slide slick-cloned" data-slick-index="8" id="" aria-hidden="true" tabindex="-1" style="width: 153px;">
                                    <img src="{{ asset('import/img/single-product/small/4.jpg') }}" alt="">
                                </div></div></div>
                                
                                
                                
                                
                            <div class="single-pro-arrow arrow-right slick-arrow" style=""><i class="zmdi zmdi-chevron-right"></i></div></div>
                            <!-- Single-pro-slider Small-photo end -->
                        </div>
                    </div>
                </div>
                <!-- Single-product end -->
            </div>
            
        </div>
    </div>
</x-layout>