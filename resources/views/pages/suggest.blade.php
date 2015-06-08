@extends('layout')

	@section('tagline')

	<div class="tagline suggest">
	<h1 class="tag min-tag">Don't see a trail you love?</h1>
	<h4>Suggest it to us. We'll do some research, and get it on our website as soon as possible.</h4>
	</div>
	@stop
	@section('main_content')
		<div class="suggest-wrapper">

		<form class="suggest-form" action="/confirmation" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="suggest-input">
				Mountain Name:
				<input type="text" class="suggest-input" name="mountain_name">
			</div>
			<div class="suggest-input">
				Trail Name:
				<input type="text" class="suggest-input" name="trail_name">
			</div>
			<div class="suggest-input">
				Trail Location:
				<input type="text" class="suggest-input" name="trail_location">
			</div>
			<div class="suggest-radio-wrapper">
					Trail Length:
				<div class="suggest-radio">
					<label>
					<input type="radio" name="trail_length" value="1-3_miles">
					1-3 Miles
					</label>
				</div>
				<div class="suggest-radio">
					<label>
					<input type="radio" name="trail_length" value="3-7_miles">
					3-7 Miles
					</label>
				</div>
				<div class="suggest-radio">
					<label>
					<input type="radio" name="trail_length" value="7-12_miles">
					7-12 Miles
					</label>
				</div>
				<div class="suggest-radio">
					<label>
					<input type="radio" name="trail_length" value="13+_miles">
					13+ Miles
					</label>
				</div>
				<div>
					<button class="suggest-button">Submit</button>
				</div>
			</div>
		</form>
	</div>
@stop