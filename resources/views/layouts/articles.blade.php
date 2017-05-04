@if($articles->count())
	@foreach($articles as $article)
	<div class="col-md-6">
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-sm-6">
				<a href="/articles/{{$article->brand->slug}}/{{$article->slug}}">
					<img src="{{$article->img}}" class="img-responsive" alt="{{$article->brand->brand}}" id="imgH">
				</a>
			</div>
			<div class="col-sm-6">
				<a href="/articles/{{$article->brand->slug}}/{{$article->slug}}"><h5>{{$article->title}}</h5></a>
				<a href="/articles/{{$article->brand->slug}}" class="thumbnail text-center"><b>{{$article->brand->brand}}</b></a>
      </div>
      <div class="pull-right">
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
	  </div>
		</div>
	</div>
	@endforeach
@else
	<p class="text-center">Belum ada article</p>
@endif