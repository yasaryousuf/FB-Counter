<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        
        <link href="{{asset('general/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('general/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('general/css/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('general/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('general/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('general/css/responsive.css')}}" rel="stylesheet">
        
    </head>
    <body>
        <!-- Header area markup start-->
        @include('general.includes.header')
        <!-- Header area markup end-->

        <!-- body MarkUp Start-->
        @yield('body')
        <!-- body Markup End-->

        <!-- Footer area markup start-->
        @include('general.includes.footer')
        <!-- Footer area markup end-->
        
        <script src="{{asset('general/js/jquery.min.js')}}"></script>
        <script src="{{asset('general/js/jquery.sticky.js')}}"></script>
        <script src="{{asset('general/js/parallax.min.js')}}"></script>
        <script src="{{asset('general/js/jquery.easing.min.js')}}"></script>
        <script src="{{asset('general/js/wow.min.js')}}"></script>
        <script src="{{asset('general/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('general/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('general/js/main.js')}}"></script>
        @yield('braintree')
    </body>
</html>