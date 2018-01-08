@if($articles->count())
	@foreach($articles as $article)
	<div class="col-md-3 col-sm-4">
		<div class="index">
			<a href="/articles/{{$article->brand->slug}}/{{$article->slug}}">
				<img src="{{$article->img}}" class="img-responsive" alt="{{$article->brand->brand}}" id="imgH">
			</a>
    </div>
    <div class="index3">
    	<div class="pull-left" style="width: 100%; margin-bottom: -15px;">
				<a href="/articles/{{$article->brand->slug}}" class="thumbnail text-center pull-left">
					<b>{{$article->brand->brand}}</b>
				</a>
				@if(Auth::check())
          @if(Auth::user()->admin())
            <a href="/admin/article/{{$article->id}}/edit" class="btn btn-xs btn-success">edit</a>
						<button data-toggle="collapse" data-target="#rem_{{$article->id}}" class="btn btn-warning btn-xs">Remove ?</button>
						<div id="rem_{{$article->id}}" class="collapse"><br>
							<a href="/admin/article/{{$article->id}}/delete" class="btn btn-xs btn-danger">delete</a>
						</div>
					@endif
        @endif
      </div>
      <div class="pull-left">
	    	<a href="/articles/{{$article->brand->slug}}/{{$article->slug}}"><b>{{$article->title}}</b></a>
	    </div>
	  </div>
	</div>
	@endforeach
@else
	<p class="text-center">Belum ada article</p>
@endif