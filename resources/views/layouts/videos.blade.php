@if($videos->count())
	@foreach($videos as $video)
	<div class="col-md-6">
		<div class="panel panel-default">
		<div class="panel-body index">
			<div class="col-sm-6">
				<a href="/videos/{{$video->mobil->slug}}/{{$video->slug}}">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="{{$video->link}}" frameborder="0" allowfullscreen></iframe>
					</div>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="/videos/{{$video->mobil->slug}}/{{$video->slug}}"><h5>{{$video->title}}</h5></a>
				<br>
				<a href="/videos/{{$video->mobil->slug}}" class="thumbnail text-center pull-left"><b>{{$video->mobil->model}}</b></a>
				<a class="pull-right" href="/videos/{{$video->mobil->slug}}/{{$video->slug}}"><small>{{$video->jmlvCom()}} komentar</small></a>
      </div>
      <div class="pull-right">
				@if(Auth::check())
          @if(Auth::user()->admin())
            <a href="/admin/video/{{$video->id}}/edit" class="btn btn-xs btn-success">edit</a>
						<button data-toggle="collapse" data-target="#rem_{{$video->id}}" class="btn btn-warning btn-xs">Remove ?</button>
						<div id="rem_{{$video->id}}" class="collapse"><br>
							<a href="/admin/video/{{$video->id}}/delete" class="btn btn-xs btn-danger">delete</a>
						</div>
					@endif
        @endif
      </div>
	  </div>
		</div>
	</div>
	@endforeach
@else
	<p class="text-center">Belum ada video</p>
@endif