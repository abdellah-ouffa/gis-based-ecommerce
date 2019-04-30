<!DOCTYPE html>
<html lang="en" class="">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>@yield('title')</title>
		@yield('plugins-css')
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/stroke-7/style.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/jquery.nanoscroller/css/nanoscroller.css') }}"/>
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/theme-switcher/theme-switcher.min.css') }}"/>
		<link type="text/css" href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
		@yield('custom-css')
	</head>
	<body>
		<div class="am-wrapper">
			@include('backend.layouts.partials.top-navbar')
			@include('backend.layouts.partials.sidebar')
			<div class="am-content">
				@yield('content')
			</div>
		</div>
		<script src="{{ asset('assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/lib/theme-switcher/theme-switcher.min.js') }}" type="text/javascript"></script>
		@yield('plugins-javascript')
		<script type="text/javascript">
			$(document).ready(function(){
				App.init();
			});
		</script>
		@yield('custom-javascript')
	</html>
</body>