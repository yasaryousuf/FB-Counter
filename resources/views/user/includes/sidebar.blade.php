<?php 
    $url = $_SERVER['REQUEST_URI'];
    $path = parse_url($url, PHP_URL_PATH);
    $user = \App\User::find(\Auth::id());
    // $components = explode('/', $path);
    // $url_first_part = $components[1];
    // print_r($components );
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <a href="/my-account/profile">
                            <img alt="image" class="img-circle" src="{{asset('/profile-images/'.Auth::user()->image_url)}}" />
                        </a>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="/my-account/profile">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</strong> </span> 
                            @foreach (Auth::user()->roles as $role) 
                            <span class="text-muted text-xs block">{{$role->name}}
                            @endforeach   
                            </span> 
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            @if(Auth::user()->is('Admin'))
            <li class="<?= ($path == '/admin/dashboard') ? 'active':''; ?>">
                <a href="{{ url('/admin/dashboard') }}"><i class="fa fa-user-plus"></i> <span class="nav-label">Admin Panel</span></a>
            </li>
            @endif
            <li class="<?= ($path == '/my-account') ? 'active':''; ?>">
                <a href="{{ url('/my-account') }}"><i class="fa fa-list"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="<?php if($path == '/my-account/profile' || $path == '/my-account/billing-info' || $path == '/my-account/subscription' || $path == '/my-account/company-info') echo "active"; ?>">
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Account</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="<?= ($path == '/my-account/profile') ? 'active':''; ?>"><a href="{{ url('/my-account/profile') }}">Profile</a></li>
                    <li class="<?= ($path == '/my-account/billing-info') ? 'active':''; ?>"><a href="{{ url('/my-account/billing-info') }}">Billing Information</a></li>
                    <li class="<?= ($path == '/my-account/subscription') ? 'active':''; ?>"><a href="{{ url('/my-account/subscription') }}">Subscription</a></li>
                    <li class="<?= ($path == '/my-account/company-info') ? 'active':''; ?>"><a href="{{ url('/my-account/company-info') }}">Company Info.</a></li>
                </ul>
            </li>
            <li class="<?= ($path == '/my-account/settings') ? 'active':''; ?>">
                <a href="{{ url('/my-account/settings') }}"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Counter Page</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    @foreach($names as $name)
                    <li><a href="/counter/{{$name->advertise_name_slug}}">{{$name->advertise_name}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</nav>