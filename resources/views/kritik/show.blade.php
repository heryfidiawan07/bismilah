@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default">
		<div class="panel-body" id="show">
			<h4 class="text-center"><b>{{$kritik->title}}</b></h4>
			<hr>
			{!!nl2br($kritik->body)!!}
			<hr>
			<p class="pull-right">
				{{$kritik->email}} - <small>{{$kritik->created_at->diffForHumans()}}</small>
				<a class="btn btn-danger" href="/admin/kritik-delete/{{$kritik->id}}">delete</a>
			</p>
		</div>
		</div>
	</div>
</div>
@endsection
