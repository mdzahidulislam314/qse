<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <div class="header-top-left">
                    <div class="header-top-contact">
                        <ul>
                            <li>
                                <div class="header-top-contact-info">
                                    <a href="#"><i class="far fa-envelope"></i> {{ get_setting('email') }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="header-top-contact-info">
                                    <a href="#"><i class="far fa-clock"></i> {{ get_setting('office_time') }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="header-top-contact-info">
                                    <a href="tel:{{ get_setting('phone') }}">
                                        <i class="far fa-phone"></i> <span class="__cf_email__" >{{ get_setting('phone') }}</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-top-right">
                    <div class="header-top-social">
                        <span>Follow Us:</span>
                        <a href="{{ get_setting('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ get_setting('twitter') }}"><i class="fab fa-twitter"></i></a>
                        <a href="{{ get_setting('youtube') }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ get_setting('header_logo') }}" alt="logo" />
                </a>
                <div class="mobile-menu-right">
                    <div class="mobile-menu-list">
                        <a href="#" class="mobile-menu-link search-box-outer"><i class="far fa-search"></i></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-btn-icon"><i class="far fa-bars"></i></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages</a>
                            <ul class="dropdown-menu fade-down">
                                <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                <li><a class="dropdown-item" href="team.html">Our Team</a></li>
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{route('contact.page')}}">Contact</a></li>
                    </ul>
                    <div class="header-nav-right">
                        <div class="header-btn">
                            @guest('customer')
                                <a href="{{route('login')}}" class="theme-btn mt-2">Login <i class="far fa-arrow-right"></i></a>
                            @else
                                <a href="{{route('login')}}" class="theme-btn mt-2">Account <i class="far fa-arrow-right"></i></a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>