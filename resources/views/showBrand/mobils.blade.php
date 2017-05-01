@if($mobils->count())
	<div class="row">

		<div class="slider">
			
			<h5 class="text-center"><b>HONDA</b></h4>
			<ul class="scroll">
		    @foreach($mobils->where('brand_id',1) as $mobil)
			    <li class="line">
						<h4 class="text-center"><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h4>
					</li>
				@endforeach
			</ul>

			<h5 class="text-center"><b>TOYOTA</b></h4>
			<ul class="scroll">
		    @foreach($mobils->where('brand_id',2) as $mobil)
			    <li class="line">
						<h4 class="text-center"><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h4>
					</li>
				@endforeach
			</ul>
			
			<h5 class="text-center"><b>MITSUBISHI</b></h4>
			<ul class="scroll">
		    @foreach($mobils->where('brand_id',3) as $mobil)
			    <li class="line">
						<h4 class="text-center"><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h4>
					</li>
				@endforeach
			</ul>

			<h5 class="text-center"><b>DAIHATSU</b></h4>
			<ul class="scroll">
		    @foreach($mobils->where('brand_id',4) as $mobil)
			    <li class="line">
						<h4 class="text-center"><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h4>
					</li>
				@endforeach
			</ul>

			<h5 class="text-center"><b>NISSAN DATSUN</b></h4>
			<ul class="scroll">
		    @foreach($mobils->where('brand_id',5) as $mobil)
			    <li class="line">
						<h4 class="text-center"><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h4>
					</li>
				@endforeach
			</ul>

			<h5 class="text-center"><b>FORD</b></h4>
			<ul class="scroll">
		    @foreach($mobils->where('brand_id',6) as $mobil)
			    <li class="line">
						<h4 class="text-center"><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h4>
					</li>
				@endforeach
			</ul>

			<h5 class="text-center"><b>MAZDA</b></h4>
			<ul class="scroll">
		    @foreach($mobils->where('brand_id',7) as $mobil)
			    <li class="line">
						<h4 class="text-center"><a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}"><b>{{$mobil->model}}</b></a></h4>
					</li>
				@endforeach
			</ul>

		</div>

	</div>
@endif
