<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HikingTrailz</title>
	<link rel="stylesheet" href="//necolas.github.io/normalize.css/3.0.2/normalize.css">
	<link href='//fonts.googleapis.com/css?family=Rock+Salt|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ URL::asset('hikingtrailz/css/styles.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('hikingtrailz/fonts/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('hikingtrailz/fonts/weather-icons/css/weather-icons.min.css') }}">
</head>
<body>
	<div class="hero">
		<div class="photo" style="background-image: url(<?php if (isset($imageURL)) { echo "/hikingtrailz/$imageURL";} else { echo '/hikingtrailz/css/images/Sup2HDR.jpg';} ?>)">
			<header>
				<nav>
					<span class="logo">
						<a href="{{ url('/hikingtrailz/') }}">Hiking Trailz</a>
					</span>
					<div>
						<div class="options browse">
							<div>Browse All</div>
							<div>See All The Mountains</div>
						</div>
						<a href="{{ url('hikingtrailz/suggest') }}"><div class="options suggest">
							<div>Suggest A Trail</div>
							<div>Send Us What You Wanna See</div>
						</div></a>
						<div class="options randomtrail">
							<div>Random Trail</div>
							<div>Any Random Trail</div>
						</div>
					</div>
					<span class="user-options">
						@if(Auth::guest())
						<a href="/hikingtrailz/auth/register" title="Signup"><i class="fa fa-user-plus scale"></i></a>
						<a href="/hikingtrailz/auth/login" title="Login"><i class="fa fa-sign-in scale"></i></a>
						@else
						<a href="/hikingtrailz/profile" title="Edit Profile"><i class="fa fa-cogs scale"> </i></a>
						<a href="{{ url('/hikingtrailz/auth/logout') }}" title="Logout"><i class="fa fa-external-link scale"></i></a>
						@endif
					</span>
				</nav>
			</header>
			<div class="title">
				@section('title')
				@show
			</div>
		</div>

	</div>
	<div class="blah">
		@section('featured')
		@show
	</div>
	<main>

		@section('tagline')
		@show
		<div class="browse-section">
			
		@yield('main_content')

		</div>

	</main>

	<footer>
		<span class="logo-footer">
			<a href="/hikingtrailz/">Hiking Trailz</a>
		</span>
		<span class="about">
			<h2><a href="/hikingtrailz/about">About Us</a> | 
			<a href="/hikingtrailz/faq">FAQ</a></h2>
		</span>
		<span class="social-logos">
			<a href="//instagram.com/"><i class="fa fa-instagram fa-3x"></i></a>
			<a href="//www.facebook.com/"><i class="fa fa-facebook-official fa-3x"></i></a>
			<a href="//twitter.com/"><i class="fa fa-twitter fa-3x"></i></a>
		</span>
	</footer>
	<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>
	<script type="text/javascript" src="{{ URL::asset('hikingtrailz/javascript/instafeed.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('hikingtrailz/javascript/jquery.simplyscroll.min.js') }}"></script>
	<script src="{{ URL::asset('hikingtrailz/javascript/main.js') }}"></script>
	<script src="{{ URL::asset('hikingtrailz//masonry.pkgd.js') }}"></script>
</body>
</html>