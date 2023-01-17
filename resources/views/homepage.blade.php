<x-layout>

	<div class="product-area pt-80 pb-80 product-style-2">
		<div class="container">
			<!-- Shop-Content End -->
			<div class="shop-content">
				<div class="row">
					<div class="col-md-12">
						<div class="product-option mb-30 clearfix">
							<!-- Categories start -->
							<div class="dropdown floatleft">
								<button class="option-btn" >
								Categories
								</button>
								<div class="dropdown-menu dropdown-width" >
									<!-- Widget-Categories start -->
									<aside class="widget widget-categories">
										<div class="widget-title">
											<h4>Categories</h4>
										</div>
										<div id="cat-treeview"  class="widget-info product-cat boxscrol2">
											<ul>
												<li><span>Chair</span>
													<ul>
														<li><a href="#">T-Shirts</a></li>
														<li><a href="#">Striped Shirts</a></li>
														<li><a href="#">Half Shirts</a></li>
														<li><a href="#">Formal Shirts</a></li>
														<li><a href="#">Bilazers</a></li>
													</ul>
												</li>          
												<li class="open"><span>Furniture</span>
													<ul>
														<li><a href="#">Men Bag</a></li>
														<li><a href="#">Shoes</a></li>
														<li><a href="#">Watch</a></li>
														<li><a href="#">T-shirt</a></li>
														<li><a href="#">Shirt</a></li>
													</ul>
												</li>          
												<li><span>Accessories</span>
													<ul>
														<li><a href="#">T-Shirts</a></li>
														<li><a href="#">Striped Shirts</a></li>
														<li><a href="#">Half Shirts</a></li>
														<li><a href="#">Formal Shirts</a></li>
														<li><a href="#">Bilazers</a></li>
													</ul>
												</li>
												<li><span>Top Brands</span>
													<ul>
														<li><a href="#">T-Shirts</a></li>
														<li><a href="#">Striped Shirts</a></li>
														<li><a href="#">Half Shirts</a></li>
														<li><a href="#">Formal Shirts</a></li>
														<li><a href="#">Bilazers</a></li>
													</ul>
												</li>
												<li><span>Jewelry</span>
													<ul>
														<li><a href="#">T-Shirts</a></li>
														<li><a href="#">Striped Shirts</a></li>
														<li><a href="#">Half Shirts</a></li>
														<li><a href="#">Formal Shirts</a></li>
														<li><a href="#">Bilazers</a></li>
													</ul>
												</li>
											</ul>
										</div>
									</aside>
									<!-- Widget-categories end -->
								</div>
							</div>	
							<!-- Categories end -->
							<!-- Price start -->
							<div class="dropdown floatleft">
								<button class="option-btn" >
								Price
								</button>
								<div class="dropdown-menu dropdown-width" >
									<!-- Shop-Filter start -->
									<aside class="widget shop-filter">
										<div class="widget-title">
											<h4>Price</h4>
										</div>
										<div class="widget-info">
											<div class="price_filter">
												<div class="price_slider_amount">
													<input type="submit"  value="You range :"/> 
													<input type="text" id="amount" name="price"  placeholder="Add Your Price" /> 
												</div>
												<div id="slider-range"></div>
											</div>
										</div>
									</aside>
									<!-- Shop-Filter end -->
								</div>
							</div>	
							<!-- Price end -->
							<!-- Color start -->
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
												<li><a href="#"><span class="color color-1"></span>LightSalmon<span class="count">12</span></a></li>
												<li><a href="#"><span class="color color-2"></span>Dark Salmon<span class="count">20</span></a></li>
												<li><a href="#"><span class="color color-3"></span>Tomato<span class="count">59</span></a></li>
												<li><a class="active" href="#"><span class="color color-4"></span>Deep Sky Blue<span class="count">45</span></a></li>
												<li><a href="#"><span class="color color-5"></span>Electric Purple<span class="count">78</span></a></li>
												<li><a href="#"><span class="color color-6"></span>Atlantis<span class="count">10</span></a></li>
												<li><a href="#"><span class="color color-7"></span>Deep Lilac<span class="count">15</span></a></li>
											</ul>
										</div>
									</aside>
									<!-- Widget-Color end -->
								</div>
							</div>
							<!-- Color end -->
							<!-- Size start -->
							<div class="dropdown floatleft">
								<button class="option-btn">
								Size
								</button>
								<div class="dropdown-menu dropdown-width" >
									<!-- Widget-Size start -->
									<aside class="widget widget-size">
										<div class="widget-title">
											<h4>Size</h4>
										</div>
										<div class="widget-info size-filter clearfix">
											<ul>
												<li><a href="#">M</a></li>
												<li><a class="active" href="#">S</a></li>
												<li><a href="#">L</a></li>
												<li><a href="#">SL</a></li>
												<li><a href="#">XL</a></li>
											</ul>
										</div>
									</aside>
									<!-- Widget-Size end -->
								</div>
							</div>	
							<!-- Size end -->								
							<div class="showing text-end">
								<p class="mb-0 d-none d-md-block">Showing 01-09 of 17 Results</p>
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
										<span class="pro-label {{$product->is_New}}-label">{{$product->is_new}}</span>
										<span class="pro-price-2">$ {{$product->price}}.00</span>
										<a href="/products/{{$product->id}}"><img src="{{ asset('import/img/product/' . $product->image_url . '.jpg') }}" alt="" /></a>
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
					<div class="col-md-12">
						<!-- Pagination start -->
						<div class="text-center">
							{{$products->links()}}
						</div>
						<!-- Pagination end -->
					</div>
				</div>
			</div>
			<!-- Shop-Content End -->
		</div>
	</div>

	
</x-layout>