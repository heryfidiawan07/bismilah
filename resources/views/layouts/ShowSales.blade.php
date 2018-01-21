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
				<p><b><u>Chatt via whatsapp</u> :</b></p>
				<a href="<?php if(count($sales->link)) {echo $sales->link->link;} ?>" class="btn btn-success fa fa-whatsapp"> 0{{$sales->hp2}}</a>
				<p><b><u>Telp / SMS</u> :</b></p>
				<a href="tel://+62{{$sales->hp1}}" class="btn btn-primary fa fa-phone"> 0{{$sales->hp1}}</a>
			</p>
			<a href="mailto:{{$sales->user->email}}" class="btn btn-danger fa fa-envelope"> {{$sales->user->email}}</a>
			<div class="well">
				<a class="fa fa-map-marker" href="/dealer/{{$sales->brand->slug}}/{{$sales->area->slug}}">
					<b> {{$sales->area->area}}</b>
				</a>
			</div>
			<a href="/{{$sales->brand->slug}}" class="thumbnail text-center animated bounceInDown"><b>{{$sales->brand->brand}}</b></a>
		</div>
	</div>
</div>