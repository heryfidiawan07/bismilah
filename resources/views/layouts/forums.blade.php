@if($threads->count())
	@foreach($threads as $thread)
	<div class="col-md-4">
		<div class="panel panel-default index">
			<div class="panel-body">
				<a href="/forum/{{$thread->brand->slug}}/{{$thread->slug}}"><h5>{{$thread->title}}</h5></a>
				<br>
					<a href="/forum/{{$thread->brand->slug}}" class="thumbnail text-center pull-left"><b>{{$thread->brand->brand}}</b></a>
					<a href="/forum/{{$thread->brand->slug}}/{{$thread->slug}}"><small class="pull-right">{{$thread->jmlCom()}} komentar</small></a>
			</div>
				<img src="{{$thread->user->avatar()}}" class="img-circle pull-left" style="margin-left: 3px; margin-right: 3px;">
				<p style="margin-top: 10px;">
					<a href="/member/{{$thread->user->slug}}">{{$thread->user->name}}</a> - <small>{{$thread->created_at->diffForHumans()}}</small>
				</p>
		</div>
	</div>
	@endforeach
@else
	<p class="text-center">Belum ada diskusi</p>
@endif