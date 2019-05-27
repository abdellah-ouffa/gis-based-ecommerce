<!DOCTYPE html>
<html lang="en" class="">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>@yield('title')</title>
		@yield('plugins-css')
		<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/lib/stroke-7/style.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/lib/jquery.nanoscroller/css/nanoscroller.css') }}"/>
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
		<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/lib/theme-switcher/theme-switcher.min.css') }}"/>
		<link type="text/css" href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
		<link type="text/css" href="{{ asset('backend/assets/css/cutom.css') }}" rel="stylesheet">
		@yield('custom-css')
	</head>
	<body>
		<div class="am-wrapper am-nosidebar-left">
			@include('supplier.top-navbar')
			<div class="am-content">
				@yield('content')
			</div>
		</div>
		<script src="{{ asset('backend/assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('backend/assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('backend/assets/js/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('backend/assets/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
		<script src="{{ asset('backend/assets/lib/theme-switcher/theme-switcher.min.js') }}" type="text/javascript"></script>
		@yield('plugins-javascript')
		<script src="{{ asset('backend/assets/custom/js/app.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				App.init();
			});
		</script>
		@include('backend.layouts.partials.messages')
		@yield('custom-javascript')
	</html>
</body>