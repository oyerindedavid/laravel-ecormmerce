@php
  $from = ($products->currentPage() - 1) * $products->perPage() + 1 ;
  $to =  $products->currentPage() != $products->lastPage() ? $products->perPage() * $products->currentPage() : $products->total();
  $prev_page = $products->path() . '/?page=' . $products->currentPage() - 1;
  $next_page = $products->path() . '/?page=' . $products->currentPage() + 1;
  $number_of_pages = $products->total() / $products->perPage();

@endphp

<x-layout>

	<div class="product-area pt-80 pb-80 product-style-2">
		<div class="container">
			<!-- Shop-Content End -->
			<div class="shop-content">
				<div class="row">
					<div class="col-md-12">
						<div class="product-option mb-30 clearfix">
							<div class="dropdown floatleft">
								<button class="option-btn">
								Color
								</button>
								<div class="dropdown-menu dropdown-width" >
									<!-- Widget-Color start -->
									<aside class="widget widget-color">
										<div class="widget-title">
											<h4>Color</h4>
										</div>
										<div class="widget-info color-filter clearfix">
											<ul>
												@foreach($colors as $color)
												<li><a href="index?color={{$color->id}}"><span class="color color-{{$color->id}}"></span>{{$color->name}}</a></li>
												@endforeach
											</ul>
										</div>
									</aside>
									<!-- Widget-Color end -->
								</div>
							</div>
							<div class="showing text-end">
								<p class="mb-0 d-none d-md-block">{{ 'Showing ' . $from . ' - ' . $to . ' of ' . $products->total()}} Results</p>
							</div>
						</div>						
					</div>	
					<div class="col-md-12">
						<div class="row">
							<!-- Single-product start -->
							@unless(count($products) == 0 )
							@foreach ($products as $product)
							<div class="col-xl-3 col-md-4">
								<div class="single-product">
									<div class="product-img">
										<span class="pro-label {{$product->is_New}}-label" id="prd-label-{{$product->id}}">{{$product->is_new}}</span>
										<span class="pro-price-2" >$<span id="prd-price-{{$product->id}}">{{$product->price}}</span></span>
										<span class="pro-price-2" id="prd-desc-{{$product->id}}" hidden>{{$product->product_description}}</span>
										<a href="/products/{{$product->id}}" id="prd-img-{{$product->id}}"><img src="{{ asset('import/img/product/' . $product->image_url . '.jpg') }}" alt="" /></a>
									</div>
									<x-action-and-rating :product="$product"></x-action-and-rating>
								</div>
							</div>
							@endforeach
                            @else
							<div class="col-md-12">
								<!-- Pagination start -->
								<div class="shop-pagination  text-center">
									<h3>Sorry, no product found.</h3>
								</div>
								<!-- Pagination end -->
							</div>
							@endunless
							<!-- Single-product end -->
						</div>
					</div>
					@if($products->total() > 0)
					<div class="shop-pagination  text-center">
						<div class="pagination">
							<ul>
								<li><a href="{{$products->currentPage() != 1 ? $prev_page : '#' }}"><i class="zmdi zmdi-long-arrow-left"></i></a></li>
								@for($i = 1; $i <= $number_of_pages; $i++)
								<li><a href="{{$products->path() . '/?page=' . $i}}">{{$i}}</a></li>
								@endfor
								<li><a href="{{$products->currentPage() !=  $products->lastPage() ? $next_page  : '#' }}"><i class="zmdi zmdi-long-arrow-right"></i></a></li>
							</ul>
						</div>
					</div>
					@endif
					
				</div>
			</div>
			<!-- Shop-Content End -->
		</div>
	</div>
</x-layout>

<script>
	function zoom(pid){
		var productName = $('#prd-name-'+pid).text();
		var productPrice = $('#prd-price-'+pid).text();
		var productImage = $('#prd-img-'+pid).html();
		var productOldPrice = parseFloat(productPrice) + 10; //A summng Old price = Price + 10
		var productLabel = $('#prd-label-'+pid).text();
		var productDescription = $('#prd-desc-'+pid).text();

		$('.m-prd-name').text(productName);
		$('.m-prd-price').text('$' + productPrice);
		$('.m-prd-old-price').text('$' +productOldPrice);  
		$('.m-prd-img').html(productImage);
		$('.m-prd-desc').text(productDescription);

		$('#productModal').modal('show');
	}

	
</script>