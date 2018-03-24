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
        <div class="register-page">
            <div class="ibox-content">
                <div class="top-logo-area">
                    <img src="{{asset('user/images/logo-2.png')}}" alt="">
                </div>
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ old('first_name') }}" required> @if ($errors->has('first_name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ old('last_name') }}" required> @if ($errors->has('last_name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="email" placeholder="example@mail.com" class="form-control" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" placeholder="Username" class="form-control" name="username" value="{{ old('username') }}" required> @if ($errors->has('username'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="password" placeholder="********" class="form-control popup-input" name="password" autocomplete="off" required>
                                {{-- <div class="popup-position">
                                    <div class="min-pass">min password length - 8</div>
                                    <div class="alpha-pass">alphanumeric</div>
                                    <div class="specal-pass">with special character</div>
                                </div> --}}
                                @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-centred">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- profile page ending tag-->
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