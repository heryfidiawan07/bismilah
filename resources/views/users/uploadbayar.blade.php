<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#bayar">
Upload Bukti Transfer
</button>

<!-- Modal -->
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">    
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Upload Bukti Pembayaran
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </h5>
      </div>

      <div class="modal-body">
          <form action="/pembayaran/{{$sales->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <div class="form-group {{ $errors->has('sales_id') ? ' has-error' : '' }} ">
                <label for="sales_id">Nama</label>
                <input type="text" name="sales_id" value="{{$sales->id}}" style="display: none;">
                <p class="well">{{$sales->name}}</p>
                @if($errors->has('sales_id'))
                    <span class="help-block"> {{$errors->first('sales_id')}} </span>
                @endif
            </div>
            
            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
                <label for="img">Upload bukti pembaran</label>
                @include('layouts.upload')
            </div>
            
            <div class="form-group {{ $errors->has('pengirim') ? ' has-error' : '' }} ">
                <label for="pengirim">Pengirim</label>
                <input type="text" name="pengirim" class="form-control" value="{{old('pengirim')}}" placeholder="Pengirim">
                @if($errors->has('pengirim'))
                    <span class="help-block"> {{$errors->first('pengirim')}} </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('bank') ? ' has-error' : '' }} ">
                <label for="bank">Bank</label>
                <input type="text" name="bank" class="form-control" value="{{old('bank')}}" placeholder="Bank">
                @if($errors->has('bank'))
                    <span class="help-block"> {{$errors->first('bank')}} </span>
                @endif
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