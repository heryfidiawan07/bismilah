
<div class="row">
	<div class="slider">
		
		<ul class="scroll">
	    @foreach($brands as $brand)
		    <li class="line">
		    	<a href="/{{$brand->slug}}"><img src="/brands/{{$brand->slug}}.png" width="50">
					<h6 class="text-center"><b>{{$brand->brand}}</b></h6></a>
				</li>
			@endforeach
		</ul>

	</div>
</div>

