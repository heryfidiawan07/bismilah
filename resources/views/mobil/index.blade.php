@extends('layouts.app')

@section('content')
<div class="row">
<h2 class="text-center"><b>{{$brand->brand}}</b></h2>
@if($mobils->count())
	@foreach($mobils as $mobil)
	<div class="col-md-4">
	<div class="text-center">
		<h3><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h3>
	</div>
		<hr>
			<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}">
				<img src="{{$mobil->depan}}" class="img-responsive pull-left" alt="{{$mobil->depan}}" id="imgH">
			</a>
	</div>
	@endforeach
	@else
		<p class="text-center">Belum ada profil</p>
	@endif
</div>
<div class="row"><div class="text-center">{{$mobils->links()}}</div></div>
@endsection