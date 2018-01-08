@if($videos->count())
	@foreach($videos as $video)
	<div class="col-md-3 col-sm-4">
		<div class="index">
				<a href="/videos/{{$video->mobil->slug}}/{{$video->slug}}">
					<img src="https://img.youtube.com/vi/<?php $text = explode("embed/", $video->link); echo $text[1]; ?>/0.jpg" class="img-responsive" id="imgH">
				</a>
		</div>
		<div class="index2">
			<div class="pull-left" style="width: 100%; margin-bottom: -15px;">
				<a href="/videos/{{$video->mobil->slug}}" class="thumbnail text-center pull-left"><b>{{$video->mobil->model}}</b></a>
				<a class="pull-right" href="/videos/{{$video->mobil->slug}}/{{$video->slug}}"><small>{{$video->jmlvCom()}} komentar</small></a>
	    </div>
      <div class="pull-left">
      	<a href="/videos/{{$video->mobil->slug}}/{{$video->slug}}"><h5>{{$video->title}}</h5></a>
      </div>
	  </div>
	</div>
	@endforeach
@else
	<p class="text-center">Belum ada video</p>
@endif