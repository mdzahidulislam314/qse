<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="BitPixelBD">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="app-url" content="{{ getBaseURL() }}">

    <title>@yield('meta_title', get_setting('name').' | '.get_setting('site_moto'))</title>

    <meta charset="UTF-8">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="@yield('meta_description', get_setting('meta_description') )" />
    <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords') )">

    @yield('meta')

    @if(!isset($product) && !isset($products) && !isset($page) && !isset($blog))
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{ get_setting('meta_title') }}">
        <meta itemprop="description" content="{{ get_setting('meta_description') }}">
        <meta itemprop="image" content="{{ asset(get_setting('meta_img')) }}">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="{{ get_setting('meta_title') }}">
        <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="{{ asset(get_setting('meta_img')) }}">

        <!-- Open Graph data -->
        <meta property="og:title" content="{{ get_setting('meta_title') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ route('landing-page') }}" />
        <meta property="og:image" content="{{ asset(get_setting('meta_img')) }}" />
        <meta property="og:description" content="{{ get_setting('meta_description') }}" />
        <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
        <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    @endif


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset(get_setting('favicon')) }}">

    <link rel="stylesheet" href="{{asset('site/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/css/all-fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/css/magnific-popup.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/css/style.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/custom.css')}}">

    @routes
    @yield('css')

</head>

<body class="home">
    <div class="page-wrapper">

        @include('layouts.header')

        @yield('main')

       @include('layouts.footer')

    </div>


<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>




<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('site/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('site/assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('site/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('site/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('site/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.appear.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('site/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/assets/js/counter-up.js')}}"></script>
<script src="{{asset('site/assets/js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('site/assets/js/wow.min.js')}}"></script>
<script src="{{asset('site/assets/js/main.js')}}"></script>

<script src="/site/assets/js/custom.js"></script>

    @if (Session::has('warning'))
        <script>
            toastr.warning('{{ Session::get('warning') }}','Warning');
        </script>
    @endif

    @if (Session::has('info'))
        <script>
            toastr.info("{{ Session::get('info') }}", 'Info');
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}", 'Success');
        </script>
    @endif

    @if (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}", 'Error');
    </script>
    @endif

@yield('script')
</body>

</html>