@extends('layouts.app')

@section('url') http://kampusmobil.com/videos/{{$video->mobil->slug}}/{{$video->slug}} @stop
@section('title') {{$video->title}} @stop
@section('description') {{ str_limit(strip_tags($video->body), $limit = 250, $end = '...') }} @stop
@section('image') {{$video->link}}/0.jpg @stop

@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default">
		<div class="panel-body" id="show">
			<h4 class="text-center"><b>{{$video->title}}</b></h4>
			<hr class="garis">
				<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="{{$video->link}}" frameborder="0" allowfullscreen></iframe>
				</div>
			<hr>
			<p class="pull-left">
				<a href="/videos/{{$video->mobil->slug}}" class="thumbnail text-center"><b>{{$video->mobil->model}}</b></a>
			</p>
			<p class="pull-right">
				@if(Auth::check())
	        @if(Auth::user()->admin())
						<a href="/admin/video/{{$video->id}}/edit" class="btn btn-sm btn-warning">edit</a>
					@endif
				@endif
				<small>{{$video->created_at->diffForHumans()}}</small>
			</p>
		</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body" id="show">@include('layouts.videoshare')</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body" id="show">
				@foreach($comments as $comment)
				<div style="margin-left: 50px;">{!!$comment->body!!}</div>
				@if(Auth::check())
					@if($comment->user_id == Auth::user()->id)
						<button data-toggle="collapse" data-target="#body_{{$comment->id}}" class="btn btn-success btn-xs pull-right">edit</button><br>
						<div id="body_{{$comment->id}}" class="collapse">
							<form action="/commentar/{{$comment->id}}/edit" method="post">
							{{csrf_field()}}
								<div class="form-group {{ $errors->has('body') ? ' has-error' : '' }} ">
				          <textarea name="body" rows="4" class="form-control comment">{{$comment->body}}</textarea>
				          @if($errors->has('body'))
				            <span class="help-block"> {{$errors->first('body')}} </span>
				          @endif
					      </div>
					      <div class="form-group">
					        <input type="submit" class="btn btn-warning btn-sm" value="update">
						    </div>
						  </form>
						</div>
					@endif
				@endif
				<a href="/member/{{$comment->user->slug}}">
					<img src="{{$comment->user->avatar()}}" class="img-circle pull-left">
				</a>
				<p class="pull-left" style="margin-top: 8px; margin-left: 10px;">
					<a href="/member/{{$comment->user->slug}}">{{$comment->user->name}}</a> - <small>{{$comment->created_at->diffForHumans()}}</small>
				</p>
				<br><hr>
				@endforeach
				<div class="text-center">{{$comments->links()}}</div>
				@if(Auth::user())
				Bagaimana pendapat anda {{Auth::user()->name}} ?
				<form action="/commentar/{{$video->slug}}" method="post">
					{{csrf_field()}}
		        <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }} ">
		          <textarea name="body" rows="5" class="form-control comment">{{old('body')}}</textarea>
		          @if($errors->has('body'))
		              <span class="help-block"> {{$errors->first('body')}} </span>
		          @endif
			      </div>
			      <div class="form-group">
			        <input type="submit" class="btn btn-primary btn-sm" value="kirim">
				    </div>
				</form>
				@else
					<br><br>
					<div class="text-center alert alert-warning">
						<a href="/login">Login </a>untuk dapat berkomentar
					</div>
				@endif
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body" id="show">@include('layouts.marketings')</div>
		</div>

	</div>
</div>
@endsection
@section('js')
	<script src="/js/marketings.js"></script>
	<script src="/js/table.js"></script>
@stop