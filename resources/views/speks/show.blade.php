@extends('layouts.app')

@section('url') http://kampusmobil.com/spesifikasi/{{$spek->mobil->slug}}/{{$spek->slug}} @stop
@section('title') {{$spek->title}} @stop
@section('description') {{ str_limit(strip_tags($spek->speks), $limit = 250, $end = '...') }} @stop
@section('image') https://lh3.googleusercontent.com/-WL0ZJvL2woo/WQBwHGJsPdI/AAAAAAAAAkg/sehLYuEPH5MnOCIo06PD-mx6V2xLa8SQwCHM/s200/%255BUNSET%255D @stop

@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default">
		<div class="panel-body" id="show">
			<h4 class="text-center"><b>{{$spek->title}}</b></h4>
			<br>
				{!! $spek->speks !!}
			<hr>
			<p class="pull-left">
				<a href="/{{$spek->mobil->model}}" class="thumbnail text-center"><b>{{$spek->mobil->model}}</b></a>
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
	</div>
</div>
@endsection
@section('js')
	<script src="/js/marketings.js"></script>
	<script src="/js/img.js"></script>
@stop