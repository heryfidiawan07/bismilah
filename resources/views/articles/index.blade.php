@extends('layouts.app')

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