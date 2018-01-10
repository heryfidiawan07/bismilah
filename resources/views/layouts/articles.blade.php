<h4 class="tab"><b>Berita</b></h4>
<div class="container contArt">
	@if($articles->count())
		@foreach($articles as $article)
		<div class="col-md-3 col-sm-6 main">
			<div class="index">
				<a href="/articles/{{$article->brand->slug}}/{{$article->slug}}">
					<img src="{{$article->img}}" class="img-responsive" alt="{{$article->brand->brand}}" id="imgH">
				</a>
	    </div>
	    <div class="index3">
		    <a href="/articles/{{$article->brand->slug}}/{{$article->slug}}"><b>{{ str_limit($article->title, $limit = 80, $end = '...') }}</b></a>
		  </div>
		  <div class="thumb">
				<a href="/articles/{{$article->brand->slug}}" class="thumbnail text-center"><b>{{$article->brand->brand}}</b></a>
	    </div>
		</div>
		@endforeach
	@else
		<p class="text-center">Belum ada article</p>
	@endif
</div>