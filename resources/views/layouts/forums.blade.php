@if($threads->count())
	@foreach($threads as $thread)
		<div class="col-md-3 col-sm-4">
			<div class="index">
				<a href="/forum/{{$thread->brand->slug}}/{{$thread->slug}}"><h5>{{$thread->title}}</h5></a>
			</div>
			<div class="index2">
				<a href="/forum/{{$thread->brand->slug}}" class="thumbnail text-center pull-left"><b>{{$thread->brand->brand}}</b></a>
				<a href="/forum/{{$thread->brand->slug}}/{{$thread->slug}}"><small class="pull-right">{{$thread->jmlCom()}} komentar</small></a>
				<div class="pull-left">
					<img src="<?php if (file_exists(public_path("member/".$thread->user->img))) echo '/member/' ?>{{$thread->user->avatar()}}" class="img-circle pull-left">
					<p class="pull-left" style="margin-top: 10px; margin-left: 5px;">
						<a href="/member/{{$thread->user->slug}}">{{$thread->user->name}}</a> - <small>{{$thread->created_at->diffForHumans()}}</small>
					</p>
				</div>
			</div>
		</div>
	@endforeach
@else
	<p class="text-center">Belum ada diskusi</p>
@endif