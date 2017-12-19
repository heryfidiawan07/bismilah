@extends('layouts.app')

@section('title') Video review seputar mobil dari brand-brand terkenal di Indonesia. @stop
@section('description')
	Video review mobil terbaru, Forum diskusi mobil, Spesifikasi mobil atau mau minta penawaran discount
	@foreach($videos as $video)
		{{$video->mobil->slug}}
	@endforeach
@stop
@section('image') https://seeklogo.com/images/Y/youtube-logo-FF3BEE4378-seeklogo.com.png @stop

@section('content')

<br><br>
<div class="row">
		@include('showBrand.videosBrand')
		@if(Auth::check())
      @if(Auth::user()->admin())
				<a href="/admin/video/create" class="btn btn-sm btn-success pull-right">Admin create</a>
				<br><hr>
			@endif
	  @endif
	@include('layouts.videos')
</div>

<div class="row">
	<div class="col-md-12">
		<div class="text-center"><small>{{$videos->links()}}</small></div>		
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
    <h4 class="text-center"><b>Forum</b></h4><hr>
    @include('layouts.forums')
</div>

<div class="row">
    <h4 class="text-center"><b>Berita</b></h4><hr>
    @include('layouts.articles')
</div>

<div class="row">
    <h4 class="text-center"><b>Spesifikasi</b></h4><hr>
    @include('layouts.speks')
</div>

@endsection
@section('js')<script src="/js/sales.js"></script>@stop
