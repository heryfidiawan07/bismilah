@extends('layouts.app')

@section('url') http://kampusmobil.com/marketing/{{$sales->slug}} @stop
@section('title') {{$sales->name}} {{$sales->pt}} @stop
@section('description')
	{{$sales->brand->brand}} {{$sales->alamat}} {{$sales->tentang}} {{$sales->area->area}}
@stop
@section('image') http://kampusmobil.com/marketingImg/{{$sales->img}} @stop

@section('content')
<div class="row">
	<div class="col-md-10">
		<h4 class="text-center"><b>Marketing</b></h4>
		@include('layouts.flash')
		<table class="table table-hover">
			<tr>
				<td>
					<a href="{{$sales->img}}">
						<img src="{{asset('/marketingImg/'.$sales->img )}}" class="img-thumbnail pull-left" width="350" height="350" style="margin-right: 15px;">
					</a>
					<div class="pull-left">
						<h4 class="animated bounceInDown"><b>{{$sales->name}}</b></h4>
						<p class="animated bounceInDown">{{$sales->pt}}</p>
						<p class="animated bounceInDown">{{$sales->alamat}}</p>
						<p class="animated bounceInDown">
							<a href="tel://+62{{$sales->hp1}}" class="btn btn-primary fa fa-phone"> 0{{$sales->hp1}}</a>
							<a href="tel://+62{{$sales->hp2}}" class="btn btn-success fa fa-whatsapp"> 0{{$sales->hp2}}</a>
						</p>
						<p class="animated bounceInDown">{!!nl2br($sales->tentang)!!}</p>
						<p class="animated bounceInDown">{{$sales->area->area}}</p>
						<a href="/{{$sales->brand->slug}}" class="thumbnail text-center animated bounceInDown"><b>{{$sales->brand->brand}}</b></a>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
@endsection