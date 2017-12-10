@extends('layouts.app')

@section('content')
<div class="row">
	<h4 class="text-center"><b>Marketing CheckOut</b></h4>
	<hr>
	@if($bayar->count())
		@foreach($bayar as $byr)
			<div class="col-md-6">
				<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-sm-5">
						<a href="/admin/pembayaran/{{$byr->id}}/show">
							<img src="{{asset('/resi/'.$byr->img)}}" class="img-responsive" alt="{{$byr->img}}" id="imgH">
						</a>
					</div>
					<div class="col-sm-7">
						<a href="/admin/pembayaran/{{$byr->id}}/show" class="pull-left"><h5>{{$byr->marketing->name}}</h5></a>
		      </div>
			  </div>
				</div>
			</div>
		@endforeach
	@else
		<p>Belum ada yang bayar BOSS</p>
	@endif
</div>
<div class="row"><div class="text-center">{{$bayar->links()}}</div></div>
@endsection