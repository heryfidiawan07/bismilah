@extends('layouts.app')

@section('content')
<div class="row">
@if($mobils->count())
	@foreach($mobils as $mobil)
	<div class="col-md-6">
		<h4 class="text-center">{{$brand->brand}}</h4>
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-sm-6">
				<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
					<img src="{{$mobil->depan}}" class="img-responsive pull-left" alt="{{$mobil->depan}}" id="imgH">
				</a>
			</div>
			<div class="col-sm-6">
				<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
					<h4>{{$mobil->model}} <small>{{$mobil->tipe}}</small></h4>
				</a>
				<a href="/{{$mobil->brand->slug}}" class="thumbnail text-center"><b>{{$mobil->brand->brand}}</b></a>
			</div>
		</div>
		</div>
	</div>
	@endforeach
	@else
		<p class="text-center">Belum ada profil</p>
	@endif
</div>
<div class="row"><div class="text-center">{{$mobils->links()}}</div></div>
@endsection