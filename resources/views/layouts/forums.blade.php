@if($threads->count())
	@foreach($threads as $thread)
	<div class="col-md-4">
		<div class="panel panel-default">
		<div class="panel-body">
			<a href="/forum/{{$thread->brand->slug}}/{{$thread->slug}}"><h5>{{$thread->title}}</h5></a>
			<a href="/{{$thread->brand->slug}}" class="thumbnail text-center"><b>{{$thread->brand->brand}}</b></a>
			<a href="/forum/{{$thread->brand->slug}}/{{$thread->slug}}"><small class="pull-right">{{$thread->jmlCom()}} komentar</small></a>
		</div>
		</div>
	</div>
	@endforeach
@else
	<p class="text-center">Belum ada diskusi</p>
@endif