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
	<div class="col-md-10">

		<div class="panel panel-default">
			<div class="panel-body" id="show">
				<h4 class="text-center"><b>Marketing Executive</b></h4>
				<hr>
				<div class="col-md-5">
					<img src="{{asset('/marketingImg/'.$sales->img )}}" class="img-responsive text-center" alt="{{$sales->brand->slug}}">
				</div>
				<div class="col-md-7">
					<h4 class="animated bounceInDown"><b>{{$sales->name}}</b></h4>
					<p class="animated bounceInDown">{{$sales->pt}}</p>
					<p class="animated bounceInDown">{{$sales->alamat}}</p>
					<p class="animated bounceInDown">{!!nl2br($sales->tentang)!!}</p>
					<p class="animated bounceInDown">
						<p><b><u>Chat via whatsapp :</u></b></p>
						<a href="<?php if(count($sales->link)) {echo $sales->link->link;} ?>" class="btn btn-success fa fa-whatsapp"> 0{{$sales->hp2}}</a>
						<p><b><u>Telp / Sms :</u></b></p>
						<a href="tel://+62{{$sales->hp1}}" class="btn btn-primary fa fa-phone"> 0{{$sales->hp1}}</a>
					</p>
					<a href="mailto:{{$sales->user->email}}" class="btn btn-danger fa fa-envelope"> {{$sales->user->email}}</a>
					<div class="well">
						<a class="fa fa-map-marker" href="/dealer-resmi-mobil/{{$sales->brand->slug}}/{{$sales->area->slug}}">
							<b> {{$sales->area->area}}</b>
						</a>
					</div>
					<a href="/{{$sales->brand->slug}}" class="thumbnail text-center animated bounceInDown"><b>{{$sales->brand->brand}}</b></a>
				</div>
			</div>
		</div>

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
		
	</div>
</div>

@endsection