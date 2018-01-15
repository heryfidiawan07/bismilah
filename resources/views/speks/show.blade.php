@extends('layouts.app')

@section('url') http://kampusmobil.com/spesifikasi/{{$spek->mobil->slug}}/{{$spek->slug}} @stop
@section('title') {{$spek->title}} @stop
@section('description') {{ str_limit(strip_tags($spek->speks), $limit = 250, $end = '...') }} @stop
@section('image') https://lh3.googleusercontent.com/-WL0ZJvL2woo/WQBwHGJsPdI/AAAAAAAAAkg/sehLYuEPH5MnOCIo06PD-mx6V2xLa8SQwCHM/s200/%255BUNSET%255D @stop

@section('content')
<div class="row">
	<div class="col-md-9">
		<div class="panel panel-default">
		<div class="panel-body" id="show">
			<h4 class="text-center"><b>{{$spek->title}}</b></h4>
			<br>
			<div id="showing">
				{!! $spek->speks !!}
			</div>
			<hr>
			<p class="pull-left">
				<a href="/profil/{{$brand->slug}}/{{$spek->mobil->slug}}" class="thumbnail text-center"><b>{{$spek->mobil->model}}</b></a>
			</p>
			<p class="pull-right">
				@if(Auth::check())
	        @if(Auth::user()->admin())
	          <a href="/admin/spesifikasi/{{$spek->id}}/edit" class="btn btn-xs btn-success">edit</a>
						<button data-toggle="collapse" data-target="#sp_{{$spek->id}}" class="btn btn-warning btn-xs">Remove ?</button>
						<div id="sp_{{$spek->id}}" class="collapse pull-right">
							<a href="/admin/spesifikasi/{{$spek->id}}/delete" class="btn btn-xs btn-danger">delete</a>
						</div>
	        @endif
	      @endif
				<small>{{$spek->created_at->diffForHumans()}}</small>
			</p>
		</div>
		</div>

		<div class="row">
			@include('layouts.spekshare')
		</div>
		<div class="row">
			@include('layouts.marketings')
		</div>

	</div>
</div>

<div class="row">
	@include('layouts.articles')
</div>

<div class="row">
    @include('layouts.forums')
</div>

<div class="row">
    @include('layouts.videos')
</div>

@endsection
@section('js')
	<script src="/js/marketings.js"></script>
	<script src="/js/imgtab.js"></script>
@stop