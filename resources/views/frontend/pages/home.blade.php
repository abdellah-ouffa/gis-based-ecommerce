@extends('frontend.layouts.master')
@section('content')

@include('frontend.layouts.partials.slider')
<div class="collections-area pt-100 pb-95">
	<div class="container">
		<div class="section-title-3 mb-40">
			<h4>Categories</h4>
		</div>
		<div class="collection-wrap">
			<div class="collection-active owl-carousel">
				@foreach($categories as $category)
					<div class="collection-product">
						<div class="collection-img">
							<a href="{{ route('front.category.details', ['id' => $category->id]) }}">
								<img src="{{ asset($category->imagePath) }}" alt="">
							</a>
						</div>
						<div class="collection-content text-center">
							<span>{{ $category->countProducts }} Products</span>
							<h4><a href="#">{{ $category->name }}</a></h4>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<div class="product-area pb-70">
	<div class="container">
		<div class="tab-filter-wrap mb-60">
			<div class="product-tab-list-2 nav">
				<a class="active" href="#product-1" data-toggle="tab" >
					<h4> Random Products </h4>
				</a>
			</div>
		</div>
		<div class="tab-content jump">
			<div class="tab-pane active" id="product-1">
				<div class="row">
					@foreach($products as $product)
						<div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
							<div class="product-wrap-5 mb-25 scroll-zoom">
								<div class="product-img">
									<a href="{{ route('front.product.details', ['slug' => $product->slug]) }}">
										<img src="{{ $product->imagePath }}" alt="">
									</a>
									<span class="purple">{{ $product->status }}</span>
									<div class="product-action-4">
										<div class="pro-same-action pro-cart">
											<a title="Add To Cart" href="#"><i class="pe-7s-cart"></i></a>
										</div>
										<div class="pro-same-action pro-quickview">
											<a title="Quick View" href="#" data-toggle="modal" data-target="#product-{{ $product->id }}"><i class="pe-7s-look"></i></a>
										</div>
									</div>
								</div>
								<div class="product-content-5 text-center">
									<h3>
										<a href="{{ route('front.product.details', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
									</h3>
									<div class="price-5">
										<span>{{ numberToPriceFormat($product->price, '$', true) }}</span>
									</div>
								</div>
							</div>
						</div>

						<!-- Modal -->
						<div class="modal fade" id="product-{{ $product->id }}" tabindex="-1" role="dialog">
						    <div class="modal-dialog" role="document">
						        <div class="modal-content">
						            <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
						            </div>
						            <div class="modal-body">
						                <div class="row">
						                    <div class="col-md-5 col-sm-12 col-xs-12">
						                        <div class="tab-content quickview-big-img">
						                            @foreach ($product->images as $image)
							                            <div id="pro-{{ $image->id }}" class="tab-pane fade {{ $loop->first ? 'active show' : '' }}">
							                                <img src="{{ asset("storage/" . $image->path) }}" alt="">
							                            </div>
						                            @endforeach
						                        </div>
						                        <!-- Thumbnail Large Image End -->
						                        <!-- Thumbnail Image End -->
						                        <div class="quickview-wrap mt-15">
						                            <div class="quickview-slide-active owl-carousel nav nav-style-1" role="tablist">
						                            	@foreach ($product->images as $image)
						                                	<a class="{{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#pro-{{ $image->id }}">
						                                		<img src="{{ asset("storage/" . $image->path) }}" alt="">
						                                	</a>
							                            @endforeach
						                            </div>
						                        </div>
						                    </div>
						                    <div class="col-md-7 col-sm-12 col-xs-12">
						                        <div class="product-details-content quickview-content">
						                            <h2>{{ $product->name }}</h2>
						                            <div class="product-details-price">
						                                <span>{{ numberToPriceFormat($product->price, '$', true) }}</span>
						                            </div>
						                            <p>{{ $product->description }}</p>
						                            <div class="pro-details-quality">
						                                <div class="cart-plus-minus">
						                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
						                                </div>
						                                <div class="pro-details-cart btn-hover">
						                                    <a href="#">Add To Cart</a>
						                                </div>
						                            </div>
						                            <div class="pro-details-meta">
						                                <span>Categories :</span>
						                                <ul>
						                                    <li><a href="#">{{ $product->category->name }}</a></li>
						                                </ul>
						                            </div>
						                        </div>
						                    </div>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
						<!-- Modal end -->
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection