<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fModal">
  Forum Kategori
</button>

<!-- Modal -->
<div class="modal fade" id="fModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kategori forum
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
        </h5>
      </div>
      <div class="modal-body">
        <table class="table" id="modal-table">
					@foreach($brands as $brand)
						<tr><td>
							<a href="/forum/{{$brand->slug}}" style="display: block; color: black;">{{$brand->brand}}</a>
						</td></tr>
					@endforeach
				</table>
      </div>
      <div class="modal-footer">
        <button style="color: black !important;" type="button" class="btn btn-default" data-dismiss="modal"><b>Close</b></button>
      </div>
    </div>
  </div>
</div>