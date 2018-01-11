<h4 class="tab"><b>Video Review</b></h4>
<div class="container conVid">
	@if($videos->count())
		@foreach($videos as $video)
		<div class="col-md-3 col-sm-4 main">
			<div class="index">
				<a href="/videos/{{$video->mobil->slug}}/{{$video->slug}}">
					<img src="https://img.youtube.com/vi/<?php $text = explode("embed/", $video->link); echo $text[1]; ?>/0.jpg" class="img-responsive" id="imgH">
				</a>
			</div>
			<div class="index2">
				<div class="pull-left">
	      	<a href="/videos/{{$video->mobil->slug}}/{{$video->slug}}">{{ str_limit($video->title, $limit = 50, $end = '...') }}</a>
	      </div>
		  </div>
		  <div class="thumb">
				<a class="pull-right" href="/videos/{{$video->mobil->slug}}/{{$video->slug}}"><small>{{$video->jmlvCom()}} komentar</small></a>
			</div>
		  <div class="thumb">
				<a href="/videos/{{$video->mobil->slug}}" class="thumbnail text-center"><b>{{$video->mobil->model}}</b></a>
			</div>
		</div>
		@endforeach
	@else
		<p class="text-center">Belum ada video</p>
	@endif
</div>
@if(Request::url() != 'http://kampusmobil.com/videos')
<div class="row">
	<div class="text-center">
		<a class="more" href="/videos">Show more <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
	</div>
</div>
@endif