<!DOCTYPE html>

<!--
 // WEBSITE/: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Creative Agency Bootstrap Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Airspace Template v1.0">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />


  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('assets/website/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- Ionic Icon Css -->
  <link rel="stylesheet" href="{{asset('assets/website/plugins/Ionicons/css/ionicons.min.css')}}">
  <!-- animate.css -->
  <link rel="stylesheet" href="{{asset('assets/website/plugins/animate-css/animate.css')}}">
  <!-- Magnify Popup -->
  <link rel="stylesheet" href="{{asset('assets/website/plugins/magnific-popup/magnific-popup.css')}}">
  <!-- Slick CSS -->
  <link rel="stylesheet" href="{{asset('assets/website/plugins/slick/slick.css')}}">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('assets/website/css/style.css')}}">

</head>

<body id="body">

<!-- Header Start -->
<header class="navigation sticky-top border-bottom">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 ">
				<nav class="navbar navbar-expand-lg p-0">
					<a class="navbar-brand" href="/" style="font-size: 30px; font-family: 'Lobster Two',cursive">
						KaungMinDaily
					</a>

					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ion-android-menu"></span>
					</button>

					<div class="collapse navbar-collapse ml-auto" id="navbarsExample09">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item @@home">
								<a class="nav-link" href="{{route('home')}}">Home</a>
							</li>
							
							<li class="nav-item @@contact"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
							<div class=" btn-group ">
              
             @auth 

                  <li class="nav-item @@contact"><a class="nav-link btn btn-outline-secondary btn-sm mr-2" href="{{url('/auth/dashboard')}}">Dashboard</a></li>
              

                 <li class="nav-item @@contact"><a class="nav-link btn btn-outline-info btn-sm" href="{{route('posts.create')}}">Create Posts</a></li>

             @endauth


             @guest 

             <li class="nav-item @@contact"><a class="nav-link btn btn-info btn-sm" href="{{url('/login')}}">Login</a></li>


             @endguest
              
              </div>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header><!-- header close -->

@yield('content')

<!-- footer Start -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-manu">
					<ul>
						<li><a href="about.html">About Me</a></li>
						<li><a href="{{route('contact')}}">Contact Me</a></li>
						<li><a href="{{route('home')}}">Home</a></li>
						<li><a href="faq.html">FAQ</a></li>
						
					</ul>
				</div>
				
			</div>
		</div>
	</div>
</footer>

<!--Scroll to top-->
<div id="scroll-to-top" class="scroll-to-top">
	<span class="icon ion-ios-arrow-up"></span>
</div>

    <!-- 
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{asset('assets/website/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{asset('assets/website/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- slick Carousel -->
    <script src="{{asset('assets/website/plugins/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/website/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <!-- filter -->
    <script src="{{asset('assets/website/plugins/shuffle/shuffle.min.js')}}"></script>
    <script src="{{asset('assets/website/plugins/SyoTimer/jquery.syotimer.min.js')}}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="{{asset('assets/website/plugins/google-map/map.js')}}"></script>

    <script src="{{asset('assets/website/js/script.js')}}"></script>

    </body>

    </html>