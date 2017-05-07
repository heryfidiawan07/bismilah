@extends('layouts.app')

@section('title') Spesifikasi lengkap mobil dari brand-brand terkenal di Indonesia. @stop
@section('description')
	Spesifikasi lengkap mobil @foreach($speks as $spek) {{$spek->mobil->slug}} @endforeach , Forum diskusi dan marketing mobil.
@stop
@section('image') https://lh3.googleusercontent.com/-WL0ZJvL2woo/WQBwHGJsPdI/AAAAAAAAAkg/sehLYuEPH5MnOCIo06PD-mx6V2xLa8SQwCHM/s200/%255BUNSET%255D @stop

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
