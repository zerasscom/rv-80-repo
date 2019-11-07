<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="apple-touch-icon" href="{{ env('APP_URL') }}/design/lib/base-layout/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{ env('APP_URL') }}/design/lib/base-layout/images/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/bootstrap/v4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/bootstrap/v4.0.0/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/base-layout/css/site.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/base-layout/css/login-v3.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/animsition/animsition.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/asscrollable/v0.4.10/asScrollable.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/base-layout/fonts/web-icons/web-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!-- Scripts -->
    <script src="{{ env('APP_URL') }}/design/lib/breakpoints/v1.0.5/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="animsition page-login-v3 layout-full">

<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        @yield('content')
    </div>
</div>
<!-- End Page -->

<!-- Core  -->
<script src="{{ env('APP_URL') }}/design/lib/babel-external-helpers/v6.22.0/babel-external-helpers.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/jquery/v3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/popper-js/v1.14.1/umd/popper.min.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/bootstrap/v4.0.0/js/bootstrap.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/animsition/animsition.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/mousewheel/v3.1.13/jquery.mousewheel.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/asscrollbar/v0.5.7/jquery-asScrollbar.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/asscrollable/v0.4.10/jquery-asScrollable.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/ashoverscroll/v0.3.7/jquery-asHoverScroll.js"></script>

<!-- Plugins-->
<script src="{{ env('APP_URL') }}/design/lib/screenfull/v3.3.2/screenfull.js"></script>

<!-- Scripts -->
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Component.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Base.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Config.js" type="text/javascript"></script>

<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Section/Menubar.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Section/GridMenu.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Section/Sidebar.js" type="text/javascript"></script>

<!-- Page -->
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Site.js" type="text/javascript"></script>

<script>
    (function(document, window, $){
        'use strict';

        var Site = window.Site;
        $(document).ready(function(){
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>
