@extends('layouts.app')

@section('url') http://kampusmobil.com/articles @stop
@section('title') Info mobil diskusi mobil atau cari marketing mobil di daerah anda @stop
@section('description')
	Berita mobil terbaru, Forum diskusi mobil, Spesifikasi mobil atau mau tukar tambah mobil 
	@foreach($articles as $article)
		{{$article->brand->brand}}
	@endforeach
	bekas anda ?
@stop
@section('image') http://kampusmobil.com/largekampusmobil.png @stop

@section('content')
<div class="row">
	<h4 class="text-center"><b>Article</b>
		@if(Auth::check())
      @if(Auth::user()->admin())
				<a href="/admin/article/create" class="btn btn-sm btn-success pull-right">Admin create</a>
			@endif
	  @endif
		<hr>
	</h4>
	@include('layouts.articles')
</div>
<div class="row"><div class="text-center">{{$articles->links()}}</div></div>
@endsection