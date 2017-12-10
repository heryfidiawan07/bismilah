<!-- Modal -->
<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#60; close</span></button>
				<h4 class="modal-title" id="myModalLabel" style="color: white;">Kategori Brand</h4>
			</div>

			<div class="modal-body">
				<table class="table" id="modal-table">
					@foreach($brands as $brand)
						<tr><td>
							<a href="/{{$brand->slug}}" style="display: block; color: black;">
								<img src="/brands/{{$brand->slug}}.png" width="35" style="float: left; margin-right: 5px;">{{$brand->brand}}
							</a>
						</td></tr>
					@endforeach
				</table>
			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->
