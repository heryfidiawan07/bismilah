@extends('layouts.app')

@section('url') http://kampusmobil.com/{{$brand->slug}} @stop
@section('title') Harga terbaru dan spesifikasi lengkap {{$brand->slug}} terbaru @stop
@section('description')
	Harga dan spesifikasi lengkap {{$brand->brand}} terbaru, 
	@foreach($mobils as $mobil)
		{{$mobil->slug}}
	@endforeach
@stop
@section('image') http://kampusmobil.com/brands/{{$brand->slug}}.png @stop

@section('content')
<div class="row">
	<div class="col-md-9">
		
		<h2 class="text-center"><b>{{$brand->brand}}</b></h2>
		<hr>
		@if($mobils->count())
			@foreach($mobils as $mobil)
			<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
				<div class="col-md-4 mainMobil">
					<div class="indexMobil">
						<img src="{{$mobil->depan}}" class="img-responsive" alt="{{$mobil->slug}}" id="imgM">
					</div>
					<div class="titleMobil text-center">
						<h4><b>{{$mobil->model}}</b></h4>
					</div>
				</div>
			</a>
			@endforeach
		@else
			<p class="text-center">Belum ada profil</p>
		@endif

		<div class="row"><div class="text-center">{{$mobils->links()}}</div></div>

		<div class="row">@include('layouts.marketings')</div>

	</div>
</div>

<div class="row">
	@include('layouts.videos')
</div>

<div class="row">
	@include('layouts.articles')
</div>

<div class="row">
  @include('layouts.speks')
</div>

<div class="row">
  @include('layouts.forums')
</div>

@endsection
@section('js')
	<script src="/js/marketings.js"></script>
@stop