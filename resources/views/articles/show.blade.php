@extends('layouts.app')

@section('url') http://kampusmobil.com/articles/{{$article->brand->slug}}/{{$article->slug}} @stop
@section('title') {{$article->title}} @stop
@section('description') {{ str_limit(strip_tags($article->body), $limit = 250, $end = '...') }} @stop
@section('image') {{$article->img}} @stop

@section('content')
<div class="row">
	<div class="col-md-9">
	
		<div class="panel panel-default">
		<div class="panel-body" id="show">
			<h4 class="text-center"><b>{{$article->title}}</b></h4>
			<hr class="garis">
			<a href="{{$article->img}}">
				<img src="{{$article->img}}" class="img-responsive" alt="{{$article->brand->brand}}">
			</a>
			<br>
			<div id="showing">
				{!! $article->body !!}
			</div>
			<hr>
			<p class="pull-left">
				<a href="/articles/{{$article->brand->slug}}" class="thumbnail text-center"><b>{{$article->brand->brand}}</b></a>
			</p>
			<p class="pull-right">
				@if(Auth::check())
	        @if(Auth::user()->admin())
	          <a href="/admin/article/{{$article->id}}/edit" class="btn btn-xs btn-success">edit</a>
						<button data-toggle="collapse" data-target="#rem_{{$article->id}}" class="btn btn-warning btn-xs">Remove ?</button>
						<div id="rem_{{$article->id}}" class="collapse pull-right">
							<a href="/admin/article/{{$article->id}}/delete" class="btn btn-xs btn-danger">delete</a>
						</div>
					@endif
				@endif
				<small>{{$article->created_at->diffForHumans()}}</small>
			</p>
		</div>
		</div>
		<div class="row">
			@include('layouts.articleshare')
		</div>
		<div class="row">
			@include('layouts.marketings')
		</div>

		<div class="row">
			@include('layouts.videos')
		</div>

		<div class="row">
		    @include('layouts.forums')
		</div>

		<div class="row">
		    @include('layouts.speks')
		</div>

	</div>
</div>
@endsection
@section('js')
	<script src="/js/marketings.js"></script>
	<script src="/js/imgtab.js"></script>
@stop