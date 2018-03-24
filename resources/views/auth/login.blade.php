<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Project</title>
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/inspinai.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/responsive.css')}}">
</head>

<body>
    <div id="wrapper">
        <div class="loginColumns animated fadeInDown">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="ibox-content login-page">
                        <div class="top-logo-area">
                            <img src="{{asset('user/images/logo-2.png')}}" alt="">
                        </div>
                        <form class="m-t" role="form" action="{{ route('login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" name="password" placeholder="Password" required> @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                            <a href="{{ route('password.request') }}">
                                <small>Forgot password?</small>
                            </a>

                            <p class="text-muted text-center">
                                <small>Do not have an account?</small>
                            </p>
                            <a class="btn btn-sm btn-white btn-block" href="{{route('register')}}">Create an account</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main page end-->

    <script src="{{asset('user/js/jquery.min.js')}}"></script>
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user/js/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('user/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('user/js/dropzone.js')}}"></script>
    <script src="{{asset('user/js/jquery.fileupload-ui.js')}}"></script>
    <script src="{{asset('user/js/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('user/js/jquery.fileupload.js')}}"></script>
    <script src="{{asset('user/js/inspinia.js')}}"></script>
    <script src="{{asset('user/js/main.js')}}"></script>
</body>

</html>