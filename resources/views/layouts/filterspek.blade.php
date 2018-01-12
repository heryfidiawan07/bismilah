<a href="#" type="button" class="mainBrand btn btn-success btn-sm" data-toggle="modal" data-target="#spekFilter">
    Filter >>
</a>
<!-- Modal -->
<div class="modal right fade" id="spekFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close &#62;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white;">Kategori</h4>
      </div>

      <div class="modal-body">
        <table class="table" id="modal-table">
          @foreach($brands as $brand)
            <tr><td>
              <a class="mainBrand" href="/spesifikasi/all/{{$brand->slug}}" style="display: block; color: black;">
                <img src="/brands/{{$brand->slug}}.png" width="35" style="float: left; margin-right: 5px;"> {{$brand->brand}}
              </a>
            </td></tr>
          @endforeach
        </table>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->
