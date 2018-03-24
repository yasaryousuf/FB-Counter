<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            
            <li>
                <a href="">
                    <i class="language language-france" data-toggle="tooltip" data-placement="bottom" title="French"><img src="/user/images/france-flag.png"></i>  
                    <i class="language language-america" data-toggle="tooltip" data-placement="bottom" title="English"><img src="/user/images/america-flag.png"></i>
                    <i class="language language-spanish" data-toggle="tooltip" data-placement="bottom" title="Spanish"><img src="/user/images/spanish-flag.png"></i>
                </a>
            </li>
            
            
            <li>
<!--                 <a href="{{ route('logout') }}" >
                    <i class="fa fa-sign-out"></i> Log out
                </a> -->

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
    </nav>
</div>