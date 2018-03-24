<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Reset password : Facebook Project</title>
		
		
<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/inspinai.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/responsive.css')}}" rel="stylesheet">
        
    </head>
    <body>
        <div id="wrapper">
            <div class="loginColumns animated fadeInDown">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="ibox-content">

                            <h2 class="font-bold">Forgot password</h2>

                            <p>
                                Enter your email address and your password will be reset and emailed to you.
                            </p>

                            <div class="row">

                                <div class="col-lg-12">
                                    <form class="m-t" role="form"  method="POST" action="{{ url('password/reset') }}">
                                         {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input type="email" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif                                            
                                        </div>

                                        <button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>           
        </div> <!-- main page end-->
       
       
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/js/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('admin/js/dropzone.js')}}"></script>
        <script src="{{asset('admin/js/jquery.fileupload-ui.js')}}"></script>
        <script src="{{asset('admin/js/jquery.iframe-transport.js')}}"></script>
        <script src="{{asset('admin/js/jquery.fileupload.js')}}"></script>
        <script src="{{asset('admin/js/inspinia.js')}}"></script>
        <script src="{{asset('admin/js/main.js')}}"></script>
    </body>
</html>
