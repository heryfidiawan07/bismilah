@extends('layouts.app')

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
@endsection