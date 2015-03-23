@extends('layout')

	@section('title')
	<h1>Sign-up</h1>
	@stop

	@section('main_content')
	<?php $my_errors = []; ?>
		<div class="main-content">
				@if(count($errors) > 0)
					<span class="head-error">Whoops!</span>
					<div class="main-error">There were some problems with your input.</div>
					 <?php
						foreach($errors->keys() as $key) {
							$my_errors[$key] = $errors->get($key)[0];
						}
					?>
				@endif
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
				<div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group inputs">
						<label class="col-md-4 control-label"> First Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"> 
							<div class="error">
							@if(isset($my_errors['first_name']))

								{{$my_errors['first_name']}}

							@endif
							</div>
						</div>
					</div>

					<div class="form-group inputs">
						<label class="col-md-4 control-label"> Last Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="last_name" value="{{ 
							old('last_name') }}">
							<div class="error">
							@if(isset($my_errors['last_name']))
							
								{{$my_errors['last_name']}}

							@endif
							</div>
						</div>
					</div>

					<div class="form-group inputs">
						<label class="col-md-4 control-label"> User Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="username" value="{{ old('username') }}">
							<div class="error">
							@if(isset($my_errors['username']))
							
								{{$my_errors['username']}}

							@endif
							</div>
						</div>
					</div>

					<div class="form-group inputs">
						<label class="col-md-4 control-label">E-Mail</label>
						<div class="col-md-6">
							<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							<div class="error">
							@if(isset($my_errors['email']))
							
								{{$my_errors['email']}}

							@endif
							</div>
						</div>
					</div>

					<div class="form-group inputs">
						<label class="col-md-4 control-label">Password</label>
						<div class="col-md-6">
							<input type="password" class="form-control" name="password">
							<div class="error">
							@if(isset($my_errors['password']))
							
								{{$my_errors['password']}}

							@endif
							</div>
						</div>
					</div>

					<div class="form-group inputs">
						<label class="col-md-4 control-label">Confirm Password</label>
						<div class="col-md-6">
							<input type="password" class="form-control" name="password_confirmation">
						</div>
							<div class="error">
							@if(count($errors) > 0 && $errors->getBag('default')->has('password'))

								{{$errors->getBag('default')->get('password')[0]}}

							@endif
							</div>
						
					</div>

					<div class="form-group inputs">
						<label class="col-md-4 control-label"> Gender</label>
						<div class="col-md-6">
							<select name="gender">
								<div>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</div>
							</select>
						</div>
					</div>
				</div>
				<div class="signup-button">
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Sign up now!
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	@stop
