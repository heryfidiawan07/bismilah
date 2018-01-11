@extends('layouts.app')

@section('url') http://kampusmobil.com/ @stop
@section('title') Berita mobil terbaru, spesifikasi, profil dan forum diskusi seputar mobil. @stop
@section('description')
	Harga mobil terbaru, Marketing terdekat, Spesifikasi lengkap, dan Forum diskusi yang bisa menambah wawasan atau rasa penasaran anda selama ini.
@stop
@section('image') http://kampusmobil.com/largekampusmobil.png @stop
@section('css')
	<link href="/css/sliding.css" rel="stylesheet">
@stop
@section('content')

<div class="row">
	@include('showBrand.mobils')
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

<div class="row">
   @include('layouts.speks')
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body" id="show">
	    	@include('layouts.sales')
	    </div>
	  </div>
	</div>
</div>
@endsection
@section('js')
	<script src="/js/sales.js"></script>
	<script src="/js/sliding.js"></script>
@stop
