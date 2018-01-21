<!-- Modal -->
<div class="modal fade" id="kirimPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    
    <div class="modal-header">
      <h5 class="modal-title text-center" id="exampleModalLabel">Kirim Penawaran Diskon / Promo
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </h5>
    </div>
    
    <div class="modal-body">

		<form action="/kirim-pesan" method="post">
			{{csrf_field()}}
	      <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }} ">
	          <label for="alamat">Alamat</label>
	          <input type="text" name="alamat" class="form-control" value="{{old('alamat')}}" placeholder="Alamat">
	          @if($errors->has('alamat'))
	              <span class="help-block"> {{$errors->first('alamat')}} </span>
	          @endif
	      </div>
	      <div class="form-group {{ $errors->has('hp') ? ' has-error' : '' }} ">
	          <label for="hp">Hp</label>
	          <input type="text" name="hp" class="form-control" value="{{old('hp')}}" placeholder="Telp / SMS">
	          @if($errors->has('hp'))
	              <span class="help-block"> {{$errors->first('hp')}} </span>
	          @endif
	      </div>
	      <div class="form-group {{ $errors->has('pesan') ? ' has-error' : '' }} ">
	          <label for="pesan">Deskripsi</label>
	          <textarea name="pesan" rows="5" class="form-control">{{old('pesan')}}</textarea>
	          @if($errors->has('pesan'))
	              <span class="help-block"> {{$errors->first('pesan')}} </span>
	          @endif
	      </div>
	      <div class="form-group {{ $errors->has('g-recaptcha') ? ' has-error' : '' }} ">
          <div class="g-recaptcha" data-sitekey="6Lcu_hwUAAAAABsPEn0ypqHoivEzkXloff_2eEfo" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
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
