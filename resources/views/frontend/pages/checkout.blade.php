@extends('frontend.layouts.master')

@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">Checkout </li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-area pt-95 pb-100">
    <div class="container">
        <form action="{{ route('order.store') }}" method="post" id="form-place-order">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label><strong>Full Name :</strong></label> Abdellah Ouffa
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <div class="billing-info mb-20">
                                    <label>Address</label>
                                    <select class="form-control" name="address" id="addresses">
                                        @foreach ($customer->addresses as $address)
                                            <option value="{{ $address->id }}">{{ $address->address }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="billing-info mb-20">
                                    <label>&nbsp;</label>
                                    <button type="button" id="toggle-add-new-address" class="btn btn-primary form-control"><span class="fa fa-angle-up"></span></button>
                                    <input type="hidden" id="add-new-address-is-active" name="add_new_address_is_active" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="row hide" id="add-new-address">
                            <div id="add-address" class="col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Search for address </label>
                                            <input type="text" class="form-control" name="address_name" autocomplete="false" id="search-address" placeholder="Search for address">
                                            <input class="map-searchbox hidden" autocomplete="false" id="pac-input" name="" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12  mb-20">
                                        <div id="mapcanvas" style="width: 100%; height: 500px"></div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="billing-info mb-20">
                                            <label>Zip Code </label>
                                            <input class="form-control" placeholder="Zip Code" id="zipcode" name="zipcode" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                        <div class="billing-info mb-20">
                                            <label>City </label>
                                            <input class="form-control" placeholder="City" id="city" name="city" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="billing-info mb-20">
                                            <label>Country </label>
                                            <input class="form-control" placeholder="Country" id="country" name="country" type="text">
                                        </div>
                                    </div>
                                    <div>
                                        <input readonly="readonly" placeholder="Latitude" id="lat" name="latitude" type="hidden">
                                        <input readonly="readonly" placeholder="Longitude" id="lng" name="longitude" type="hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label for="additionnal_information">Additionnal information</label>
                                    <textarea name="additionnal_information" id="additionnal_information" cols="30" rows="5" class="form-control" placeholder="Additionnal information"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="your-order-area">
                        <h3>Your order</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Product</li>
                                        <li>Total</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    @php
                                        $total = 0;
                                    @endphp
                                    <ul>
                                        @forelse ($cart as $item)
                                            @php
                                                $total += ($item->price * $item->qty);
                                            @endphp
                                            <li>
                                                <span class="order-middle-left">{{ $item->name }}  X  {{ $item->qty }}</span> <span class="order-price">{{ numberToPriceFormat($item->price * $item->qty) }}</span>
                                            </li>
                                        @empty
                                            <li><center>Your cart is empty</center></li>
                                        @endforelse
                                    </ul>
                                </div>
                                {{-- <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Shipping</li>
                                        <li>Free shipping</li>
                                    </ul>
                                </div> --}}
                                <div class="your-order-total">
                                    <ul>
                                        <li class="order-total">Total</li>
                                        <li>{{ numberToPriceFormat($total) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                            <a class="btn-hover link-submit-form" target-form="form-place-order" href="#">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom-css')
    <style>
        .your-order-area .your-order-wrap .your-order-product-info .your-order-total {
            border-bottom: none !important;
            border-top: none !important;
            margin: 0px 0 6px;
            padding: 17px 0 19px;
        }
    </style>
@endsection

@section('custom-javascript')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDebAMQ2oe6eiBRR5YWBJqKY5KyQxsSbKc&v=3.exp&sensor=false&libraries=places&language=fr-FR"></script>
    <script src="https://tiboolo.fr/assets/js/locationpicker.jquery.js"></script>
    <script>
        $(function() {
            // Event 
            $('#toggle-add-new-address').click(function () {
                if($('#add-new-address-is-active').val() == 1) {
                    $(this).html('<span class="fa fa-angle-up"></span>');
                    $('#addresses').attr('disabled', false);
                    $('#add-new-address').hide();
                    $('#add-new-address-is-active').val(0);
                } else {
                    $('#addresses').attr('disabled', true);
                    $(this).html('<span class="fa fa-angle-down"></span>');
                    $('#add-new-address').show();
                    $('#add-new-address-is-active').val(1);
                }
            });

            var updateComponents = function(addressComponents) {
                $('#search-address').val(addressComponents.addressLine1);
                $('#zipcode').val(addressComponents.postalCode);
                $('#city').val(addressComponents.city);
                $('#country').val(addressComponents.country);
            };

            $('#mapcanvas').locationpicker({
                location: {
                    latitude: 31.6298,
                    longitude: -8.0101
                },
                radius: 2,
                inputBinding: {
                    latitudeInput: $('#lat'),
                    longitudeInput: $('#lng'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#search-address')
                },
                enableAutocomplete: true,
                onchanged: function(currentLocation, radius, isMarkerDropped) {
                    var addressComponents = $(this).locationpicker('map').location.addressComponents;
                    updateComponents(addressComponents);
                },
                oninitialized: function(component) {
                    var addressComponents = $(component).locationpicker('map').location.addressComponents;
                    updateComponents(addressComponents);
                },
                style: function() {
                    return JSON.parse('[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]');
                }
            });
        });
    </script>
@endsection