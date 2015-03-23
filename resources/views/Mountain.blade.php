@extends('layout')

@section('title')
<h1>{{ $mountain->name }}</h1>
<div class="fweather">
</div>
@stop


@section('tagline')
<div class="tagline">
	<h1 class="tag min-tag">{{ $mountain->description }}</h1>
	<div>
		<span class="selected">Top 10</span>
		<span>See All</span>
	</div>
</div>
@stop


@section('main_content')
	<div class="masonry trail_tiles">
		<div class="js-masonry">
			{!! $template !!}
		</div>
	</div>
	<div class="seeAll displayNone">
		<?php 
			$template2 = '';
			$a = '<div><a href="/hikingtrailz/Trails/' . $mountain->mountain_id . '/';
			$i = 1;
			$q = 0;
			foreach ($trail->getArray() as $trails) {
				$template2 .= $a . $trails->trail_id . '">' . $trails->name . '</a></div>' ;
				$i++;
				$q++;
			} ?>
		 {!!$template2!!}
	</div>

@stop