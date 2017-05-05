@extends('layouts.app')

@section('url') http://kampusmobil.com/articles @stop
@section('title') Info mobil diskusi mobil atau cari marketing mobil di daerah anda. @stop
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
		@if(Auth::check())
      @if(Auth::user()->admin())
				<a href="/admin/article/create" class="btn btn-sm btn-success pull-right">Admin create</a>
			@endif
	  @endif
		<hr>
	@include('layouts.articles')
</div>
<div class="row"><div class="text-center">{{$articles->links()}}</div></div>
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
