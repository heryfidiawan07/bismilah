@extends('layouts.app')

@section('url') http://kampusmobil.com/forum @stop
@section('title') Bahas semua tentang mobil di forum diskusi mobil atau cari marketing mobil di daerah anda @stop
@section('description')
	Berita mobil terbaru, Forum diskusi mobil, Spesifikasi mobil atau mau tukar tambah mobil bekas anda ?
@stop
@section('image') http://kampusmobil.com/largekampusmobil.png @stop

@section('content')
@include('layouts.forumkategori')
<div class="row">
		@if(Auth::user())
			<a href="/forum/create" class="btn btn-sm btn-success pull-right">Tulis !</a>
		@endif
	</h4>
	<br>
		@if(!Auth::user())
			<div class="alert alert-warning"><a href="/login"> login </a>sebelum dapat bertanya di forum</div>
		@endif
	@include('layouts.forums')
</div>

<div class="row">
	<div class="col-md-12">
		<div class="text-center"><small>{{$threads->links()}}</small></div>
	</div>
</div>

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
