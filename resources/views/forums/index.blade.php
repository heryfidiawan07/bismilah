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
		@if(!Auth::user())
			<hr>
			<div class="alert alert-warning"><a href="/login"> login </a>sebelum dapat bertanya di forum</div>
		@endif
</div>

<div class="col-md-12">
	@include('layouts.forums')
</div>

<div class="row">
	<div class="col-md-12">
		<div class="text-center"><small>{{$threads->links()}}</small></div>
	</div>
</div>

<div class="col-md-12">
	@include('layouts.sales')
</div>

<div class="col-md-12">
	@include('layouts.articles')
</div>

<div class="col-md-12">
    @include('layouts.speks')
</div>

<div class="col-md-12">
    @include('layouts.videos')
</div>

@endsection
@section('js')<script src="/js/sales.js"></script>@stop
