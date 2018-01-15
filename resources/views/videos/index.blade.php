@extends('layouts.app')

@section('title') Video review mobil 
	@foreach($videos as $video)
		{{$video->mobil->slug}}
	@endforeach.
@stop
@section('description')
	Video review mobil terbaru, Forum diskusi mobil, Spesifikasi mobil atau mau minta penawaran discount
	@foreach($videos as $video)
		{{$video->mobil->slug}}
	@endforeach
@stop
@section('image') http://kampusmobil.com/videoicon.png @stop

@section('content')

<div class="row">
		@include('showBrand.videosBrand')
		@if(Auth::check())
      @if(Auth::user()->admin())
				<a href="/admin/video/create" class="btn btn-sm btn-success pull-right">Admin create</a>
			@endif
	  @endif
		@if(!Auth::user())
			<hr>
			<div class="alert alert-warning"><a href="/login"> login </a>untuk berkomentar di video.</div>
		@endif
</div>

<div class="row">@include('layouts.videos')</div>

<div class="row">
	<div class="col-md-12">
		<div class="text-center"><small>{{$videos->links()}}</small></div>		
	</div>
</div>

<div class="row">
	@include('layouts.sales')
</div>

<div class="row">
    @include('layouts.forums')
</div>

<div class="row">
    @include('layouts.articles')
</div>

<div class="row">
    @include('layouts.speks')
</div>

@endsection
@section('js')<script src="/js/sales.js"></script>@stop
