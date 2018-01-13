@extends('layouts.app')

@section('title') Spesifikasi lengkap mobil 
	@foreach($speks as $spek)
		{{$spek->mobil->slug}}
	@endforeach.
@stop
@section('description')
	Spesifikasi lengkap mobil @foreach($speks as $spek) {{$spek->mobil->slug}} @endforeach , Forum diskusi dan marketing mobil.
@stop
@section('image') https://lh3.googleusercontent.com/-WL0ZJvL2woo/WQBwHGJsPdI/AAAAAAAAAkg/sehLYuEPH5MnOCIo06PD-mx6V2xLa8SQwCHM/s200/%255BUNSET%255D @stop

@section('content')
<div class="row">
		@if(Auth::check())
      @if(Auth::user()->admin())
				<a href="/admin/spesifikasi/create" class="btn btn-sm btn-success pull-right">Admin create</a>
			@endif
	  @endif
	  @include('layouts.filterspek')
	@include('layouts.speks')
</div>

<div class="row">
	<div class="col-md-12">
		<div class="text-center"><small>{{$speks->links()}}</small></div>
	</div>
</div>

<div class="row">
	@include('layouts.sales')
</div>

<div class="row">
	@include('layouts.articles')
</div>

<div class="row">
    @include('layouts.forums')
</div>

<div class="row">
    @include('layouts.videos')
</div>

@endsection
@section('js')<script src="/js/sales.js"></script>@stop
