<h4 class="tab"><b>Forum</b></h4>
<div class="container contFor">
	@if($threads->count())
		@foreach($threads as $thread)
			<div class="col-md-3 col-sm-4 main">
				<div class="indexforum">
					<a href="/forum/{{$thread->brand->slug}}/{{$thread->slug}}"><b>{{ str_limit($thread->title, $limit = 70, $end = '...') }}</b></a>
				</div>
				<div class="thumb">
					<small class="pull-right"><a href="/forum/{{$thread->brand->slug}}/{{$thread->slug}}">{{$thread->jmlCom()}} komentar</a></small>
				</div>
				<div class="thumb">
					<a href="/forum/{{$thread->brand->slug}}" class="thumbnail text-center"><b>{{$thread->brand->brand}}</b></a>
				</div>
				<div class="index2">
				<div class="media">
					<div class="pull-left">
						<img src="<?php if (file_exists(public_path("member/".$thread->user->img))) echo '/member/' ?>{{$thread->user->avatar()}}" class="img-circle">
					</div>
					<p class="pull-left" style="margin-top: 10px;">
						<a href="/member/{{$thread->user->slug}}">{{$thread->user->name}}</a> - <small>{{$thread->created_at->diffForHumans()}}</small>
					</p>
				</div>
				</div>
			</div>
		@endforeach
	@else
		<p class="text-center">Belum ada diskusi</p>
	@endif
</div>