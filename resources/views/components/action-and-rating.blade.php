@props(['product'])

<div class="product-info clearfix text-center">
    <div class="fix">
        <h4 class="post-title"><a href="#">{{$product->product_name}}</a></h4>
    </div>
    <div class="fix">
        <span class="pro-rating">
            <a href="#"><i class="zmdi zmdi-star"></i></a>
            <a href="#"><i class="zmdi zmdi-star"></i></a>
            <a href="#"><i class="zmdi zmdi-star"></i></a>
            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
        </span>
    </div>
    <div class="product-action clearfix">
        <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
        <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
        <a href="/cart/{{$product->id}}/add" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
    </div>
</div>