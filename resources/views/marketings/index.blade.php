@extends('layouts.app')

@section('url') http://kampusmobil.com/dealer-resmi-mobil/{{$brand->slug}}/{{$area->slug}} @stop

@if($sales)
	
	@section('title') Dealer Resmi Mobil {{$brand->brand}} {{$area->area}} @stop

	@section('description')
Harga terbaru, Paket kredit, Prace list, Promo dan discount {{$brand->slug}} terbaru {{$sales->pt}} {{$sales->alamat}} {{$sales->tentang}} 
	@stop

	@section('image') http://kampusmobil.com/marketingImg/{{$sales->img}} @stop

@else

	@section('title') Dealer Resmi Mobil {{$brand->brand}} {{$area->area}} @stop

	@section('description')
Harga terbaru, Paket kredit, Prace list, Promo dan discount {{$brand->slug}} terbaru.
	@stop

	@section('image') http://kampusmobil.com/largekampusmobil.png @stop

@endif

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

						@if($sales)
						<td>
							<img src="{{asset('/marketingImg/'.$sales->img )}}" class="img-thumbnail pull-left" width="350" height="350" style="margin-right: 15px;">
							<div class="pull-left">
								<h4 class="animated bounceInDown"><b>{{$sales->name}}</b></h4>
								<p class="animated bounceInDown">{{$sales->pt}}</p>
								<p class="animated bounceInDown">{{$sales->alamat}}</p>
								<p class="animated bounceInDown">{!!nl2br($sales->tentang)!!}</p>
								<p>Info lebih lanjut hubungi kontak di bawah :</p>
								<p class="animated bounceInDown">
									<a href="tel://+62{{$sales->hp1}}" class="btn btn-primary fa fa-phone"> 0{{$sales->hp1}}</a>
									<a href="https://api.whatsapp.com/send?phone=62{{$sales->hp2}}&text=Kampus%20Mobil%20Marketing%20{{$sales->brand->brand}}" class="btn btn-success fa fa-whatsapp"> 0{{$sales->hp2}}</a>
								</p>
								<a href="mailto:{{$sales->user->email}}" class="btn btn-danger fa fa-envelope"> {{$sales->user->email}}</a>
								<p class="well animated bounceInDown">{{$sales->area->area}}</p>
								<a href="/{{$sales->brand->slug}}" class="thumbnail text-center animated bounceInDown"><b>{{$sales->brand->brand}}</b></a>
							</div>
						</td>

						@else

						<td>
							<img src="/brands/{{$brand->slug}}.png" class="img-thumbnail pull-left" width="150" height="150" style="margin-right: 250px;">
							<div class="pull-left">
								<h4 class="animated bounceInDown"><b>places available</b></h4>
								<p class="animated bounceInDown">-</p>
								<p class="animated bounceInDown">-</p>
								<p class="animated bounceInDown">-</p>
								<p>Daftar sekarang juga</p>
								<p class="animated bounceInDown">
									<a href="#" class="btn btn-primary fa fa-phone"> 0822 xxxx xxxx</a>
									<a href="#" class="btn btn-success fa fa-whatsapp"> 0822 xxxx xxxx</a>
								</p>
								<a href="mailto:kampusmobil@gmail.com" class="btn btn-danger fa fa-envelope"> Admin</a>
								<p class="well animated bounceInDown">{{$area->area}}</p>
								<a href="/{{$brand->slug}}" class="thumbnail text-center animated bounceInDown"><b>{{$brand->brand}}</b></a>
							</div>
						</td>
						@endif

					</tr>
				</table>
			</div>
		</div>
		
		@if($sales)
			<div class="panel panel-default">
				<div class="panel-body" id="show">@include('layouts.marketingshare')</div>
			</div>
		@endif

		<div class="panel panel-default">
			<div class="panel-body" id="show">
				@foreach($mobils as $mobil)
					<div class="col-sm-4">
						<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
							<img src="{{$mobil->depan}}" class="img-responsive" alt="{{$mobil->depan}}" style="width: 150px; height: 100px;">
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
			<h4 class="text-center"><b>Berita</b></h4><hr>
			@include('layouts.articles')
		</div>

		<div class="row">
		    <h4 class="text-center"><b>Spesifikasi</b></h4><hr>
		    @include('layouts.speks')
		</div>

		<div class="row">
		    <h4 class="text-center"><b>Video Review</b></h4><hr>
		    @include('layouts.videos')
		</div>

		<div class="row">
		    <h4 class="text-center"><b>Forum</b></h4><hr>
		    @include('layouts.forums')
		</div>
		
	</div>
</div>

@endsection