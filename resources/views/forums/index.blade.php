@extends('layouts.app')

@section('content')
@include('layouts.forumkategori')
<div class="row">
	<h4 class="text-center"><b>Forum</b>
		@if(Auth::user())
			<a href="/forum/create" class="btn btn-sm btn-success pull-right">Tulis !</a>
		@endif
	</h4>
		@if(!Auth::user())
			<div class="alert alert-warning"><a href="/login"> login </a>sebelum dapat bertanya di forum</div>
		@endif
	<hr>
	@include('layouts.forums')
</div>
<div class="row"><div class="text-center">{{$threads->links()}}</div></div>
@endsection