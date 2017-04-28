@extends('layouts.app')

@section('url') http://kampusmobil.com/{{$article->brand->slug}}/{{$article->slug}} @stop
@section('title') {{$article->title}} @stop
@section('description') {{ str_limit(strip_tags($article->body), $limit = 150, $end = '...') }} @stop
@section('image') {{$article->img}} @stop

@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default">
		<div class="panel-body" id="show">
			<h4 class="text-center"><b>{{$article->title}}</b></h4>
			<a href="{{$article->img}}">
				<img src="{{$article->img}}" class="img-responsive" alt="{{$article->brand->brand}}" style="max-width: 100%; max-height: 400px;">
			</a>
			<br>
			{!! $article->body !!}
			<hr>
			<p class="pull-left">
				<a href="/{{$article->brand->slug}}" class="thumbnail text-center"><b>{{$article->brand->brand}}</b></a>
			</p>
			<p class="pull-right">
				@if(Auth::check())
	        @if(Auth::user()->admin())
						<a href="/admin/article/{{$article->id}}/edit" class="btn btn-sm btn-warning">edit</a>
					@endif
				@endif
				<small>{{$article->created_at->diffForHumans()}}</small>
			</p>
		</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body" id="show">@include('layouts.articleshare')</div>
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