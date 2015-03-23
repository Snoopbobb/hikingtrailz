@extends('layout')


	@section('title')
	<h1>Login</h1> 
	@stop

@section('main_content')
	<?php $login_errors = []; ?>
	<div class="main-content">
		@if (count($errors) > 0)
				<span class="head-error">Oh No!</span> 
				<div class="main-error">There were some problems with your input.</div>
				<div class="main-error">Not a Member? Click <a href="/auth/register">here</a> to sign up!</div>
				<?php 
					foreach($errors->keys() as $key) {
						$login_errors[$key] = $errors->get($key)[0];
					}

						
				?>
		@endif

		<form role="form" method="POST" action="{{ url('/auth/login') }}">
			<div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="inputs">
					<label class="col-md-4 control-label">E-Mail:</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}">
						<div class="error">
						@if(isset($login_errors['email']))
							{{$login_errors['email']}}
						@endif
						</div>
					</div>
				</div>

				<div class="inputs">
					<label class="col-md-4 control-label">Password</label>
					<div>
						<input type="password" class="form-control" name="password">
						<div class="error">
						@if(isset($login_errors['password']))
							{{$login_errors['password']}}
						@endif
						</div>
					</div>
				</div>

				<div class="inputs">
					<div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember"> Remember Me
							</label>
						</div>
					</div>
				</div>

				<div class="inputs">
					<a class="password-forgotten" href="{{ url('/password/email') }}">Forgot Your Password?</a>
				</div>
			</div>
			<div class="signup-button">
				<button class="login" type="submit">Login</button>
			</div>
		</form>
	</div>
</div>
@endsection
	