<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="bar-phone"><i class="fa fa-phone"></i> <span>Call Us :</span> <strong>{{ get_setting('phone') }}</strong></div>
            <div class="bar-mail"><i class="fa fa-envelope"></i> <span>Mail Us :</span> <strong>{{ get_setting('email') }}</strong></div>
            <div class="header-social">
                <a class="facebook" href="{{ get_setting('facebook') }}" title="facebook" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i> </a>
                <a class="twitter" href="#" title="twitter" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i> </a>
                <a class="linkedin" href="#" title="linkedin" target="_blank" rel="nofollow"><i class="fa fa-linkedin"></i> </a>
                <a class="google" href="#" title="google-plus" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i> </a>
                <a class="youtube" href="{{ get_setting('youtube') }}" title="youtube-play" target="_blank" rel="nofollow"><i class="fa fa-youtube-play"></i> </a>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-sticky bootsnav">
    <div class="container">
        <div class="row">
            <div class="attr-nav">
            {{--<a class="donation" href="donate.html">Lgoin</a>--}}
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand logo" href="index.html"><img src="{{ get_setting('header_logo') }}" class="img-responsive" width="150px"/></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="about-us.html">Services</a></li>
                    <li><a href="activities.html">Products</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="{{ route('contact.page') }}">Contact Us</a></li>
                    <li><a href="{{ route('about.page') }}">About Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>