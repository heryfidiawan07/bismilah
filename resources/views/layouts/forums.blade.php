<h4 class="tab"><b>Forum</b></h4>
<div class="container contFor">
	@if($threads->count())
		@foreach($threads as $thread)
		<a href="/forum/{{$thread->brand->slug}}/{{$thread->slug}}">
			<div class="col-md-3 col-sm-6 main mainForum">
				<div class="indexforum">
					<b>{{ str_limit($thread->title, $limit = 70, $end = '...') }}</b>
				</div>
				<div class="thumb">
					<small class="pull-right">{{$thread->jmlCom()}} komentar</small>
				</div>
				<div class="thumb">
					<a href="/forum/{{$thread->brand->slug}}" class="thumbnail text-center"><b>{{$thread->brand->brand}}</b></a>
				</div>
				<div class="index2">
					<div class="media">
						<a href="/member/{{$thread->user->slug}}">
							<div class="pull-left">
								<img src="<?php if (file_exists(public_path("member/".$thread->user->img))) echo '/member/' ?>{{$thread->user->avatar()}}" class="img-circle">
							</div>
							<p class="pull-left" style="margin-top: 10px;">
								{{$thread->user->name}} <br> <small>{{$thread->created_at->diffForHumans()}}</small>
							</p>
						</div>
					</a>
				</div>
			</div>
		</a>
		@endforeach
	@else
		<p class="text-center">Belum ada diskusi</p>
	@endif
</div>
@if(Request::url() != 'http://kampusmobil.com/forum')
	<div class="text-center">
		<a class="more" href="/forum">Lihat lainya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
	</div>
@endif