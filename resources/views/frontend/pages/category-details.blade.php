@extends('frontend.layouts.master')
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">Shop Details </li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details">
                    <div class="product-details-img">
                        <div class="tab-content jump">
                            @foreach($category->products as $categoryproduct)
                            @foreach ($categoryproduct->images as $image)
                            <div id="shop-details-{{ $image->id }}" class="tab-pane{{ $loop->first ? 'active' : '' }} large-img-style">
                                <img src="{{ asset("storage/" . $image->path) }}" alt="">
                                <span class="dec-price">{{$categoryproduct->status}}</span>
                                <div class="img-popup-wrap">
                                    <a class="img-popup" href="{{ asset("storage/" . $image->path) }}"><i class="pe-7s-expand1"></i></a>
                                </div>
                            </div>
                            @endforeach
                            
                            
                            
                        </div>
                        <div class="shop-details-tab nav">
                            @foreach ($categoryproduct->images as $image)
                            <a class="shop-details-overly" href="#shop-details-{{ $image->id }}" data-toggle="tab">
                                <img src="{{ asset("storage/" . $image->path)}}" alt="">
                            </a>
                            @endforeach
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                @foreach($category->products as $categoryproduct)
                <div class="product-details-content ml-70">
                    <h2>{{$categoryproduct->name}}</h2>
                    <div class="product-details-price">
                        <span>{{$categoryproduct->status}}</span>
                        <span class="old">$20.00 </span>
                    </div>
                    
                    <p>{{$categoryproduct->description}}</p>
                    <div class="pro-details-list">
                        <ul>
                            <li>- 0.5 mm Dail</li>
                            <li>- Inspired vector icons</li>
                            <li>- Very modern style  </li>
                        </ul>
                    </div>
                    
                    <div class="pro-details-quality">
                        <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                        <div class="inc qtybutton">+</div></div>
                        <div class="pro-details-cart btn-hover">
                            <a href="#">Add To Cart</a>
                        </div>
                        
                        
                    </div>
                    <div class="pro-details-meta">
                        <span>category:</span>
                        <ul>
                            <li>{{$category->name}}</li>
                            <li></li>
                            <li></li>
                        </ul>
                        
                    </div>
                    <div class="pro-details-meta">
                        <span>Tag :</span>
                        
                    </div>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-90">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-toggle="tab" href="#des-details1">Additional information</a>
                <a class="active" data-toggle="tab" href="#des-details2">Description</a>
                <a data-toggle="tab" href="#des-details3">Reviews (2)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                        <p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt </p>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane ">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>Weight</span> 400 g</li>
                            <li><span>Dimensions</span>10 x 10 x 15 cm </li>
                            <li><span>Materials</span> 60% cotton, 40% polyester</li>
                            <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                        </ul>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="assets/img/testimonial/1.jpg" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="assets/img/testimonial/2.jpg" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <input type="submit" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related-product-area pb-95">
    <div class="container">
        <div class="section-title text-center mb-50">
            <h2>Related products</h2>
        </div>
        <div class="related-product-active owl-carousel owl-loaded owl-drag">
            
            
            
            
            
            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1200px, 0px, 0px); transition: all 0s ease 0s; width: 3900px;"><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="product-wrap">
                <div class="product-img">
                    <a href="single-product.html">
                        <img class="default-img" src="assets/img/product/pro-2.jpg" alt="">
                        <img class="hover-img" src="assets/img/product/pro-2-1.jpg" alt="">
                    </a>
                    <span class="purple">New</span>
                    <div class="product-action">
                        <div class="pro-same-action pro-wishlist">
                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                        </div>
                        <div class="pro-same-action pro-cart">
                            <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                        </div>
                        <div class="pro-same-action pro-quickview">
                            <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-content text-center">
                    <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                    <div class="product-rating">
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="product-price">
                        <span>$ 60.00</span>
                    </div>
                </div>
            </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="product-wrap">
            <div class="product-img">
                <a href="#">
                    <img class="default-img" src="assets/img/product/pro-3.jpg" alt="">
                    <img class="hover-img" src="assets/img/product/pro-3-1.jpg" alt="">
                </a>
                <span class="pink">-10%</span>
                <div class="product-action">
                    <div class="pro-same-action pro-wishlist">
                        <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                    </div>
                    <div class="pro-same-action pro-cart">
                        <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                    </div>
                    <div class="pro-same-action pro-quickview">
                        <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                    </div>
                </div>
            </div>
            <div class="product-content text-center">
                <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
                <div class="product-rating">
                    <i class="fa fa-star-o yellow"></i>
                    <i class="fa fa-star-o yellow"></i>
                    <i class="fa fa-star-o yellow"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <div class="product-price">
                    <span>$ 60.00</span>
                    <span class="old">$ 60.00</span>
                </div>
            </div>
        </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="product-wrap">
        <div class="product-img">
            <a href="#">
                <img class="default-img" src="assets/img/product/pro-4.jpg" alt="">
                <img class="hover-img" src="assets/img/product/pro-4-1.jpg" alt="">
            </a>
            <span class="purple">New</span>
            <div class="product-action">
                <div class="pro-same-action pro-wishlist">
                    <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                </div>
                <div class="pro-same-action pro-cart">
                    <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                </div>
                <div class="pro-same-action pro-quickview">
                    <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                </div>
            </div>
        </div>
        <div class="product-content text-center">
            <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
            <div class="product-rating">
                <i class="fa fa-star-o yellow"></i>
                <i class="fa fa-star-o yellow"></i>
                <i class="fa fa-star-o yellow"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <div class="product-price">
                <span>$ 60.00</span>
            </div>
        </div>
    </div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="product-wrap">
    <div class="product-img">
        <a href="#">
            <img class="default-img" src="assets/img/product/pro-5.jpg" alt="">
            <img class="hover-img" src="assets/img/product/pro-5-1.jpg" alt="">
        </a>
        <span class="pink">-10%</span>
        <div class="product-action">
            <div class="pro-same-action pro-wishlist">
                <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
            </div>
            <div class="pro-same-action pro-cart">
                <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
            </div>
            <div class="pro-same-action pro-quickview">
                <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-look"></i></a>
            </div>
        </div>
    </div>
    <div class="product-content text-center">
        <h3><a href="product-details.html">T- Shirt And Jeans</a></h3>
        <div class="product-rating">
            <i class="fa fa-star-o yellow"></i>
            <i class="fa fa-star-o yellow"></i>
            <i class="fa fa-star-o yellow"></i>
            <i class="fa fa-star-o"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <div class="product-price">
            <span>$ 60.00</span>
            <span class="old">$ 60.00</span>
        </div>
    </div>
</div></div><div class="owl-item active" style="width: 270px; margin-right: 30px;"><div class="product-wrap">


</div></div><div class="owl-item active" style="width: 270px; margin-right: 30px;"><div class="product-wrap">


</div></div><div class="owl-item active" style="width: 270px; margin-right: 30px;"><div class="product-wrap">


</div></div><div class="owl-item active" style="width: 270px; margin-right: 30px;"><div class="product-wrap">


</div></div><div class="owl-item" style="width: 270px; margin-right: 30px;"><div class="product-wrap">


</div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="product-wrap">


</div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="product-wrap">

</div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="product-wrap">


</div></div><div class="owl-item cloned" style="width: 270px; margin-right: 30px;"><div class="product-wrap">


</div></div></div></div><div class="owl-nav disabled"><div class="owl-prev">prev</div><div class="owl-next">next</div></div><div class="owl-dots"><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div></div></div>
</div>
</div>
@endsection