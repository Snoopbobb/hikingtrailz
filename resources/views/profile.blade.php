@extends('layout')

@section('title')
<h1>View / Edit Profile</h1>
	<div class="welcome-message">Here is your {{ $user->username}} profile info!</div>
@stop

<div>
@section('tagline')
@stop
</div>

@section('main_content')
<div class="main-content">
	<form action="profile/{{$user->user_id}}/update" method="POST">
		<div>
			<div class="inputs">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="user_id" value="{{$user->user_id}}">
				<label>First Name: </label>
				<input type="text" name="first_name" value="{{$user->first_name}}">
			</div>
			<div class="inputs">
				<label>Last Name: </label>
				<input type="text" name="last_name" value="{{$user->last_name}}">
			</div>
			<div class="inputs">
				<label>Email: </label>
				<input type="text" name="email" value="{{$user->email}}">
			</div>
			<div class="inputs">
				<label>Username:</label> <label><span class="non-label-text">{{ $user->username}}</span></label>
			</div>
			<div class="inputs"><label>Gender: </label>
				<select name="gender">
					@if($user->gender == 'male')
						<option value="male">Male</option>
						<option value="female">Female</option>
					@else
						<option value="female">Female</option>
						<option value="male">Male</option>
					@endif
				</select>
			</div>
			<div class="save-or-cancel">
				<button class="save-button">Save Changes</button>
				<span class="non-label-text"><a href="/profile/">Cancel</a></span>
			</div>
		</div>
		<div class="profile-photo">
			<div>
				<div class="image">
					<img src="/css/images/hiker_icon_small.png" alt=""> 
				</div>
			</div>
		</div>
	</form>
	<form name="Delete" action="profile/{{$user->user_id}}/delete" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="user_id" value="{{$user->user_id}}">
		<button class="delete-profile">Delete Profile</button>
	</form>
</div>

@stop