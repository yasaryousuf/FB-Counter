<header>
    <div class="menu-stick">
        <div class="my-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-light">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('/general/images/logo.png')}}" alt=""></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="{{url('/')}}"> <i class="fa fa-home"></i>Home</a></li>
                                        <li><a class="page-scroll" href="#feature"> <i class="fa fa-cube"></i>Feature</a></li>
                                        <li><a class="page-scroll" href="#pricing"> <i class="fa fa-usd"></i>Pricing</a></li>
                                        <li><a class="page-scroll" href="{{url('support')}}"> <i class="fa fa-phone"></i>Supports</a></li>
                                        @if (!Auth::check())
                                            <li><a class="page-scroll custom-pointer" data-toggle="modal" data-target="#loginModal"> <i class="fa fa-sign-in"></i>Login</a></li>
                                        @else
                                        <li>
                                            <a href="/my-account"><i class="fa fa-pie-chart" aria-hidden="true"></i>Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out"></i>Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>  
                                        </li>
                                        @endif
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>