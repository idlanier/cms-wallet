<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">

    <title>Login</title>

    <link rel="apple-touch-icon" href="{{ URL::asset('/uicore/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/uicore/assets/images/favicon.ico') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ URL::asset('/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/uicore/assets/css/site.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ URL::asset('/global/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/global/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/global/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/global/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/global/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/global/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/global/vendor/waves/waves.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/uicore/assets/examples/css/pages/login-v2.css') }}">


    <!-- Fonts -->
    <link rel="stylesheet" href="{{ URL::asset('/global/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="{{ URL::asset('/global/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="{{ URL::asset('/global/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ URL::asset('/global/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{{ URL::asset('/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="animsition page-login-v2 layout-full page-dark">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<!-- Page -->
<div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
        <div class="page-brand-info">
            <div class="brand">
                <img class="brand-img" src="{{ URL::asset('/uicore/assets/images/logo@2x.png') }}" alt="...">
                <h2 class="brand-text font-size-40">CMS Wallet</h2>
            </div>
            <p class="font-size-20">Content Management System of Wallet</p>
        </div>

        <div class="page-login-main">
            <div class="brand hidden-md-up">
                <img class="brand-img" src="{{ URL::asset('/uicore/assets/images/logo-colored@2x.png') }}" alt="...">
                <h3 class="brand-text font-size-40">CMS Wallet</h3>
            </div>
            <h3 class="font-size-24 brand-text">Login</h3>

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                @if(Session::has("message"))
                    <span class="text text-danger"><center>{{ Session::get("message") }}</center></span>
                @endif
                {{csrf_field()}}
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    <label class="floating-label" for="email">Email</label>
                </div>
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input id="password" type="password" class="form-control empty" name="password" required>
                    <label class="floating-label" for="password">Password</label>
                </div>
                <!-- <div class="form-group clearfix">
                    <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="inputCheckbox">Remember me</label>
                    </div>
                    <a class="float-right" href="{{ route('password.request') }}">Forgot password?</a>
                </div> -->

                <button type="submit" class="btn btn-primary btn-block">Login</button>

            </form>

            <p>No account? <a href="register-v2.html">Register</a></p>

            <footer class="page-copyright">
                <p>WEBSITE BY Reinaldi Mukti</p>
                <p>© 2019. All RIGHT RESERVED.</p>
            </footer>
        </div>

    </div>
</div>
<!-- End Page -->


<!-- Core  -->
<script src="{{ URL::asset('/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/jquery/jquery.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/popper-js/umd/popper.min.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/bootstrap/bootstrap.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/animsition/animsition.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/waves/waves.js') }}"></script>

<!-- Plugins -->
<script src="{{ URL::asset('/global/vendor/switchery/switchery.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/intro-js/intro.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
<script src="{{ URL::asset('/global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

<!-- Scripts -->
<script src="{{ URL::asset('/global/js/Component.js') }}"></script>
<script src="{{ URL::asset('/global/js/Plugin.js') }}"></script>
<script src="{{ URL::asset('/global/js/Base.js') }}"></script>
<script src="{{ URL::asset('/global/js/Config.js') }}"></script>

<script src="{{ URL::asset('/uicore/assets/js/Section/Menubar.js') }}"></script>
<script src="{{ URL::asset('/uicore/assets/js/Section/Sidebar.js') }}"></script>
<script src="{{ URL::asset('/uicore/assets/js/Section/PageAside.js') }}"></script>
<script src="{{ URL::asset('/uicore/assets/js/Plugin/menu.js') }}"></script>

<!-- Config -->
<script src="{{ URL::asset('/global/js/config/colors.js') }}"></script>
<script src="{{ URL::asset('/uicore/assets/js/config/tour.js') }}"></script>
<script>Config.set('assets', '/uicore/assets');</script>

<!-- Page -->
<script src="{{ URL::asset('/uicore/assets/js/Site.js') }}"></script>
<script src="{{ URL::asset('/global/js/Plugin/asscrollable.js') }}"></script>
<script src="{{ URL::asset('/global/js/Plugin/slidepanel.js') }}"></script>
<script src="{{ URL::asset('/global/js/Plugin/switchery.js') }}"></script>
<script src="{{ URL::asset('/global/js/Plugin/jquery-placeholder.js') }}"></script>
<script src="{{ URL::asset('/global/js/Plugin/material.js') }}"></script>

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
