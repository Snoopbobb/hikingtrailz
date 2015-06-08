@extends('layout')


@section('title')
<h1>{{ $trail->name }}</h1>
<div class="fweather">
</div>
<div class='hash'>#<span class="hashtag">{{ $trail->hashtag }}</span></div>
@stop


@section('tagline')
<div class="tagline">
	<h1 class="tag	main-tag">Length: {{ number_format($trail->length) }} ft. | Elevation Gain: {{ number_format($trail->elevation_gain) }} ft.</h1>
</div>
@stop



@section('main_content')
	<div class="trail-description trail">
		<h3>Trail Description</h3>
		<p>{{ $trail->description }}</p>
		<div class="rating">
			<h4><span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span> 4/5 </h4>
		</div>
		<div><strong>Elevation Gain: </strong>{{ number_format($trail->elevation_gain) }} ft.</div>
		<div><strong>Trail Length: </strong>{{ number_format($trail->length) }} ft.</div>
		<div><strong>Trail Hashtag: </strong>#{{ $trail->hashtag }}</div>
	</div>
	<div class="trail-comment trail">
		<h3>Comments</h3>
		<div class="comments">
			@foreach($comment as $comm)
				<div class="comment-block">
					<div class="image">&nbsp;</div>
					<div class="comment">
						<div class="date">{{$comm->created_at}}</div>
						<div class="user-name">{{$comm->username}}</div>
						<div class="comment-content">{{$comm->comment_description}}</div>
					</div>
					@if(!Auth::guest())
						@if(Auth::user()->user_id == $comm->user_id)
							<div class="delete">
								<form class="delete-comment">
									<input class="comment-id" type="hidden" value="{{$comm->comment_id}}">
									<i title="Delete Comment" class="fa fa-times"></i>
								</form>
							</div>
						@endif
					@endif
				</div>
			@endforeach
		</div>


		@if(Auth::guest())
			<h1 class="login-comment"><a class="login-comment" href="/Trails/loginToComment/{{$mountain->mountain_id}}/{{$trail->trail_id}}">Login
			</a>to add a comment!</h1>
		@else
			<div class="new-comment">
				<strong>Add a Comment {{Auth::user()->first_name}}!</strong>
				<form class="add-comment">
					<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" class="trail-id" name="trail_id" value="{{$trail->trail_id}}">
					<input class="user-id" type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
					<textarea name="comment_description" placeholder="Add your comment!"></textarea>
						<div>
							<button>Send</button>
						</div>
				</form>
			</div>
		@endif
			

		@if(Auth::user())
		<script id="template-comment" type="text/x-handlebars-template">
			<div class="comment-block">
				<div class="image"></div>
				<div class="comment">
					<div class="date">@{{created_at}}</div>
					<div class="user-name">{{Auth::user()->username}}</div>
					<div class="comment-content">
						@{{comment_description}}
					</div>
				</div>
					<div class="delete">
						<form class="delete-comment">
							<input class="comment-id" type="hidden" value="@{{comment_id}}">
							<i title="Delete Comment" class="fa fa-times"></i>
						</form>
					</div>
				</div>
		</script>
		@endif
	</div>


	
	<div class="instagram-feed trail">
		<h3>#{{ $trail->hashtag }}</h3>
		<div id="instafeed"></div>
	</div>
@stop