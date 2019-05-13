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
                        	@foreach ($product->images as $image)
	                            <div id="shop-details-{{ $image->id }}" class="tab-pane {{ $loop->first ? 'active' : '' }} large-img-style">
	                                <img src="{{ asset("storage/" . $image->path) }}" alt="">
	                                <span class="dec-price">{{ $product->status }}</span>
	                                <div class="img-popup-wrap">
	                                    <a class="img-popup" href="{{ asset("storage/" . $image->path) }}"><i class="pe-7s-expand1"></i></a>
	                                </div>
	                            </div>
                            @endforeach
                        </div>
                        <div class="shop-details-tab nav">
                            @foreach ($product->images as $image)
	                            <a class="shop-details-overly" href="#shop-details-{{ $image->id }}" data-toggle="tab">
	                                <img src="{{ asset("storage/" . $image->path) }}" alt="">
	                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <form id="cart-form" action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                    <div class="product-details-content ml-70">
                        <h2>{{ $product->name }}</h2>
                        <div class="product-details-price">
                            <span>{{ $product->price }}</span>
                        </div>
                        <p>{{ $product->description }}</p>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qte" value="1">
                                @if ($errors->has('qte'))
                                    <span class="text-danger">
                                        {{ $errors->first('qte') }}
                                    </span>
                                @endif
                            </div>
                            <div class="pro-details-cart btn-hover">
                                @if(existsOnBasket($product->id))
                                    <a href="#" disabled>Already Added</a>
                                @else
                                    <a onclick="event.preventDefault(); document.getElementById('cart-form').submit();">Add to cart</a>
                                @endif
                            </div>
                        </div>
                        <div class="pro-details-meta">
                            <span>Categories :</span>
                            <ul>
                                <li><a href="#">{{ $product->category->name }}</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-90">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-toggle="tab" href="#des-details1">Description</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>{{ $product->description }}</p>
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
        <div class="related-product-active owl-carousel">
            @foreach ($product->relatedProducts as $relatedProduct)
	            <div class="product-wrap">
	                <div class="product-img">
	                    <a href="#">
	                        <img class="default-img" src="{{ asset($relatedProduct->imagePath) }}" alt="">
	                        <img class="hover-img" src="{{ asset($relatedProduct->imagePath) }}" alt="">
	                    </a>
	                    <span class="pink">{{ $relatedProduct->status }}</span>
	                </div>
	                <div class="product-content text-center">
	                    <h3><a href="{{ route('front.product.details', ['slug' => $relatedProduct->slug]) }}">{{ $relatedProduct->name }}</a></h3>
	                    <div class="product-price">
	                        <span>{{ numberToPriceFormat($relatedProduct->price, '$', true) }}</span>
	                    </div>
	                </div>
	            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection