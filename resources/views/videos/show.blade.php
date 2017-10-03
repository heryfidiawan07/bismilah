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
				<a href="/videos/{{$video->mobil->slug}}" class="thumbnail text-center"><b>{{$video->mobil->slug}}</b></a>
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
			<div class="panel-body" id="show">@include('layouts.marketings')</div>
		</div>
	</div>
</div>
@endsection
@section('js')
	<script src="/js/marketings.js"></script>
	<script src="/js/table.js"></script>
@stop