<!DOCTYPE html>
<html class="no-js" lang="de">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />

        <title>Charity Hope</title>

        <link href="{{ asset('front-end/css/font-awesome.min.css') }}" rel="stylesheet" /> 

        <link href="{{ asset('front-end/css/animate.css') }}" rel="stylesheet" />
        <link href="{{ asset('front-end/css/bootsnav.css') }}" rel="stylesheet" />
        <link href="{{ asset('front-end/css/bootstrap.css') }}" rel="stylesheet" />
        <link href="{{ asset('front-end/css/style.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/swipebox.css') }}" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css" />
    </head>
    <body>

        @include('layouts.header')

        @yield('main')

        @include('layouts.footer')

        <script type="text/javascript" src="{{ asset('front-end/js/jquery.min.js') }}"></script>
        <script src="{{ asset('front-end/js/bootstrap.js') }}"></script>
        <script src="{{ asset('front-end/js/bootsnav.js') }}"></script>
        <script src="{{ asset('front-end/js/banner.js') }}"></script>
        <script src="{{ asset('front-end/js/jquery.swipebox.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                /* Basic Gallery */
                $(".swipebox").swipebox();

                /* Video */
                $(".swipebox-video").swipebox();

                /* Dynamic Gallery */
                $("#gallery").click(function (e) {
                    e.preventDefault();
                    $.swipebox([
                        { href: "http://swipebox.csag.co/mages/image-1.jpg", title: "My Caption" },
                        { href: "http://swipebox.csag.co/images/image-2.jpg", title: "My Second Caption" },
                    ]);
                });
            });
        </script>
        <script src="{{ asset('front-end/js/script.js') }}"></script>
    </body>
</html>
