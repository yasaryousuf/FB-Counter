<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="600">

    <title>Likes Counter</title>
    <link href="{{asset('user/counterWithAds/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('user/counterWithAds/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{asset('user/counterWithAds/images/like.png')}}" type="image/png">

    <script src="{{asset('user/counterWithAds/vendor/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('user/counterWithAds/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    {{-- Play Sound JS --}}
    <script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>

    {{-- Loading JS --}}
    <script src='https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.6.0/src/loadingoverlay.min.js'></script>

    <!-- Custom Theme CSS -->

    <style>
        .logo-img-measurement i {
            color: #4267B2;
            font-size: 168px;
            line-height: 200px;
        }

        .logo-img-measurement {
            text-align: center;
        }

        .logo-img-measurement img {
            max-height: 131px;
            height: auto;
            width: auto !important;
            vertical-align: baseline;
        }

        .adv-img {
            text-align: center;
        }

        .adv-img img {
            max-height: 131px;
            height: auto;
            width: auto !important;
        }

        .loader,
        .loader:after {
            border-radius: 50%;
            width: 10em;
            height: 10em;
        }

        .loader {
            margin: 60px auto;
            font-size: 10px;
            position: relative;
            text-indent: -9999em;
            border-top: 1.1em solid rgba(207, 5, 58, 0.2);
            border-right: 1.1em solid rgba(207, 5, 58, 0.2);
            border-bottom: 1.1em solid rgba(207, 5, 58, 0.2);
            border-left: 1.1em solid #cf053a;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation: load8 1.1s infinite linear;
            animation: load8 1.1s infinite linear;
        }

        @-webkit-keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .splitflap {
            margin: 0 auto;
            margin-right: 0;
            -webkit-perspective-origin: top center;
            -moz-perspective-origin: top center;
            -ms-perspective-origin: top center;
            perspective-origin: top center;

            -webkit-perspective: 900px;
            -moz-perspective: 900px;
            -ms-perspective: 900px;
            perspective: 900px;
        }

        .bottom_logo span {
            color: red;
        }

        .bottom_logo {
            font-size: 20px;
            font-weight: bold;
            color: #337ab7;
            width: 100%;
            float: left;
            text-align: center;
            position: relative;

        }

        .bottom_logo img {
            width: 100px;
            position: relative;
            bottom: 5px;
        }

        .bottom_logo a span {
            color: red;
        }

        .bottom_logo span.size {
            color: #337ab7;
            font-size: 15px;
        }

        .overlay.active {
            background: #000;
            width: 100%;
            height: 100%;
            z-index: 7;
            position: fixed;
            opacity: 0.4;
        }

        @media(min-width:320px) and (max-width:767px) {
            .fa-5x {
                font-size: 3em;
            }
            .splitflap {
                width: 300px !important;
                float: none;
                margin: auto;
            }
            div#like {
                text-align: center;
                width: 100%;
                float: left;
            }
            .huge {
                font-size: 40px;
                width: 100%;
                float: left;
                text-align: center;
            }
            .splitflap {
                width: 100% !important;
                float: none;
                margin: auto;
                transform: scale(0.7);
                -webkit-transform: scale(0.7) translateX(-23%);
                ;
                left: 24px;
            }

            .panel-primary {
                border-color: #337ab7;
                max-width: 300px;
                margin: auto;
            }
            .center_cust {
                text-align: center;
            }
            .panel-default p a {
                width: 60% !important;

            }
            #wrapper {
                margin: auto;
                width: 308px;
            }

        }

        @media(min-width:320px) and (max-width:374px) {
            .splitflap {
                width: 100% !important;
                float: none;
                margin: auto;
                transform: scale(0.7) !important;
                -webkit-transform: scale(0.7) translateX(-40%) !important;
                left: 50px;
            }

        }

        @media(min-width:360px) and (max-width:400px) {

            .splitflap {
                width: 100% !important;
                float: none;
                margin: auto;
                transform: scale(0.7) !important;
                -webkit-transform: scale(0.7) translateX(-27%) !important;
                left: 30px;
            }

        }

        @media(min-width:768px) and (max-width:1200px) {
            .panel-default p a {
                width: 60% !important;
            }
        }

        @media(min-width:400px) and (max-width:767px) {
            #wrapper>div {
                width: 409px;
            }
            .splitflap {
                left: 68px;
            }

        }
    </style>
