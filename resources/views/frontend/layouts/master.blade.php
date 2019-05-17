<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/img/favicon.png') }}">
    <!-- CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/icons.min.css') }}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    {{-- custom css map --}}
    <link rel="stylesheet" href="{{ asset('front/assets/API/css/custom.css') }}">
    {{-- custom css map --}}

    <!-- Modernizer JS -->
    <script src="{{ asset('front/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @yield('custom-css')
    <style>
        .disabled, .disabled:hover {
          color: currentColor !important;
          cursor: not-allowed !important;
          opacity: 0.5 !important;
          text-decoration: none !important;
        }
        .btn-primary {
            background-color: #a749ff !important;
            border-color: #a749ff !important; 
        }
        .hide {
            display: none;
        }
    </style>
</head>

<body>
@include('frontend.layouts.partials.header')
@yield('content')
@include('frontend.layouts.partials.footer')
<!-- All JS is here
============================================ -->
<!-- jQuery JS -->
<script src="{{ asset('front/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('front/assets/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<!-- Plugins JS -->
<script src="{{ asset('front/assets/js/plugins.js') }}"></script>
<!-- Ajax Mail -->
<script src="{{ asset('front/assets/js/ajax-mail.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('front/assets/js/main.js') }}"></script>
{{-- Google map js --}}
@yield('custom-javascript')
</body>
</html>