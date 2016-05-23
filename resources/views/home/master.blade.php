<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Laravel - training</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{{ url('public/home/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{ url('public/home/css/bootstrap-responsive.css')}}" rel="stylesheet">
<link href="{{ url('public/home/css/style.css')}}" rel="stylesheet">
<link href="{{ url('public/home/css/flexslider.css')}}" type="text/css" media="screen" rel="stylesheet"  />
<link href="{{ url('public/home/css/jquery.fancybox.css')}}" rel="stylesheet">
<link href="{{ url('public/home/css/cloud-zoom.css')}}" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.html">
</head>
<body>
<!-- Header Start -->
<header>
  <div class="headerstrip">
    <div class="container">
      <div class="row">
        <div class="span12">
          
          <!-- Top Nav Start -->
          @include('home.block.topbar')
          <!-- Top Nav End -->
        </div>
      </div>
    </div>
  </div>
  <div class="container">
@include('home.block.nav')
    
  </div>
</header>
<!-- Header End -->

<div id="maincontainer">
  <!-- Slider Start-->
  @include('home.block.slider')
  <!-- Slider End-->
  
 
  @yield('content')
  
</div>
<!-- Footer -->
<footer id="footer">
  @include('home.block.footer')
</footer>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url('public/home/js/jquery.js')}}"></script>
<script src="{{ url('public/home/js/bootstrap.js')}}"></script>
<script src="{{ url('public/home/js/respond.min.js')}}"></script>
<script src="{{ url('public/home/js/application.js')}}"></script>
<script src="{{ url('public/home/js/bootstrap-tooltip.js')}}"></script>
<script defer src="{{ url('public/home/js/jquery.fancybox.js')}}"></script>
<script defer src="{{ url('public/home/js/jquery.flexslider.js')}}"></script>
<script type="text/javascript" src="{{ url('public/home/js/jquery.tweet.js')}}"></script>
<script  src="{{ url('public/home/js/cloud-zoom.1.0.2.js')}}"></script>
<script  type="text/javascript" src="{{ url('public/home/js/jquery.validate.js')}}"></script>
<script type="text/javascript"  src="{{ url('public/home/js/jquery.carouFredSel-6.1.0-packed.js')}}"></script>
<script type="text/javascript"  src="{{ url('public/home/js/jquery.mousewheel.min.js')}}"></script>
<script type="text/javascript"  src="{{ url('public/home/js/jquery.touchSwipe.min.js')}}"></script>
<script type="text/javascript"  src="{{ url('public/home/js/jquery.ba-throttle-debounce.min.js')}}"></script>
<script defer src="{{ url('public/home/js/custom.js')}}"></script>
</body>
</html>