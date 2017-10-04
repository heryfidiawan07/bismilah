@extends('layouts.app')

@section('url') http://kampusmobil.com/profil/{{$mobil->brand->slug}}/{{$mobil->slug}} @stop
@section('title') Harga dan spesifikasi lengkap {{$mobil->brand->brand}} {{$mobil->model}} terbaru @stop
@section('description')
	Prace list, Harga dan spesifikasi lengkap {{$mobil->brand->slug}} {{$mobil->slug}} terbaru
	@foreach($types as $type)
		{{$type->tipe}} {{$type->harga}} {{$type->transmisi}}
	@endforeach
@stop
@section('image') http://kampusmobil.com/{{$mobil->depan}} @stop

@section('content')
<div class="row">
	<h3 class="text-center animated flipInX"><b>{{$mobil->brand->brand}} {{$mobil->model}}</b></h3>
	<hr>
	<div class="col-md-12">
		<div id="myCarousel" class="carousel slide pull-left" data-ride="carousel" style="margin-bottom: 10px;">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="{{$mobil->depan}}" class="img-responsive" alt="{{$mobil->model}}" id="mobil">
		    </div>
		    <div class="item">
		      <img src="{{$mobil->samping}}" class="img-responsive" alt="{{$mobil->model}}" id="mobil">
		    </div>
		    <div class="item">
		      <img src="{{$mobil->belakang}}" class="img-responsive" alt="{{$mobil->model}}" id="mobil">
		    </div>
		  </div>
		</div>
	</div>
	<div class="col-md-12">
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
		<br>
		<div class="panel panel-default">
			<div class="panel-body" id="show">
				<div class="social-buttons">
					<b>Share : </b>
					<a href="https://www.facebook.com/sharer/sharer.php?u=http://kampusmobil.com/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}" target="_blank" class="fa fa-facebook"></a>
					<a href="https://twitter.com/intent/tweet?url=http://kampusmobil.com/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}" target="_blank" class="fa fa-twitter"></a>
					<a href="https://plus.google.com/share?url=http://kampusmobil.com/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}" target="_blank" class="fa fa-google"></a>
				</div>
			</div>
		</div>
		<div class="text-center"><a href="/spesifikasi/{{$mobil->slug}}" class="btn btn-success">Lihat spesifikasi</a></div>
		<br>
		<div class="text-center"><a href="/videos/{{$mobil->slug}}" class="btn btn-danger">Lihat video review</a></div>
	</div>
</div>
@include('layouts.marketings')
@endsection
@section('js')
	<script src="/js/marketings.js"></script>
@stop