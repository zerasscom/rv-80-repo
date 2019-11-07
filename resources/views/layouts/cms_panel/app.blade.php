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
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/base-layout/css/basic.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/asscrollable/v0.4.10/asScrollable.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/switchery/v0.8.2/switchery.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/bootstrap-sweetalert/v1.0.1/sweetalert.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/toastr/v2.1.4/toastr.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/font-awesome/v5.9.0/css/all.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/base-layout/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/design/lib/flag-icon-css/flag-icon.min.css">
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    @yield('head_plus')
    <!-- Scripts -->
    <script src="{{ env('APP_URL') }}/design/lib/breakpoints/v1.0.5/breakpoints.min.js"></script>

    <script>
        Breakpoints();
    </script>
</head>
<body>
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <a href="{{ route('cms_panel.dashboard') }}">
            <div class="navbar-brand navbar-brand-center site-gridmenu-toggle">
                <img class="navbar-brand-logo" src="{{ env('APP_URL') }}/design/lib/base-layout/images/logo.png" title="Remark">
                <span class="navbar-brand-text hidden-xs-down">Admin Panel</span>
            </div>
        </a>
    </div>

    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                    <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->

            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up" aria-expanded="false" role="button">
                        @switch(Config::get('app.locale'))
                        @case('en')
                        <span class="flag-icon flag-icon-gb"></span>
                        @break
                        @case('fr')
                        <span class="flag-icon flag-icon-fr"></span>
                        @break
                        @default
                        <span class="flag-icon flag-icon-gb"></span>
                        @endswitch
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{ route('cms_panel.apm.language', ['lang' => 'en']) }}" role="menuitem">
                            <span class="flag-icon flag-icon-gb"></span> English</a>
                        <a class="dropdown-item" href="{{ route('cms_panel.apm.language', ['lang' => 'fr']) }}" role="menuitem">
                            <span class="flag-icon flag-icon-fr"></span> French</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="{{ env('APP_URL') }}/design/lib/base-layout/images/portraits-5.jpg" alt="...">
                  <i></i>
                </span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a href="{{ route('cms_panel.auth.logout') }}" class="dropdown-item"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();" role="menuitem"> <i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                        <form id="logout-form" action="{{ route('cms_panel.auth.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>

            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->

    </div>
</nav>

<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">Main Menu</li>

                    <li class="site-menu-item has-sub active open">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            </ul>
                    </li>

                    <li class="site-menu-item has-sub active open">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                            <span class="site-menu-title">Options</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </div>

    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title="Settings">
            <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock" aria-describedby="tooltip741605">
            <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>

        <a href="{{ route('cms_panel.auth.logout') }}" data-placement="top" data-toggle="tooltip" data-original-title="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span class="icon wb-power" aria-hidden="true"></span>
        </a>
    </div>

</div>

<div class="page">
    @yield('content')
</div>

<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© 2018</div>
</footer>

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
<script src="{{ env('APP_URL') }}/design/lib/jquery-placeholder/v2.3.1/jquery.placeholder.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/switchery/v0.8.2/switchery.min.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/bootbox/v4.4.0/bootbox.min.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/bootstrap-sweetalert/v1.0.1/sweetalert.min.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/toastr/v2.1.4/toastr.min.js"></script>

<script src="{{ env('APP_URL') }}/design/lib/chartist/chartist.min.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/chartist-plugin-legend/chartist-plugin-legend.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="{{ env('APP_URL') }}/design/lib/ascolor/jquery-asColor.min.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}/design/lib/ascolorpicker/jquery-asColorPicker.min.js"></script>

<!-- Scripts -->
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Component.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Base.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Config.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Section/Menubar.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Section/GridMenu.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Section/Sidebar.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/menu.js"></script>

<!-- Page -->
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Site.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin/input-group-file.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin/switchery.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin/bootbox.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin/bootstrap-sweetalert.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin/toastr.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/bootbox-sweetalert.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin/selectable.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin/asselectable.js"></script>
<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin/bootstrap-datepicker.js"></script>

<script src="{{ env('APP_URL') }}/design/lib/base-layout/js/Plugin/ascolorpicker.js"></script>
<script>
    (function(document, window, $){
        'use strict';

        var Site = window.Site;
        $(document).ready(function(){
            Site.run();
        });
    })(document, window, jQuery);
</script>

@yield('content-bottom')
</body>
</html>