<?php 
    $url = $_SERVER['REQUEST_URI'];
    $path = parse_url($url, PHP_URL_PATH);
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{asset('/profile-images/'.Auth::user()->image_url)}}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</strong> </span> 
                            @foreach (Auth::user()->roles as $role) 
                            <span class="text-muted text-xs block">{{$role->name}}
                            @endforeach    
                                <b class="caret"></b>
                            </span> 
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('/admin/profile') }}">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
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
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-home"></i> <span class="nav-label">Account</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('#') }}">Profile</a></li>
                    <li><a href="{{ url('#') }}">Billing Information</a></li>
                    <li><a href="{{ url('#') }}">Subscription</a></li>
                </ul>
            </li>
            <li class="<?php if($path == '/admin/tutorial' || $path == '/admin/tutorial/create' ) echo "active"; ?>">
                <a href="{{ url('/admin/tutorial') }}"><i class="fa fa-file-o"></i> <span class="nav-label">Tutorials</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="<?= ($path == '/admin/tutorial') ? 'active':''; ?>"><a href="{{ url('/admin/tutorial') }}">All</a></li>
                    <li class="<?= ($path == '/admin/tutorial/create') ? 'active':''; ?>"><a href="{{ url('/admin/tutorial/create') }}">Create</a></li>
                </ul>
            </li>
            <li>    
                <a href="{{ url('/admin/users') }}"><i class="fa fa-user"></i> <span class="nav-label">Users</span></a>   
            </li> 
            <li>     
                <a href="{{ url('#') }}"><i class="fa fa-envelope-o"></i> <span class="nav-label">Messages</span></a>
            </li>  
            <li>  
                <a href="{{ url('#') }}"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span></a>
            </li>
        </ul>
    </div>
</nav>