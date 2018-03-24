<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/inspinai.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/responsive.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="{{asset('user/js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>    
</head>

<body>
    <div id="wrapper">
        @include('user.includes.sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('user.includes.header') @yield('body')
        </div>
    </div>
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user/js/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('user/js/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('user/js/jquery.slimscroll.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="{{asset('user/js/dropzone.js')}}"></script>
    <script src="{{asset('user/js/inspinia.js')}}"></script>
    <script src="{{asset('user/js/pace.min.js')}}"></script>
    <script src="{{asset('user/js/main.js')}}"></script>
    @yield('braintree')
    @Yield('script')
    <!-- File Upload Jquery -->

</body>

</html>