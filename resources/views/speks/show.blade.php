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
	          <a href="/admin/spesifikasi/{{$spek->id}}/edit" class="btn btn-sm btn-warning">edit</a>
	        @endif
	      @endif
				<small>{{$spek->created_at->diffForHumans()}}</small>
			</p>
		</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body" id="show">@include('layouts.spekshare')</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body" id="show">@include('layouts.marketings')</div>
		</div>
	
		<div class="row">
			<h4 class="text-center"><b>Berita</b></h4><hr>
			@include('layouts.articles')
		</div>

		<div class="row">
		    <h4 class="text-center"><b>Forum</b></h4><hr>
		    @include('layouts.forums')
		</div>

		<div class="row">
		    <h4 class="text-center"><b>Video Review</b></h4><hr>
		    @include('layouts.videos')
		</div>

	</div>
</div>
@endsection
@section('js')
	<script src="/js/marketings.js"></script>
	<script src="/js/imgtab.js"></script>
@stop