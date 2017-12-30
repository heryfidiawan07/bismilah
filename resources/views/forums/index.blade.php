@extends('layouts.app')

@section('url') http://kampusmobil.com/forum @stop
@section('title') Forum diskusi mobil atau cari marketing mobil di daerah anda @stop
@section('description')
	Forum diskusi mobil, Berita mobil terbaru, Spesifikasi mobil atau mau tukar tambah mobil bekas anda ?
@stop
@section('image') http://kampusmobil.com/largekampusmobil.png @stop

@section('content')
<div class="row">
		@include('layouts.forumkategori')
		@if(Auth::user())
			<a href="/forum/create" class="btn btn-sm btn-success pull-right">Tulis !</a>
		@endif
	</h4>
	<hr>
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

@endsection
@section('js')<script src="/js/sales.js"></script>@stop