</head>

<body>
    <script type="text/javascript">
        $.LoadingOverlay("show", {
            fade: [2000, 1000],
            image: "",
            fontawesome: "",
            custom: '<div class="loader"></div>'
        });
    </script>
    <div id="wrapper">
        <img src="{{asset('user/counterWithAds/images/ajax-loader.gif')}}" id="loader" style="position: fixed;z-index: 9;width: 50px;top: 45%;left: 48%;display: none;">
        <div class="overlay" style=""></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-md-offset-2">
                @if(!$likes)
                <div class="alert alert-danger">
                Authorize your facebook account.
                </div>
                @endif
                    <div class="panel-default">
                        <p class="logo-img-measurement">
                            <!-- <img src="user/counterWithAds/images/chars.png" style="width:20%; margin-left: 18px;"/> -->
                            <img src="{{asset('user/counterWithAds/images/facebook.png')}}" style="width:20%; margin-left: 18px; height:131px " />
                            <i class=""></i>
                            <a href="#" style="display: inline-block;width: 77%;">
                            @if($adpage->banner->image_url_1)
                                <img src="{{asset('image')}}/{{$adpage->banner->image_url_1}}" style="width: 100%;margin: auto;" />
{{--                             @else    
                                <img src="{{asset('image')}}/default1.jpg" style="width: 100%;margin: auto;" /> --}}
                            @endif                                
                            </a>
                        </p>
                        <p id="error" style="text-align: center;color: red;"></p>
                        <div class="panel-body panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-xs-12 center_cust">
                                        <i class="fa fa-comments fa-5x"></i>
                                        <h3 style="margin-top:-8px; margin-bottom:0px;">Likes</h3>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-xs-12 text-right">
                                        <div class="huge">
                                            <div class="do-splitflap" id="like">{{$likes}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body panel-primary">
                            @if($adpage->banner->image_url_2)
                                <img src="{{asset('image')}}/{{$adpage->banner->image_url_2}}" style="width: 100%;margin: auto;height: 190px;" />
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_logo disktop">
            C
            <span class="size">REATION</span>
            <span>- www.</span>
            <img src="{{asset('user/counterWithAds/images/WiFi-Logo-BleuRouge.png')}}">
        </div>
    </div>
    <script src="{{asset('user/counterWithAds/js/jquery/jquery.splitflap.js')}}"></script>

    <script>
        
        jQuery(function ($) {
            $('.do-splitflap').splitFlap();
            $.playSound("/user/sounds/sound.aac");


            setInterval(function () {
                get_likes();
            }, 10000); 

            $.LoadingOverlay("hide");

            function get_likes() {
                var slug_arr = window.location.href.split("/");
                var slug = $.trim(slug_arr[slug_arr.length-1]) != "" ? $.trim(slug_arr[slug_arr.length-1]) : $.trim(slug_arr[slug_arr.length-2]);
                 $.ajax({
                        type: "POST",
                        url: "/my-account/counter/refresh",
                        data: {
                            slug: slug,
                            _token: '<?php echo csrf_token(); ?>'
                        }

                    })
                    .done(function (result) {
                        console.log(result);
                        if(result.status){
                            $('div#like').text(result.likes);
                            $('.do-splitflap').splitFlap(); 
                            $.playSound("/user/sounds/sound.aac"); 
                        }
                        
                    })
            }
        });


    </script>
</body>

</html>