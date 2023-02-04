<!doctype html>
<html class="" lang="en">
	
<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Home two || Hurst</title>
		<meta name="description" content="Hurst – Furniture Store eCommerce HTML Template is a clean and elegant design – suitable for selling flower, cookery, accessories, fashion, high fashion, accessories, digital, kids, watches, jewelries, shoes, kids, furniture, sports….. It has a fully responsive width adjusts automatically to any screen size or resolution.">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		
		
		<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="{{ asset('import/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('import/css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('import/css/jquery-ui.min.css') }}">
		<link rel="stylesheet" href="{{ asset('import/css/meanmenu.min.css') }}">
		<link rel="stylesheet" href="{{ asset('import/lib/css/nivo-slider.css') }}">
		<link rel="stylesheet" href="{{ asset('import/lib/css/preview.css') }}">
		<link rel="stylesheet" href="{{ asset('import/css/slick.min.css') }}">
		<link rel="stylesheet" href="{{ asset('import/css/lightbox.min.css') }}">
		<link rel="stylesheet" href="{{ asset('import/css/material-design-iconic-font.css') }}">
		<link rel="stylesheet" href="{{ asset('import/css/default.css') }}">
		<link rel="stylesheet" href="{{ asset('import/css/style.min.css') }}">
        <link rel="stylesheet" href="{{ asset('import/css/shortcode.css') }}">
		<link rel="stylesheet" href="{{ asset('import/css/responsive.css') }}">
		<script src="{{ asset('import/js/vendor/modernizr-3.11.2.min.js') }}"></script>
	</head>
	<body>	
		<!-- WRAPPER START -->
		<div class="wrapper bg-dark-white">
            <header id="sticky-menu" class="header header-2">
				<div class="header-area">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-4 offset-md-4 col-7">
								<div class="logo text-md-center">
									<a href="/index"><img src="{{ asset('import/img/logo/logo.png') }}" alt="" /></a>
								</div>
							</div>
							<div class="col-md-4 col-5">
								<div class="mini-cart text-end">
									<ul>
										<li>
											<a class="cart-icon" href="#">
												<i class="zmdi zmdi-shopping-cart"></i>
												<span>{{$cart_qty ?? 0}}</span>
											</a>
											<div class="mini-cart-brief text-left">
												<div class="cart-items">
													<p class="mb-0">You have <span>{{$cart_qty}} items</span> in your shopping bag</p>
												</div>
												<div class="all-cart-product clearfix">
													@if(Session::has('cart'))
													@foreach($cart_products as $product)
													<div class="single-cart clearfix">
														<div class="cart-photo">
															<a href="#"><img src="{{ asset('import/img/cart/' . $product['product']['image_url'] . '.jpg') }}" alt="" /></a>
														</div>
														<div class="cart-info">
															<h5><a href="#">{{$product['product']['product_name']}}</a></h5>
															<p class="mb-0">Price : $ {{$product['product']['price']}}</p>
															<p class="mb-0">Qty : {{$product['qty']}} </p>
															<span class="cart-delete"><a href="/cart/{{$product['product']['id']}}/edit?action=remove"><i class="zmdi zmdi-close"></i></a></span>
														</div>
													</div>
													@endforeach
													@endif
												</div>
												@unless(!isset($cart_products))
												<div class="cart-totals">
													<h5 class="mb-0">Total <span class="floatright">${{$subtotal}}</span></h5>
												</div>
												@endunless
												
												<div class="cart-bottom  clearfix">
													<a href="/cart?active-tab=shopping-cart" class="button-one floatleft text-uppercase" data-text="View cart">View cart</a>
													<a href="/cart?active-tab=checkout" class="button-one floatright text-uppercase" data-text="Check out">Check out</a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- MAIN-MENU START -->
				<div class="menu-toggle menu-toggle-2 hamburger hamburger--emphatic d-none d-md-block">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
				<div class="main-menu  d-none d-md-block">
					<nav>
						<ul>
							@auth
							<li><a href="">Welcome {{auth()->user()->name}}</a></li>
							<li><a href="/cart?active-tab=wishlist">Wishlist</a></li>
							<li><a href="/logout">Logout</a></li>
							@else
							<li><a href="/login">Login</a></li>
							<li><a href="/index">Shop</a></li>
							@endauth
						</ul>
					</nav>
				</div>
				<!-- MAIN-MENU END -->
			</header>
			
			{{$slot}}
			
			<footer>
				<!-- Footer-area start -->
				<div class="footer-area footer-2">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="single-footer">
									<h3 class="footer-title  title-border">Contact Us</h3>
									<ul class="footer-contact">
										<li><span>Address :</span>28 Green Tower, Street Name,<br>New York City, USA</li>
										<li><span>Cell-Phone :</span>012345 - 123456789</li>
										<li><span>Email :</span>your-email@gmail.com</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-6">
								<div class="single-footer">
									<h3 class="footer-title  title-border">accounts</h3>
									<ul class="footer-menu">
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>My Account</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>My Wishlist</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>My Cart</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Sign In</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Check out</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-6">
								<div class="single-footer">
									<h3 class="footer-title  title-border">shipping</h3>
									<ul class="footer-menu">
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>New Products</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Top Sellers</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Manufactirers</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Suppliers</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Specials</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="single-footer newsletter-item">
									<h3 class="footer-title  title-border">Email Newsletters</h3>
									<div class="footer-subscribe">
										<form action="#">
											<input type="text" name="email" placeholder="Email Address..." />
											<button class="button-one submit-btn-4" type="submit" data-text="Subscribe">Subscribe</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Footer-area end -->
				<!-- Copyright-area start -->
				<div class="copyright-area copyright-2">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="copyright">
									<p class="mb-0">&copy; <a href="https://themeforest.net/user/codecarnival/portfolio" target="_blank">CodeCarnival </a> 2022. All Rights Reserved.</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="payment  text-md-end">
									<a href="#"><img src="{{ asset('import/img/payment/1.png')  }}" alt="" /></a>
									<a href="#"><img src="{{ asset('import/img/payment/2.png')  }}" alt="" /></a>
									<a href="#"><img src="{{ asset('import/img/payment/3.png')  }}" alt="" /></a>
									<a href="#"><img src="{{ asset('import/img/payment/4.png')  }}" alt="" /></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Copyright-area start -->
			</footer>
			
			<div id="quickview-wrapper">
			   <!-- Modal -->
			   <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<div class="modal-product">
									<div class="product-images">
										<div class="main-image images m-prd-img">
											<img alt="#" src="{{ asset('import/img/product/quickview-photo.jpg')  }}"/>
										</div>
									</div><!-- .product-images -->

									<div class="product-info">
										<h1 class="m-prd-label">Aenean eu tristique</h1>
										<div class="price-box-3">
											<hr />
											<div class="s-price-box">
												<span class="new-price m-prd-price" ></span>
												<span class="old-price m-prd-old-price"></span>
											</div>
											<hr />
										</div>
										<div class="quick-add-to-cart">
											<form method="post" class="cart">
												<div class="numbers-row">
													<input type="number" id="french-hens" value="3" min="1">
												</div>
												<button class="single_add_to_cart_button" type="submit">Add to cart</button>
											</form>
										</div>
										<div class="quick-desc m-prd-desc"></div>
										<div class="social-sharing">
											<div class="widget widget_socialsharing_widget">
												<h3 class="widget-title-modal">Share this product</h3>
												<ul class="social-icons">
													<li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="zmdi zmdi-google-plus"></i></a></li>
													<li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="zmdi zmdi-twitter"></i></a></li>
													<li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="zmdi zmdi-facebook"></i></a></li>
													<li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
												</ul>
											</div>
										</div>
									</div><!-- .product-info -->
								</div><!-- .modal-product -->
							</div><!-- .modal-body -->
						</div><!-- .modal-content -->
					</div><!-- .modal-dialog -->
			   </div>
			   <!-- END Modal -->
			</div>
				
			
		</div>
		<script src="{{ asset('import/js/vendor/jquery-3.6.0.min.js') }}"></script>
		<script src="{{ asset('import/js/vendor/jquery-migrate-3.3.2.min.js') }} "></script>
		<script src="{{ asset('import/js/bootstrap.bundle.min.js') }} "></script>
		<script src="{{ asset('import/js/jquery.meanmenu.js') }}"></script>
		<script src="{{ asset('import/js/slick.min.js') }}"></script>
		<script src="{{ asset('import/js/jquery.treeview.js') }}"></script>
		<script src="{{ asset('import/js/lightbox.min.js') }}"></script>
		<script src="{{ asset('import/js/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('import/lib/js/jquery.nivo.slider.js') }}"></script>
		<script src="{{ asset('import/lib/home.js') }}"></script>
		<script src="{{ asset('import/js/jquery.nicescroll.min.js') }}"></script>
		<script src="{{ asset('import/js/countdon.min.js') }}"></script>
		<script src="{{ asset('import/js/wow.min.js') }}"></script>
		<script src="{{ asset('import/js/plugins.js') }}"></script>
		<script src="{{ asset('import/js/main.min.js') }}"></script>
	</body>

</html>
