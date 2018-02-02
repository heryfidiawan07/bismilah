<h4 class="tab"><b>Berita</b></h4>
<div class="container contArt">
	@if($articles->count())
		@foreach($articles as $article)
		<a href="/articles/{{$article->brand->slug}}/{{$article->slug}}">
			<div class="col-md-3 col-sm-6 main">
				<div class="index">
					<img src="/articlesImg/{{$article->img}}" class="img-responsive" alt="{{$article->brand->brand}}" id="imgH">
		    </div>
		    <div class="index3">
			    <b>{{ str_limit($article->title, $limit = 60, $end = '...') }}</b>
			  </div>
			  <div class="thumb">
					<a href="/articles/{{$article->brand->slug}}" class="thumbnail text-center"><b>{{$article->brand->brand}}</b></a>
		    </div>
			</div>
		</a>
		@endforeach
	@else
		<p class="text-center">Belum ada article</p>
	@endif
</div>
@if(Request::url() != 'http://kampusmobil.com/articles')
	<div class="text-center">
		<a class="more" href="/articles">Lihat lainya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
	</div>
@endif