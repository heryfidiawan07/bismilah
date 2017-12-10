@extends('layouts.app')

@section('url') http://kampusmobil.com/forum/{{$thread->brand->slug}}/{{$thread->slug}} @stop
@section('title') {{$thread->title}} @stop
@section('description') {{ str_limit(strip_tags($thread->body), $limit = 250, $end = '...') }} @stop
@section('image') {{$thread->img}} @stop

@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default">
		<div class="panel-body" id="show">
			<h4 class="text-center"><b>{{$thread->title}}</b></h4>
			@if($thread->img)
				<a href="{{$thread->img}}">
					<img src="{{$thread->img}}" class="img-responsive" alt="{{$thread->brand->brand}}">
				</a>
			@endif
				<br>
				{!!$thread->body!!}
				<hr>
				<p>
					<a href="/{{$thread->brand->slug}}" class="thumbnail text-center"><b>{{$thread->brand->brand}}</b></a>
				</p>
				<a href="/member/{{$thread->user->slug}}">
					<img src="{{$thread->user->avatar()}}" class="img-circle pull-left">
				</a>
				<p class="pull-left" style="margin-top: 10px; margin-left: 10px;">
					<a href="/member/{{$thread->user->slug}}">{{$thread->user->name}}</a> - <small>{{$thread->created_at->diffForHumans()}}</small>
				</p>
				@if(Auth::check())
          @if(Auth::user()->id == $thread->user_id)
	          <a style="margin-top: 10px; margin-left: 10px;" href="/forum/{{$thread->id}}/edit" class="btn btn-xs btn-success pull-right">edit</a>
	        @endif
		    @endif
		</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body" id="show">@include('layouts.forumshare')</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body" id="show">
				@foreach($comments as $comment)
				<div style="margin-left: 50px;">{!!$comment->body!!}</div>
				@if(Auth::check())
					@if($comment->user_id == Auth::user()->id)
						<button data-toggle="collapse" data-target="#body_{{$comment->id}}" class="btn btn-success btn-xs pull-right">edit</button><br>
						<div id="body_{{$comment->id}}" class="collapse">
							<form action="/comment/{{$comment->id}}/edit" method="post">
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
				Apa tanggapan anda {{Auth::user()->name}}
				<form action="/comment/{{$thread->slug}}" method="post">
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
						<a href="/login">Login </a>untuk dapat bertanya dan berkomentar di forum
					</div>
				@endif
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body" id="show">@include('layouts.marketings')</div>
		</div>
		
		<div class="row">
			<h4 class="text-center"><b>Berita</b></h4><hr>
			@include('layouts.articles')
		</div>

		<div class="row">
		    <h4 class="text-center"><b>Spesifikasi</b></h4><hr>
		    @include('layouts.speks')
		</div>

		<div class="row">
		    <h4 class="text-center"><b>Video Review</b></h4><hr>
		    @include('layouts.videos')
		</div>

	</div>
</div>
@endsection
@section('js')
	<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script type="text/javascript" src="/js/mcef.js"></script>
	<script src="/js/marketings.js"></script>
	<script src="/js/imgf.js"></script>
@stop