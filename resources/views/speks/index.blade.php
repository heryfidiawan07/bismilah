@extends('layouts.app')

@section('url') http://kampusmobil.com/spesifikasi @stop
@section('title') Cari tau spesifikasi mobil anda disini, Forum diskusi mobil atau cari marketing mobil di daerah anda @stop
@section('description')
	Berita mobil terbaru, Forum diskusi mobil, Spesifikasi mobil atau mau tukar tambah mobil bekas anda, ada marketingnya juga loo !!
@stop
@section('image') http://kampusmobil.com/largekampusmobil.png @stop

@section('content')
<div class="row">
	<h4 class="text-center"><b>Spesifikasi</b>
		@if(Auth::check())
      @if(Auth::user()->admin())
				<a href="/admin/spesifikasi/create" class="btn btn-sm btn-success pull-right">Admin create</a>
			@endif
	  @endif
	<hr>
	</h4>
	@include('layouts.speks')
</div>
<div class="row"><div class="text-center">{{$speks->links()}}</div></div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body" id="show">
	    	@include('layouts.sales')
	    </div>
	  </div>
	</div>
</div>
@endsection
@section('js')<script src="/js/sales.js"></script>@stop
