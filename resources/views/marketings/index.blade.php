@extends('layouts.app')

@section('url') http://kampusmobil.com/dealer/{{$brand->slug}}/{{$area->slug}} @stop

@if($sales)
	
	@section('title') Dealer Resmi Mobil {{$brand->brand}} {{$area->area}} @stop

	@section('description')
		Harga terbaru, Paket kredit, Prace list, Promo dan discount {{$brand->slug}} terbaru {{$sales->pt}} {{$sales->alamat}} {{$sales->tentang}} 
	@stop

	@section('image') http://kampusmobil.com/marketingImg/{{$sales->img}} @stop

@else

	@section('title') Yuk daftar jadi marketing mobil {{$brand->slug}} {{$area->slug}} @stop

	@section('description')
		Dapatkan customer kamu sekarang juga, ada fitur advertisingnya juga loh ! Sekarang kamu bisa kebanjiran call in customer.
	@stop
	
	@section('image') https://lh3.googleusercontent.com/-fA4GNmqpiLo/WQBwGMc_1nI/AAAAAAAAAkQ/p2pkw2WDaJUj4pJciG3_2AeC1LW3gFNswCHM/s200/%255BUNSET%255D @stop

@endif

@section('event')
	<script>
		fbq('track', 'InitiateCheckout');
	</script>
@stop
@section('content')
<div class="row">
	<div class="col-md-9">
	
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingOne">
		      <h4 class="panel-title">
		        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		          Kontak
		        </a>
		      </h4>
		    </div>
		    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body text-center" style="height: 500px;">
		      	<a href="<?php if($sales){ if(count($sales->link)) {echo $sales->link->link;}}else{echo "#";} ?>" class="btn btn-success fa fa-whatsapp" style="height: 50px; line-height: 40px;"><b> WHATSAPP @if($sales)0{{$sales->hp2}}@else Kosong @endif</b></a>
		      	<a href="<?php if($sales){ echo "tel://+62$sales->hp1"; }else{echo "#";} ?>" class="btn btn-primary fa fa-phone" style="height: 50px; line-height: 40px;"><b> TELP / SMS @if($sales)0{{$sales->hp1}}@else Tersedia @endif</b></a>
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingTwo">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          Marketing Executive
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body">
		        <div class="col-md-5">
		      		<img src="<?php if($sales) { echo "/marketingImg/".$sales->img; }else {echo "/partials/".$brand->slug;} ?>.png" class="img-responsive text-center" alt="">
		      	</div>
		      	<div class="col-md-7">
		      		<table>
		      			<tr>
		      				<td><b><u>Chatt via whatsapp</u> :</b></td>
		      				<td><a href="<?php if($sales){ echo $sales->link->link;} ?>" class="btn btn-success fa fa-whatsapp"> @if($sales)0{{$sales->hp2}}@else - @endif</a></td>
		      			</tr>
		      			<tr>
		      				<td><b><u>Telp / SMS</u> :</b></td>
		      				<td><a href="<?php if($sales){echo 'tel://+62'.$sales->hp1;} ?>" class="btn btn-primary fa fa-phone">  @if($sales)0{{$sales->hp1}}@else - @endif</a></td>
		      			</tr>
		      		</table>
						</div>
		      </div>
		    </div>
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
					<div class="col-md-4 mainMobil">
						<div class="indexMobil">
							<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
								<img src="/model/{{$mobil->depan}}" class="img-responsive" alt="{{$mobil->slug}}">
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
@section('js')
<script type="text/javascript">
    $('#kirimPesan').modal('show');
</script>
@stop