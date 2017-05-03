@if($speks->count())
	@foreach($speks as $spek)
	<div class="col-md-6">
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-sm-5">
				<a href="/spesifikasi/{{$spek->mobil->model}}/{{$spek->slug}}">
					<img src="https://lh3.googleusercontent.com/-WL0ZJvL2woo/WQBwHGJsPdI/AAAAAAAAAkg/sehLYuEPH5MnOCIo06PD-mx6V2xLa8SQwCHM/s200/%255BUNSET%255D" class="img-responsive" alt="spesification" id="imgS">
				</a>
			</div>
			<div class="col-sm-7">
				<a href="/spesifikasi/{{$spek->mobil->slug}}/{{$spek->slug}}"><b>{{$spek->title}}</b></a>
				<a href="/spesifikasi/{{$spek->mobil->slug}}" class="thumbnail text-center"><b>{{$spek->mobil->model}}</b></a>
      </div>
      <div class="pull-right">
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
    </div>
		</div>
	</div>
	@endforeach
@else
	<p class="text-center">Belum ada spesifikasi</p>
@endif