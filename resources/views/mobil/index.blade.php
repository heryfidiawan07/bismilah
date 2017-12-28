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
	<div class="col-md-10">
		
		<h2 class="text-center"><b>{{$brand->brand}}</b></h2>
		<hr>
		@if($mobils->count())
			@foreach($mobils as $mobil)
			<div class="col-md-4">
				<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
					<img src="{{$mobil->depan}}" class="img-responsive" alt="{{$mobil->slug}}" id="imgM">
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
		
		<div class="row"><div class="text-center">{{$mobils->links()}}</div></div>
		
	</div>
</div>

<div class="row">
	<div class="col-md-10">

			<div class="panel panel-default">
				<div class="panel-body" id="show">
					<div class="social-buttons">
						<b>Share : </b>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http://kampusmobil.com/{{$brand->slug}}" target="_blank" class="fa fa-facebook"></a>
						<a href="https://twitter.com/intent/tweet?url=http://kampusmobil.com/{{$brand->slug}}" target="_blank" class="fa fa-twitter"></a>
						<a href="https://plus.google.com/share?url=http://kampusmobil.com/{{$brand->slug}}" target="_blank" class="fa fa-google"></a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body" id="show">
				    	@include('layouts.marketings')
				    </div>
				  </div>
				</div>
			</div>

			<div class="row">
				<h4 class="text-center"><b>Video Review</b></h4><hr>
				@include('layouts.videos')
			</div>

			<div class="row">
				<h4 class="text-center"><b>Berita</b></h4><hr>
				@include('layouts.articles')
			</div>

			<div class="row">
			    <h4 class="text-center"><b>Spesifikasi</b></h4><hr>
			    @include('layouts.speks')
			</div>

			<div class="row">
			    <h4 class="text-center"><b>Forum</b></h4><hr>
			    @include('layouts.forums')
			</div>

	</div>
</div>

@endsection
@section('js')
	<script src="/js/marketings.js"></script>
@stop