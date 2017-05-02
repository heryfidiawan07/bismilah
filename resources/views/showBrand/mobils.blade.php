
<div class="row">
	<div class="slider">
		
		<ul class="scroll">
	    @foreach($brands as $brand)
		    <li class="line">
		    	<img src="/brands/{{$brand->slug}}.png" width="40">
					<h5 class="text-center"><a href="/{{$brand->slug}}"><b>{{$brand->brand}}</b></a></h5>
				</li>
			@endforeach
		</ul>

	</div>
</div>

