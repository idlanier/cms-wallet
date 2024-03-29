
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title update-title>@yield("page-title")</title>
    
    <link rel="apple-touch-icon" href="{{ URL::asset('/layout-theme/mmenu/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/layout-theme/mmenu/assets/images/favicon.ico') }}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/mmenu/assets/css/site.min.css') }}">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/vendor/jquery-mmenu/jquery-mmenu.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/vendor/waves/waves.css') }}">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layout-theme/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="{{ URL::asset('/global/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="{{ URL::asset('/global/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ URL::asset('/global/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{{ URL::asset('/layout-theme/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
      Breakpoints();
    </script>
  <body class="animsition site-navbar-small mm-wrapper site-menubar-unfold site-menubar-keep">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    
    <!-- Nav Bar -->
    @extends('common::layouts.navbar')
    <!-- Nav Bar -->

    <!-- Side Bar -->
    @extends('common::layouts.sidebar')
    <!-- Side Bar -->

    <!-- Page -->
    <div class="page">
        @yield('content')
    </div>
    <!-- End Page -->

    <!-- Footer -->
    @extends('common::layouts.footer')
    <!-- End Footer -->

    <!-- Core  -->
    <script src="{{ URL::asset('/layout-theme/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/popper-js/umd/popper.min.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/animsition/animsition.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/waves/waves.js') }}"></script>
    
    <!-- Plugins -->
    <script src="{{ URL::asset('/layout-theme/global/vendor/jquery-mmenu/jquery.mmenu.min.all.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/switchery/switchery.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/intro-js/intro.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/screenfull/screenfull.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
    
    <!-- Scripts -->
    <script src="{{ URL::asset('/layout-theme/global/js/Component.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/js/Plugin.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/js/Base.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/js/Config.js') }}"></script>
    
    <script src="{{ URL::asset('/layout-theme/mmenu/assets/js/Section/Menubar.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/mmenu/assets/js/Section/Sidebar.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/mmenu/assets/js/Section/PageAside.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/mmenu/assets/js/Section/GridMenu.js') }}"></script>
    
    <!-- Config -->
    <script src="{{ URL::asset('/layout-theme/global/js/config/colors.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/mmenu/assets/js/config/tour.js') }}"></script>
    <script>Config.set('assets', '../../assets');</script>
    
    <!-- Page -->
    <script src="{{ URL::asset('/layout-theme/mmenu/assets/js/Site.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/js/Plugin/asscrollable.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/js/Plugin/slidepanel.js') }}"></script>
    <script src="{{ URL::asset('/layout-theme/global/js/Plugin/switchery.js') }}"></script>
    
    <!-- Angular -->
    <script src="{{ URL::asset('/assets/js/angular.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/angular-ui-router.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/angular-tablesort.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/helper.js') }}"></script>  
    <script src="{{ URL::asset('/assets/js/angular-locale_id-id.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/angular-ui-bootstrap-tpls.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/loading-bar.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/angular-leaf.js') }}"></script>  
    <script src="{{ URL::asset('/assets/js/select.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/angular-sanitize.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/dynamic-number.min.js') }}"></script>

    @yield('script')

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
