@extends('supplier.master')

@section('title') Supplier Area @endsection

@section('content')
<div class="page-head">
	<h2>Supplier Area </h2>
	<ol class="breadcrumb">
		<li>
			<a href="#">Supplier Area</a>
		</li>
	</ol>
</div>
<div class="main-content">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default panel-borders">
			<form class="search-form" id="search-form" action="{{ route('supplier.filterProductsByperiode') }}" method="POST">
			    @csrf
				<div class="panel-heading">
					<span class="title">Serach</span>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Product</label>
								<input type="text" name="product-name" class="form-control input-sm" placeholder="Product">
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">From</label>
										<input type="date" name="from" class="form-control input-sm">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">To</label>
										<input type="date" name="to" class="form-control input-sm">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">&nbsp;</label>
								<button  type="submit" class="btn btn-info btn-sm btn-block form-control input-sm">Search</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="row">
				<div class="col-md-4">
					<div class="widget widget-tile">
						<div class="data-info">
							<div data-toggle="counter" data-end="18.6" data-decimals="1" data-suffix="%" class="value">
								<strong>{{ $productCount ?? '0' }}</strong>
							</div>
							<div class="desc">Product Sold</div>
						</div>
						<div class="icon"><span class="s7-cart"></span></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="widget widget-tile">
						<div class="data-info">
							<div data-toggle="counter" data-end="18.6" data-decimals="1" data-suffix="%" class="value">
								<strong>{{ $customerCount ?? '0' }}</strong>
							</div>
							<div class="desc">Customer number</div>
						</div>
						<div class="icon"><span class="s7-users"></span></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="widget widget-tile">
						<div class="data-info">
							<div data-toggle="counter" data-end="18.6" data-decimals="1" data-suffix="%" class="value">
								<strong>{{ $minCustomerAge ?? '0'  }}</strong> To <strong> {{ $maxCustomerAge ?? '0' }} </strong> Years-old
							</div>
							<div class="desc">Age-range</div>
						</div>
						<div class="icon"><span class="s7-expand2"></span></div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="tools"><span class="icon s7-upload"></span><span class="icon s7-edit"></span><span class="icon s7-close"></span></div><span class="title">Evolution of the product over time</span>
				</div>
				<div class="panel-body">
					<div id="line-chart" style="height: 300px;"></div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="tools"><span class="icon s7-upload"></span><span class="icon s7-edit"></span><span class="icon s7-close"></span></div><span class="title">Places where the product has been sold</span>
				</div>
				<div class="panel-body">
					<div id="map" style="height: 600px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection

@section('plugins-css')
   	<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/lib/morrisjs/morris.css') }}"/>
@endsection

@section('plugins-javascript')
   	<script src="{{ asset('backend/assets/lib/raphael/raphael-min.js') }}" type="text/javascript"></script>
  	<script src="{{ asset('backend/assets/lib/morrisjs/morris.min.js') }}" type="text/javascript"></script>
@endsection

@section('custom-javascript')
	<script  src="{{asset('front/assets/API/js/googlemap.js')}}"></script>

	<script>
		var coordinates = @json($coordinates);
		function initMap() {
			var options = {
				zoom: 2,
				center:{ lat:31.6639704, lng: -8.029472599999963 }
			}
			var map = new google.maps.Map(document.getElementById('map'),options);
			// Add marker
			for (var i = 0; i < coordinates.length; i++) {
				console.log(coordinates[i]['lng']);
				addMarker({coords: {lat: Number(coordinates[i]['lat']), lng: Number(coordinates[i]['lng'])}});
			}
			function addMarker(props){
				var marker = new google.maps.Marker({
					position: props.coords,
					map: map
				})
			}
		}
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDebAMQ2oe6eiBRR5YWBJqKY5KyQxsSbKc&callback=initMap">
	</script>

   	<script>
   		$(document).ready(function(){
			App.chartsMorris();
		});
   </script>
@endsection