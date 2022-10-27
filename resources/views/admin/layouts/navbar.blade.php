<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a href="{{ route('admin.dashboard') }}">
                <img class="img-fluid" src="{{get_setting('header_logo')}}" alt="Theme-Logo" width="140" height="28"/>
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
                    <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                        <i class="full-screen feather icon-maximize"></i>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" target="_blank" class="waves-effect waves-light" title="Visit Website">
                        <i class="fa fa-eye"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-message-square"></i>
                            <span class="badge bg-c-green">3</span>
                        </div>
                    </div>
                </li>
                <li class="user-profile header-notification">

                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ Auth::user()->image ? url(Auth::user()->image) : url('/admin/assets/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{Auth::user()->name}}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="#">
                                    <i class="feather icon-user"></i> Profile

                                </a>
                            </li>
                            <li>
                                <a href="email-inbox.html">
                                    <i class="feather icon-mail"></i> My Messages

                                </a>
                            </li>
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

<div id="sidebar" class="users p-chat-user showChat">
    <div class="had-container">
        <div class="p-fixed users-main">
            <div class="user-box">
                <div class="chat-search-box">
                    <a class="back_friendlist">
                        <i class="feather icon-x"></i>
                    </a>
                    <div class="right-icon-control">
                        <div class="input-group input-group-button">
                            <input type="text" id="search-friends" name="footer-email" class="form-control" placeholder="Search Friend">
                            <div class="input-group-append">
                                <button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-friend-list">
                    <div class="media userlist-box waves-effect waves-light" data-id="1" data-status="online" data-username="Josephin Doe">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius img-radius" src="/admin/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
                            <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                            <div class="chat-header">Josephin Doe</div>
                        </div>
                    </div>
                    <div class="media userlist-box waves-effect waves-light" data-id="2" data-status="online" data-username="Lary Doe">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius" src="/admin/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                            <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Lary Doe</div>
                        </div>
                    </div>
                    <div class="media userlist-box waves-effect waves-light" data-id="3" data-status="online" data-username="Alice">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius" src="/admin/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                            <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Alice</div>
                        </div>
                    </div>
                    <div class="media userlist-box waves-effect waves-light" data-id="4" data-status="offline" data-username="Alia">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius" src="/admin/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                            <div class="live-status bg-default"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min ago</small></div>
                        </div>
                    </div>
                    <div class="media userlist-box waves-effect waves-light" data-id="5" data-status="offline" data-username="Suzen">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius" src="/admin/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                            <div class="live-status bg-default"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min ago</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--<header id="page-topbar">--}}
{{--    <div class="navbar-header">--}}
{{--        <div class="d-flex">--}}
{{--            <!-- LOGO -->--}}
{{--            <div class="navbar-brand-box">--}}
{{--                <a href="index.html" class="logo logo-light">--}}
{{--                    <span class="logo-sm">--}}
{{--                        <img src="" alt="" height="22">--}}
{{--                    </span>--}}
{{--                    <span class="logo-lg">--}}
{{--                        <img src="/uploads/demo/logo.png" alt="" height="55">--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">--}}
{{--                <i class="ri-menu-2-line align-middle"></i>--}}
{{--            </button>--}}
{{--            <div class="dropdown dropdown-mega d-none d-lg-block ml-2">--}}
{{--                <a href="{{ route('landing-page') }}" target="_blank"--}}
{{--                   class="btn header-item waves-effect d-table-cell">--}}
{{--                    Visit Site--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="d-flex">--}}

{{--            <div class="dropdown d-none d-lg-inline-block ml-1">--}}
{{--                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">--}}
{{--                    <i class="ri-fullscreen-line"></i>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <div class="dropdown d-inline-block user-dropdown">--}}
{{--                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"--}}
{{--                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    @if (isset(Auth::user()->image))--}}
{{--                        <img class="rounded-circle header-profile-user" src="{{ Auth::user()->image ? url(Auth::user()->image) : url--}}
{{--                        ('admin/assets/images/users/avatar-1.jpg') }}"--}}
{{--                             alt="{{Auth::user()->name}}">--}}
{{--                    @endif--}}
{{--                    <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>--}}
{{--                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                    <!-- item-->--}}
{{--                    <a class="dropdown-item" href="#"><i class="ri-user-line align-middle mr-1"></i> Profile</a>--}}
{{--                    <a class="dropdown-item d-block" href="#"><i class="ri-settings-2-line align-middle mr-1"></i> Settings</a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="event.preventDefault();--}}
{{--                    document.getElementById('logout-form').submit();">--}}
{{--                        <i class="ri-shut-down-line align-middle mr-1 text-danger"></i>--}}
{{--                        Logout--}}
{{--                    </a>--}}
{{--                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">--}}
{{--                        {{ csrf_field() }}--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}