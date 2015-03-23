@extends('layout')

@section('title')
	<h1>Got A Trail In Mind?</h1>
	<div>Give it to us here!</div>
@stop

@section('main_content')

	<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				<div class="main-content">
					<div>
						<form class="form-horizontal" role="form" method="POST" action="">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group inputs">
								<label class="col-md-4 control-label"> Mountain Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="first_name" value="{{ old('name') }}">
								</div>
							</div>

							<div class="form-group inputs">
								<label class="col-md-4 control-label"> Trailhead Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="last_name" value="{{ old('name') }}">
								</div>
							</div>

							<div class="form-group inputs">
								<label class="col-md-4 control-label">desciption</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								</div>
							</div>

							<div class="form-group inputs">
								<label class="col-md-4 control-label">distance in ft</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
								</div>
							</div>

						<div class="signup-button">
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Submit that trail!
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div

@stop