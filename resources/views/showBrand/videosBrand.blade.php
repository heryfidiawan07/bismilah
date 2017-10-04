
<div class="row">
	<div class="slider">
		
		<ul class="scroll">
	    @foreach($brands as $brand)
		    <li class="line">
		    	<a href="/videos/all/{{$brand->slug}}"><img src="/brands/{{$brand->slug}}.png" width="60">
					<h5 class="text-center"><b>{{$brand->brand}}</b></h5></a>
				</li>
			@endforeach
		</ul>

	</div>
</div>

