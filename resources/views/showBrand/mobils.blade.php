
<div class="row">
	<div class="slider">
		
		<ul class="scroll">
	    @foreach($brands as $brand)
		    <li class="line">
		    	<a href="/{{$brand->slug}}"><img src="/brands/{{$brand->slug}}.png" width="60"></a>
					<h5 class="text-center"><a href="/{{$brand->slug}}"><b>{{$brand->brand}}</b></a></h5>
				</li>
			@endforeach
		</ul>

	</div>
</div>

