@extends('layouts.app')

@section('url') http://kampusmobil.com/{{$brand->slug}} @stop
@section('title') Harga terbaru dan spesifikasi lengkap {{$brand->slug}} terbaru @stop
@section('description')
	Harga dan spesifikasi lengkap {{$brand->brand}} terbaru, 
	@foreach($mobils as $mobil)
		{{$mobil->slug}}
	@endforeach
@stop
@section('image') http://kampusmobil.com/largekampusmobil.png @stop

@section('content')
<div class="row">
<h2 class="text-center"><b>{{$brand->brand}}</b></h2>
<hr>
@if($mobils->count())
	@foreach($mobils as $mobil)
	<div class="col-md-4">
		<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
			<img src="{{$mobil->depan}}" class="img-responsive" alt="{{$mobil->depan}}" id="imgM">
		</a>
		<div class="text-center">
			<h4><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h4>
		</div>
		<hr>
	</div>
	@endforeach
	@else
		<p class="text-center">Belum ada profil</p>
	@endif
</div>
<div class="row"><div class="text-center">{{$mobils->links()}}</div></div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body" id="show">
	    	@include('layouts.marketings')
	    </div>
	  </div>
	</div>
</div>
@endsection
@section('js')
	<script src="/js/marketings.js"></script>
@stop