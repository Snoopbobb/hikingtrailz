@extends('layout')

@section('title')
		@if(Auth::guest())
		<h1 class="welcome-message">Welcome <span class="welcome">Hikerz!</span></h1>
		@else
		<h1 class="welcome-message">Welcome <span class="welcome">{{Auth::user()->first_name}}!</span>
		</h1>
		@endif
		<div class="welcome-message">Check out our amazing Hiking Trails</div>	
@stop


@section('featured')
<div class="featured">
	<span class="featureblock" style="background: -webkit-radial-gradient(center, ellipse cover, rgba(140, 100, 142,0.1) 0%,rgba(140, 100, 142,0.5) 100%), url(./css/images/Camelback/CamelbackMountainPanorama.jpg); background-size: cover;">
		<div>
			<div class="thumbnail">
				<h3>Camelback Mountain</h3>
			</div>
			<div class="info">
				<h2><a href="/hikingtrailz/Mountains/2">Camelback Mountain</a></h2>
				<div class="fweather">

				</div>
				<div><strong>Summit Elev.</strong> 2,706 ft.</div>
				<p>A small but steep mountain in the heart of Scottsdale. It is very busy most weekend days, but offers some of the greatest and highest views of the greater Phoenix area.</p>
				<input type="hidden" value="2">
			</div>
		</div>
	</span>
	<span class="featureblock" style="background: -webkit-radial-gradient(center, ellipse cover, rgba(37, 100, 159, 0.2) 0%,rgba(37, 100, 159, 0.5) 100%), url(./css/images/DreamyDraw/PiestewaPeak.jpg); background-size: cover;">
		<div>
			<div class="thumbnail">
				<h3>Dreamy Draw Park</h3>
			</div>
			<div class="info">
				<h2><a href="/hikingtrailz/Mountains/3">Dreamy Draw Park</a></h2>
				<div class="fweather">
					
				</div>
				<div><strong>Summit Elev.</strong> 2,612 ft.</div>
				<p>A very large park with dozens of trails. Almost as many bikers as hikers, and one of the best views in all of Phoenix</p>
				<input type="hidden" value="3">
			</div>
		</div>
	</span>
	<span class="featureblock" style="background: -webkit-radial-gradient(center, ellipse cover, rgba(245, 229, 140,0.1) 0%,rgba(245, 229, 140,0.4) 100%), url(./css/images/McDowellMountains/IMG_8261.jpg); background-size: cover;">
		<div>
			<div class="thumbnail">
				<h3>McDowell Mountains</h3>
			</div>
			<div class="info">
				<h2><a href="//hikingtrailzMountains/5">McDowell Mountains</a></h2>
				<div class="fweather">
				</div>
				<div><strong>Summit Elev.</strong> 4,057 ft.</div>
				<p>A long range of mountains in Norht Scottsdale that has tons of long hikes, tons of steep hike, and both!</p>
				<input type="hidden" value="5">
			</div>
		</div>
	</span>
	<span class="featureblock focus" style="background: -webkit-radial-gradient(center, ellipse cover, rgba(79, 157, 137 ,0.4) 0%,rgba(79, 157, 137,0.7) 100%), url(./css/images/Sup2HDR.jpg); background-size: cover;">
		<div>
			<div class="thumbnail">
				<h3>The Superstitions</h3>
			</div>
			<div class="info">
				<h2><a href="/hikingtrailz/">The Superstitions</a></h2>
				<div class="fweather">
				</div>
				<div><strong>Summit Elev.</strong> 5,059 ft.</div>
				<p>An old and gorgeous mountain range, full of mysteries and tales of hidden treasure, ghosts and spirits. Also home to some of the best hikes, and views in all the state.</p>
				<input type="hidden" value="10">
			</div>
		</div>
	</span>
	<span class="feature-buttons">
		<div><i class="fa fa-chevron-right"></i></div>
		<div><i class="fa fa-chevron-left"></i></div>
	</span>
</div>
@stop

@section('tagline')
<div class="tagline">
	<h1 class="main-tag tag">Explore the mountains</h1>
	<div>
		<span class="selected">Browse</span>
		<span>Search</span>
	</div>
</div>
@stop
@section('main_content')
	<div>
		<span class="search displayNone">
			<form action="" method="get">
				{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
				<input type="text" name="message" placeholder="Search...">
				<button>Search</button>
			</form>
		</span>
		<div class="results"></div>
	</div>
	<div class="tiles masonry">
		<a href="/hikingtrailz/Mountains/2"><div class="scale tile_1 tile-name"><h3>Camelback Mountain</h3></div></a>
		<a href="/hikingtrailz/Mountains/5"><div class="scale tile_2 tile-name"><h3>McDowell Mountains</h3></div></a>
		<a href="/hikingtrailz/Mountains/7"><div class="scale tile_3 tile-name"><h3>South Mountain</h3></div></a>
		<a href="/hikingtrailz/Mountains/6"><div class="scale tile_4 tile-name"><h3>North Mountain</h3></div></a>
		<a href="/hikingtrailz/Mountains/4"><div class="scale tile_5 tile-name"><h3>Lookout Mountain</h3></div></a>
		<a href="/hikingtrailz/Mountains/9"><div class="scale tile_6 tile-name"><h3>Shadow Mountain</h3></div></a>
		<a href="/hikingtrailz/Mountains/3"><div class="scale tile_7 tile-name"><h3>Dreamy Draw / Piestewa Peak</h3></div></a>
	</div>
@stop
