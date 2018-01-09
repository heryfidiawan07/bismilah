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
				<table class="table table-hover">
					<tr>
						<td>
							<img src="{{asset('/marketingImg/'.$sales->img )}}" class="img-thumbnail pull-left" alt="{{$sales->brand->slug}}" width="350" height="350" style="margin-right: 15px;">
							<div class="pull-left">
								<h4 class="animated bounceInDown"><b>{{$sales->name}}</b></h4>
								<p class="animated bounceInDown">{{$sales->pt}}</p>
								<p class="animated bounceInDown">{{$sales->alamat}}</p>
								<p class="animated bounceInDown">{!!nl2br($sales->tentang)!!}</p>
								<p>Info lebih lanjut hubungi kontak di bawah :</p>
								<p class="animated bounceInDown">
									<a href="tel://+62{{$sales->hp1}}" class="btn btn-primary fa fa-phone"> 0{{$sales->hp1}}</a>
									<a href="https://api.whatsapp.com/send?phone=62{{$sales->hp2}}&text={{$sales->name}}" class="btn btn-success fa fa-whatsapp"> 0{{$sales->hp2}}</a>
								</p>
								<a href="mailto:{{$sales->user->email}}" class="btn btn-danger fa fa-envelope"> {{$sales->user->email}}</a>
								<p class="well animated bounceInDown">{{$sales->area->area}}</p>
								<a href="/{{$sales->brand->slug}}" class="thumbnail text-center animated bounceInDown"><b>{{$sales->brand->brand}}</b></a>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body" id="show">@include('layouts.marketingshare')</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body" id="show">
				@foreach($mobils as $mobil)
					<div class="col-sm-4">
						<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
							<img src="{{$mobil->depan}}" class="img-responsive" alt="{{$mobil->model}}" style="width: 150px; height: 100px;">
						</a>
						<div class="text-center">
							<p><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>Harga {{$mobil->model}}</b></a></p>
						</div>
						<hr>
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