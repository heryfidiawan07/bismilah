@extends('layouts.app')

@section('content')
<div class="row">
	<h3 class="text-center animated flipInX"><b>{{$mobil->brand->brand}} {{$mobil->model}}</b></h3>
	<hr>
	<div class="col-md-6">
		<div id="myCarousel" class="carousel slide pull-left" data-ride="carousel" style="margin-bottom: 50px;">
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
	<div class="col-md-6">
		<table class="table" id="profil">
			<tr>
				<td><p id="tbl">Tipe</p></td><td><p id="tbl" class="animated bounceInRight">{{$mobil->tipe}}</p></td>
			</tr>
			<tr>
				<td><p id="tbl">Harga</p></td><td><p id="tbl" class="animated bounceInRight">RP {{$mobil->harga}}</p></td>
			</tr>
			<tr>
				<td><p id="tbl">Transmisi</p></td><td><p id="tbl" class="animated bounceInRight">{{$mobil->transmisi}}</p></td>
			</tr>
			<tr>
				<td><p id="tbl">CC</p></td><td><p id="tbl" class="animated bounceInRight">{{$mobil->cc}}</p></td>
			</tr>
			<tr>
				<td><p id="tbl">Bahan bakar</p></td><td><p id="tbl" class="animated bounceInRight">{{$mobil->bakar}}</p></td>
			</tr>
		</table>
	</div>
</div>
@include('layouts.marketings')
@endsection
@section('js')
	<script src="/js/marketings.js"></script>
@stop