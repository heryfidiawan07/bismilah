@if($speks->count())
	@foreach($speks as $spek)
	<div class="col-md-3 col-sm-4">
		<div class="index">
			<a href="/spesifikasi/{{$spek->mobil->slug}}/{{$spek->slug}}">
				<img src="{{$spek->mobil->depan}}" id="imgH">
			</a>
		</div>
		<div class="index2">
			<div class="pull-left" style="width: 100%; margin-bottom: -2px;">
				<a href="/spesifikasi/{{$spek->mobil->slug}}" class="thumbnail text-center pull-left" style="margin-bottom: 3px;">
					<b>{{$spek->mobil->model}}</b>
				</a>
				@if(Auth::check())
          @if(Auth::user()->admin())
            <a href="/admin/spesifikasi/{{$spek->id}}/edit" class="btn btn-xs btn-success">edit</a>
						<button data-toggle="collapse" data-target="#sp_{{$spek->id}}" class="btn btn-warning btn-xs">Remove ?</button>
						<div id="sp_{{$spek->id}}" class="collapse"><br>
							<a href="/admin/spesifikasi/{{$spek->id}}/delete" class="btn btn-xs btn-danger">delete</a>
						</div>
					@endif
        @endif
      </div>
      <div class="pull-left">
      	<a href="/spesifikasi/{{$spek->mobil->slug}}/{{$spek->slug}}"><b>{{$spek->title}}</b></a>
      </div>
    </div>
	</div>
	@endforeach
@else
	<p class="text-center">Belum ada spesifikasi</p>
@endif