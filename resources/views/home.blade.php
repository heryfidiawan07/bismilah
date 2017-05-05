@extends('layouts.app')

@section('url') http://kampusmobil.com/ @stop
@section('title') Mengulas berita mobil, spesifikasi, harga mobil dan bisa langsung menghubungi marketing terdekat. @stop
@section('description')
	Berita mobil, Spesifikasi mobil, Profil mobil, Marketing mobil, Forum diskusi, Harga Promo dan discount terbaru.
@stop
@section('image') http://kampusmobil.com/largekampusmobil.png @stop

@section('content')

@include('showBrand.mobils')

<div class="row">
    <h4 class="text-center"><b>Berita</b></h4><hr>
    @include('layouts.articles')
</div>

<div class="row">
    <h4 class="text-center"><b>Forum</b></h4><hr>
    @include('layouts.forums')
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
@section('js')<script src="/js/sales.js"></script>@stop
