@extends('frontend.layouts.master')
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{ route('front.home') }}">Home</a>
                </li>
                <li class="active">Cart </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-90 pb-100">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{ route('cart.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="table-content table-responsive cart-table-content">
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @forelse ($cart as $item)
                                    @php $total += ($item->price * $item->qty) @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('front.product.details', ['slug' => $item->options['slug']]) }}">
                                                <img style="width: 80px; height: 80px" src="{{ asset($item->options['image']) }}" alt="">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('front.product.details', ['slug' => $item->options['slug']]) }}">{{ $item->name }}</a>
                                        </td>
                                        <td class="product-price-cart">
                                            <span class="amount">{{ numberToPriceFormat($item->price, '$', true) }}</span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qte[{{ $item->rowId }}]" value="{{ $item->qty }}">
                                            </div>
                                        </td>
                                        <td>{{ numberToPriceFormat(($item->price * $item->qty), '$', true) }}</td>
                                            <td class="product-remove">
                                            <a href="{{ route('cart.destroy', ['id' => $item->rowId]) }}" onclick="event.preventDefault(); document.getElementById('remove-item-{{ $item->rowId }}').submit();"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6"><center>Your cart is empty</center></td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <thead>
                                <tr>
                                    <th style="text-align: right;" colspan="5">Total products</th>
                                    <th>{{ numberToPriceFormat($total, '$', true) }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="{{ route('front.allProducts') }}">Continue Shopping</a>
                                </div>
                                <div class="cart-clear">
                                    <button>Update Shopping Cart</button>
                                    <a href="{{ route('cart.checkout') }}">Clear Shopping Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach ($cart as $item)
    <form style="display: none;" id="remove-item-{{ $item->rowId }}" action="{{ route('cart.destroy', ['id' => $item->rowId]) }}" method="post">
        @csrf
        @method('DELETE')
    </form>
@endforeach
@endsection