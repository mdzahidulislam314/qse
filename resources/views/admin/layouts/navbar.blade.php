<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a href="{{ route('admin.dashboard') }}">
                <img class="img-fluid" src="{{get_setting('header_logo')}}" alt="{{get_setting('site_moto')}}" width="140" height="28"/>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu icon-toggle-right"></i>
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <a href="{{url('/')}}" target="_blank" class="waves-effect waves-light" title="Visit Website">
                        visit Site
                    </a>
                </li>
            </ul>
            <ul class="nav-right">

                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ Auth::user()->fetchGravatar() }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{Auth::user()->name}}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>