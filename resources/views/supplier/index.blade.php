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
										<input type="date" name="slug" class="form-control input-sm">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">To</label>
										<input type="date" name="slug" class="form-control input-sm">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">&nbsp;</label>
								<button class="btn btn-info btn-sm btn-block form-control input-sm">Search</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="widget widget-tile">
						<div class="data-info">
							<div data-toggle="counter" data-end="18.6" data-decimals="1" data-suffix="%" class="value">
								<strong>170</strong>
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
								<strong>20</strong>
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
								<strong>8</strong> To <strong> 20 </strong> Years-old
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
		function initMap(){
			//map options
			var options = {
			zoom: 14,
			center:{ lat:31.6639704, lng: -8.029472599999963 }
		}
		// New map
		var map= new google.maps.Map(document.getElementById('map'),options);
		// Add marker
		var marker = new google.maps.Marker({
		position: {lat: 31.6639704, lng: -8.029472599999963},
		map: map,
		});
		marker.addListener('click',function(){
		infoWindow.open(map, marker);
	});
	// Add marker function
	/* addMarker({coords:{lat:42.4668,lng:-70.9495}});
	addMarker({coords:{lat:42.8584, lng:-70.9300}});
	addMarker({coords:{lat:42.7762, lng:-71.0773}});
	function addMarker(props){
	var marker=new google.maps.Marker({
	position :props.coords,
	map:map,
	icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
	})
	}*/
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