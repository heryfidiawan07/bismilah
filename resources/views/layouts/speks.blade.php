<h4 class="tab"><b>Spesifikasi</b></h4>
<div class="container contSpek">
	@if($speks->count())
		@foreach($speks as $spek)
		<a href="/spesifikasi/{{$spek->mobil->slug}}/{{$spek->slug}}">
			<div class="col-md-3 col-sm-6 main">
				<div class="index">
					<img src="/model/{{$spek->mobil->depan}}" id="imgH">
				</div>
				<div class="index2">
		      <div class="pull-left">
		      	<b>{{ str_limit($spek->title, $limit = 40, $end = '...') }}</b>
		      </div>
		    </div>
		    <div class="thumb">
					<a href="/spesifikasi/{{$spek->mobil->slug}}" class="thumbnail text-center">
						<b>{{$spek->mobil->model}}</b>
					</a>
				</div>
			</div>
		</a>
		@endforeach
	@else
		<p class="text-center">Belum ada spesifikasi</p>
	@endif
</div>
@if(Request::url() != 'http://kampusmobil.com/spesifikasi')
	<div class="text-center">
		<a class="more" href="/spesifikasi">Lihat lainya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
	</div>
@endif