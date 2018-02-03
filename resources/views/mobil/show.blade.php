@extends('layouts.app')

@section('url') http://kampusmobil.com/profil/{{$mobil->brand->slug}}/{{$mobil->slug}} @stop
@section('title') Harga dan spesifikasi lengkap {{$mobil->brand->brand}} {{$mobil->model}} terbaru @stop
@section('description')
	Prace list, Harga dan spesifikasi lengkap {{$mobil->brand->slug}} {{$mobil->slug}} terbaru
	@foreach($types as $type)
		{{$type->tipe}} {{$type->harga}} {{$type->transmisi}}
	@endforeach
@stop
@section('image') http://kampusmobil.com/model/{{$mobil->depan}} @stop
@section('css')
	<link rel="stylesheet" type="text/css" href="/css/mobilslide.css">
@stop

@section('content')
<div class="row">
	<div class="col-md-10">

		<div class="row">
			<h3 class="text-center animated flipInX"><b>{{$mobil->brand->brand}} {{$mobil->model}}</b>
		    @if(Auth::check())
		      @if(Auth::user()->admin())
		        <a href="/admin/mobil/{{$mobil->id}}/edit" class="btn btn-success btn-sm pull-right">Edit</a>
		      @endif
		    @endif
	    </h3>
		</div>

		<div class="row">
			@include('layouts.mobilslide')
		</div>

		<br>
		<div class="row">
			<table class="table" id="profil">
				<tr class="tipe">
					<th>Tipe</th><th>Harga</th>
				</tr>
				@foreach($types as $type)
					<tr>
						<td><p id="tbl" class="animated bounceInRight">{{$type->tipe}}</p></td>
						<td><p id="tbl" class="animated bounceInRight">Rp {{$type->harga}}</p></td>
					</tr>
				@endforeach
			</table>
			<div class="text-center"><i>OTR Jakarta, Harga dapat berubah sewaktu-waktu.<br> Untuk informasi lebih lanjut hubungi marketing terdekat.</i></div>
		</div>
		
		<br>
			
		<div class="row">
			@include('layouts.mobilshare')
		</div>
		
		<div class="row">
			@include('layouts.marketings')
		</div>

	</div>
</div>

<div class="row">
	@include('layouts.videos')
</div>

<div class="row">
    @include('layouts.speks')
</div>

<div class="row">
    @include('layouts.forums')
</div>

<div class="row">
	@include('layouts.articles')
</div>

@endsection
@section('js')
	<script src="/js/mobilslide.js"></script>
	<script src="/js/marketings.js"></script>
@stop