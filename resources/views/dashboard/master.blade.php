<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ URL::asset('images/logo.png') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ URL::asset('/images/favicon.ico') }}">
    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.transitions.css') }}">
    
    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/lightbox.css') }}">

    <!-- Sulfur CSS Styles  -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <!-- Responsive CSS Style -->
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/modernizrr.js') }}">

    <!-- bootstrap -->
    <link href="{{ URL::asset('dashboard/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' media="all" />
    <!-- //bootstrap -->
    <link href="{{ URL::asset('dashboard/css/dashboard.css') }}" rel="stylesheet">
    <!-- Custom Theme files -->
    <link href= "{{ URL::asset('dashboard/css/style.css') }}" rel='stylesheet' type='text/css' media="all" />
    <script src="{{ URL::asset('dashboard/js/jquery-1.11.1.min.js') }}"></script>
    <!--start-smoth-scrolling-->
    <!-- fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <!-- //fonts -->
</head>
  <body>

    @yield('content')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.appear.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.fitvids.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ URL::asset('js/lightbox.min.js') }}"></script>
    <script src="{{ URL::asset('js/count-to.js') }}"></script>
    <script src="{{ URL::asset('js/styleswitcher.js') }}"></script>
    <script src="{{ URL::asset('js/map.js') }}"></script>
    <script src="{{ URL::asset('js/map.js') }}"></script>
    
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/script.js"></script> 
  
  </body>
</html>