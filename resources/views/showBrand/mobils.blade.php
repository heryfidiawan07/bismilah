
<button class="btn btn-xs col-xs-1" onclick="example_animate('-=50px')" style="margin-top: 15px; height: auto; font-size: 30px; background-color: unset; color: black !important; border-right: 1px solid grey;"> < </button>

<div class="text-center col-xs-10" style="overflow-x: scroll; white-space: nowrap; height: auto;">
	<div class="slide">

		@foreach($brands as $brand)
			<a href="/{{$brand->slug}}" style="display: inline-block; margin: 15px;"><img src="/brands/{{$brand->slug}}.png" width="50">
			<h6 class="text-center"><b>{{$brand->brand}}</b></h6></a>
		@endforeach

	</div>
</div>

<button class="btn btn-xs col-xs-1" onclick="example_animate('+=50px')" style="margin-top: 15px; height: auto; font-size: 30px; background-color: unset; color: black !important; border-left: 1px solid grey;"> > </button>

