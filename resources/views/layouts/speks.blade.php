<h4 class="tab"><b>Spesifikasi</b></h4>
<div class="container conSpek">
	@if($speks->count())
		@foreach($speks as $spek)
		<div class="col-md-3 col-sm-4 main">
			<div class="index">
				<a href="/spesifikasi/{{$spek->mobil->slug}}/{{$spek->slug}}">
					<img src="{{$spek->mobil->depan}}" id="imgH">
				</a>
			</div>
			<div class="index2">
	      <div class="pull-left">
	      	<a href="/spesifikasi/{{$spek->mobil->slug}}/{{$spek->slug}}"><b>{{ str_limit($spek->title, $limit = 50, $end = '...') }}</b></a>
	      </div>
	    </div>
	    <div class="thumb">
				<a href="/spesifikasi/{{$spek->mobil->slug}}" class="thumbnail text-center">
						<b>{{$spek->mobil->model}}</b>
				</a>
			</div>
		</div>
		@endforeach
	@else
		<p class="text-center">Belum ada spesifikasi</p>
	@endif
</div>
@if(Request::url() != 'http://kampusmobil.com/spesifikasi')
<div class="row">
	<div class="text-center">
		<a class="more" href="/spesifikasi">Show more <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
	</div>
</div>
@endif