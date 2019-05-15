@extends('frontend.layouts.master')
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{ route('front.home') }}">Home</a>
                </li>
                <li class="active">My Account </li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-12">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>1 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h3>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <form action="{{ route('front.updateAccount') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="myaccount-info-wrapper">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value="{{ $customer->user->first_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" value="{{ $customer->user->last_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control" id="gender">
                                                            <option {{ $customer->gender == 'Female' ? "selected" : "" }} value="Female">Female</option>
                                                            <option {{ $customer->gender == 'Male' ? "selected" : "" }} value="Male">Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Birth Date</label>
                                                        <input type="date" name="birth_date" value="{{ $customer->birth_date }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Telephone</label>
                                                        <input type="text" name="tel" value="{{ $customer->tel }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email Address</label>
                                                        <input type="email" name="email" value="{{ $customer->user->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>2 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h3>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form action="{{ route('front.updatePassword') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="myaccount-info-wrapper">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password</label>
                                                        <input type="password" name="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password Confirmation</label>
                                                        <input type="password" name="confirmation_password" placeholder="Password Confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>3 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries   </a></h3>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Address Book Entries</h4>
                                        </div>
                                        <div class="entries-wrapper">
                                            @forelse ($customer->addresses as $address)
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                        <div class="entries-info text-center">
                                                            <p>{{ $address->address }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                        <div class="entries-edit-delete text-center">
                                                            <a class="edit show-modal-edit-address" href="#" data-target-full-address="address-{{ $address->id }}">Edit</a>
                                                            <a href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="address-{{ $address->id }}" data-id="{{ $address->id }}" data-lng="{{ $address->lng }}" data-lat="{{ $address->lat }}" data-address="{{ $address->address }}"></div>
                                            @empty
                                                <h4 class="text-center">No address found</h4>
                                            @endforelse
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Address Modal -->
<div class="modal fade" id="modal-address-map" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Edit Address
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" id="search-address-input" class="form-control" placeholder="Search for ur address ..">
                </div>
                <br>
                <div id="address-map" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
@endsection

@section('custom-css')
    <style>
        .pac-container {
            background-color: #FFF;
            z-index: 20;
            position: fixed;
            display: inline-block;
            float: left;
        }
        .modal{
            z-index: 20;   
        }
        .modal-backdrop{
            z-index: 10;        
        }​
    </style>
@endsection

@section('custom-javascript')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDebAMQ2oe6eiBRR5YWBJqKY5KyQxsSbKc&libraries=places" async defer></script>
    <script type="text/javascript">   
        $(document).ready(function () {
            // Events
            $('.show-modal-edit-address').click(function (event) {
                event.preventDefault();
                var fullAddress = $('#' + $(this).data('target-full-address'));
                var id = $(fullAddress).data('id');
                var lng = $(fullAddress).data('lng');
                var lat = $(fullAddress).data('lat');
                var address = $(fullAddress).data('address');
                initMap("address-map", lng, lat, "search-address-input");
                // initAutocomplete()
                $('#modal-address-map').modal();
            });

            // Helpers
            function initMap(targetMapId, lng, lat, targetSearchInputId, zoom = 15) {
                var map = new google.maps.Map(document.getElementById(targetMapId), {
                    center: {
                        lat: lng,
                        lng: lat
                    },
                    zoom: zoom,
                    mapTypeId: 'roadmap'
                });
                var marker = new google.maps.Marker({
                    position: {
                        lat: lng,
                        lng: lat
                    },
                    map: map,
                });

                // Create the search box and link it to the UI element.
                var input = document.getElementById(targetSearchInputId);
                var searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function() {
                    searchBox.setBounds(map.getBounds());
                });

                var markers = [];
                // more details for that place.
                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                        return;
                    }

                    // Clear out the old markers.
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function(place) {
                        if (!place.geometry) {
                            return;
                        }
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        }

                        // Create a marker for each place.
                        markers.push(new google.maps.Marker({
                            map: map,
                            icon: icon,
                            title: place.name,
                            position: place.geometry.location
                        }));

                        // log the coordinates of each "place"
                        // put the coordinates of each place in the div with id="output"
                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });
            }
        });
    </script>
@endsection