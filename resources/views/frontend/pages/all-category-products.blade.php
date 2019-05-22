@extends('frontend.layouts.master')
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">Shop </li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-top-bar">
                    <div class="shop-tab nav">
                        <a class="active" href="#shop-1" data-toggle="tab">
                            <i class="fa fa-table"></i>
                        </a>
                        <a href="#shop-2" data-toggle="tab">
                            <i class="fa fa-list-ul"></i>
                        </a>
                    </div>
                </div>
                <div class="shop-bottom-area mt-35">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                @foreach ($categories->products as $product)
                                
                                    <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                        <div class="product-wrap mb-25 scroll-zoom">
                                            <div class="product-img">
                                                <a href="{{ route('front.product.details', ['slug' => $product->slug]) }}">
                                                    <img class="default-img" src="{{ asset($product->imagePath) }}" alt="">
                                                    <img class="hover-img" src="{{ asset($product->imagePath) }}" alt="">
                                                </a>
                                                <span class="pink">{{ $product->status }}</span>
                                                <div class="product-action">
                                                    <div class="pro-same-action pro-wishlist">
                                                        <a title="Wishlist" href="{{ route('front.product.details', ['slug' => $product->slug]) }}"><i class="pe-7s-like"></i></a>
                                                    </div>
                                                    <div class="pro-same-action pro-cart">
                                                        <a title="Add To Cart" href="{{ route('front.product.details', ['slug' => $product->slug]) }}"><i class="pe-7s-cart"></i> Add to cart</a>
                                                    </div>
                                                    <div class="pro-same-action pro-quickview">
                                                        <a title="Quick View" href="{{ route('front.product.details', ['slug' => $product->slug]) }}" data-toggle="modal" data-target="#modal-product-{{ $product->id }}"><i class="pe-7s-look"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <h3>
                                                    <a href="{{ route('front.product.details', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                                </h3>
                                                <div class="product-price">
                                                    <span>{{ numberToPriceFormat($product->price, '$', true) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="shop-2" class="tab-pane">
                            @foreach ($categories->products as $product)
                                <div class="shop-list-wrap mb-30">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6">
                                            <div class="product-wrap">
                                                <div class="product-img">
                                                    <a href="{{ route('front.product.details', ['slug' => $product->slug]) }}">
                                                        <img class="default-img" src="{{ asset($product->imagePath) }}" alt="">
                                                        <img class="hover-img" src="{{ asset($product->imagePath) }}" alt="">
                                                    </a>
                                                    <span class="pink">{{ $product->status }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-6">
                                            <div class="shop-list-content">
                                                <h3><a href="{{ route('front.product.details', ['slug' => $product->slug]) }}">{{ $product->name }}</a></h3>
                                                <div class="product-list-price">
                                                    <span>{{ numberToPriceFormat($product->price, '$', true) }}</span>
                                                </div>
                                                <p>{{ $product->description }}</p>
                                                <div class="shop-list-btn btn-hover">
                                                    <a href="#">ADD TO CART</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pro-pagination-style text-center mt-30">
                        {{-- {{ $products->links('frontend.layouts.partials.paginate') }} --}}
                    </div>
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar-style mr-30">
                    <div class="sidebar-widget">
                        <h4 class="pro-sidebar-title">Search </h4>
                        <div class="pro-sidebar-search mb-50 mt-25">
                            <form class="pro-sidebar-search-form" action="{{ route('front.searchProducts') }}" method="GET">
                                <input type="text" name="query" value="{{ $query ?? "" }}" placeholder="Search here...">
                                <button>
                                <i class="pe-7s-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget mt-45">
                        <h4 class="pro-sidebar-title">Filter By Price </h4>
                        <form class="pro-sidebar-search-form" id="search-form" action="{{ route('front.searchProductsByPrice') }}" method="POST">
                            @csrf
                            <div class="price-filter mt-10">
                                <div class="price-slider-amount">
                                    <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                </div>
                                <div id="slider-range"></div>
                            </div>
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a onclick="event.preventDefault(); document.getElementById('search-form').submit();" class="btn-block">Filter</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-css')
    <style>
        .cart-shiping-update {
            width: 100%;
        }

        .cart-shiping-update a {
            width: 100%;
            text-align: center;
        }
    </style>
@endsection