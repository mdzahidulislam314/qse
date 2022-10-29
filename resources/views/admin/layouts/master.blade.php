<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>{{get_setting('site_moto')}} - {{get_setting('name')}}</title>

    @include('admin.layouts.head')

    @routes

    @yield('css')
</head>

<body>
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        @include('admin.layouts.navbar')

        @include('admin.layouts.sidebar')

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                @include('admin.layouts.sidebar')

                @yield('content')

            </div>
        </div>

    </div>
</div>

@include('admin.layouts.bottom')

@stack('scripts')

</body>
</html>
