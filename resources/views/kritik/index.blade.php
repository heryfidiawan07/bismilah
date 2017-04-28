@extends('layouts.app')

@section('content')
<div class="row">
	<h4 class="text-center"><b>Kritik dan saran</b></h4>
	<hr>
		@if($kritiks->count())
			@foreach($kritiks as $kritik)
			<div class="col-md-6">
				<h4><a href="/admin/kritik-dan-saran/{{str_slug($kritik->title)}}/{{$kritik->id}}">{{$kritik->title}}</a><small> oleh {{$kritik->email}}</small></h4>
				<hr>
			</div>
			@endforeach
		@else
			<p class="text-center">Belum ada kritik</p>
		@endif
</div>
<div class="row"><div class="text-center">{{$kritiks->links()}}</div></div>
@endsection