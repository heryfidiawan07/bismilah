<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#bayarIklan">
Upload Bukti Pembayaran Iklan
</button>

<!-- Modal -->
<div class="modal fade" id="bayarIklan" tabindex="-1" role="dialog" aria-labelledby="uploadIklan" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">    
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-center" id="uploadIklan">Upload Bukti Pembayaran Iklan
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </h5>
      </div>

      <div class="modal-body">
          <form action="/pembayaran-iklan/{{$iklan->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
                <label for="img">Upload bukti pembaran</label>
                @include('layouts.upload')
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-sm" value="kirim">
            </div>
            
          </form>
        </div>

        <div class="modal-footer">
          <button style="color: black !important;" type="button" class="btn btn-default" data-dismiss="modal"><b>Close</b></button>
        </div>

      </div>
  </div>
</div>