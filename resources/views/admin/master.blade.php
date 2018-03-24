<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>
		
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
        <link href="{{asset('user/css/inspinai.css')}}" rel="stylesheet">
        <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>
        <link href="{{asset('admin/css/responsive.css')}}" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
    </head>
    <body>
        <div id="wrapper">
            @include('admin.includes.sidebar')
            <div id="page-wrapper" class="gray-bg">
                @include('admin.includes.header') 
                @yield('body')
            </div> 
        </div> 

        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/jQuery-File-Upload/js/vendor/jquery.ui.widget.js')}}"></script>
        <script src="{{asset('admin/js/jquery.iframe-transport.js')}}"></script>
        <script src="{{asset('admin/js/jquery.fileupload.js')}}"></script>
        <script src="{{asset('admin/js/jquery.metisMenu.js')}}"></script>
        {{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> --}}
        {{-- <script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script> --}}
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
        <script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script src="{{asset('admin/js/dropzone.js')}}"></script>
        <script src="{{asset('admin/js/jquery.fileupload-ui.js')}}"></script>
        <script src="{{asset('admin/js/inspinia.js')}}"></script>
        <script src="{{asset('admin/js/pace.min.js')}}"></script>
        <script src="{{asset('admin/js/main.js')}}"></script>
        @yield('script')
    </body>
</html>
