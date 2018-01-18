@extends('layouts.app')

@section('url') http://kampusmobil.com/marketing/{{$sales->slug}} @stop
@section('title') Dealer Resmi Mobil {{$sales->brand->brand}} {{$sales->area->area}} @stop
@section('description')
	Harga terbaru, Paket kredit, Prace list, Promo dan discount {{$sales->brand->brand}} terbaru {{$sales->pt}} {{$sales->alamat}} {{$sales->tentang}}
@stop
@section('image') http://kampusmobil.com/marketingImg/{{$sales->img}} @stop
@section('event')
	<script>
		fbq('track', 'InitiateCheckout');
	</script>
@stop
@section('content')
<div class="row">
	<div class="col-md-9">

		@include('layouts.ShowSales')

		<div class="panel panel-default">
			<div class="panel-body" id="show">@include('layouts.marketingshare')</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body" id="show">
				@foreach($mobils as $mobil)
					<div class="col-md-4 mainMobil">
						<div class="indexMobil">
							<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
								<img src="{{$mobil->depan}}" class="img-responsive" alt="{{$mobil->slug}}" id="imgM">
							</a>
						</div>
						<div class="titleMobil text-center">
							<h4><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h4>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		
	</div>
</div>

<div class="row">
	@include('layouts.articles')
</div>

<div class="row">
    @include('layouts.speks')
</div>

<div class="row">
    @include('layouts.videos')
</div>

<div class="row">
    @include('layouts.forums')
</div>

@endsection