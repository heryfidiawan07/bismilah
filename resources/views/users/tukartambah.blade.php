@if(Session::has('success'))
	<div class="alert alert-success">
	    <p class="animated bounceInUp">{{ Session::get('success') }}</p>
	</div>
@endif
<div class="text-center">
	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tukarTambah">
	Mau tukar tambah mobil anda ?
	</button>
</div>
<!-- Modal -->
<div class="modal fade" id="tukarTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tukar tambah mobil anda
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </h5>
    </div>
    
    <div class="modal-body">

		<form action="/kirim-tukar-tambah" method="post">
			{{csrf_field()}}
	      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} ">
	          <label for="email">Email</label>
	          <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="alamat email anda">
	          @if($errors->has('email'))
	              <span class="help-block"> {{$errors->first('email')}} </span>
	          @endif
	      </div>
	      <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }} ">
	          <label for="alamat">Alamat</label>
	          <input type="text" name="alamat" class="form-control" value="{{old('alamat')}}" placeholder="Alamat anda sekarang">
	          @if($errors->has('alamat'))
	              <span class="help-block"> {{$errors->first('alamat')}} </span>
	          @endif
	      </div>
	      <div class="form-group {{ $errors->has('hp1') ? ' has-error' : '' }} ">
	          <label for="hp1">Hp</label>
	          <input type="text" name="hp1" class="form-control" value="{{old('hp1')}}" placeholder="CALL / SMS">
	          @if($errors->has('hp1'))
	              <span class="help-block"> {{$errors->first('hp1')}} </span>
	          @endif
	      </div>
	      <div class="form-group {{ $errors->has('hp2') ? ' has-error' : '' }} ">
	          <label for="hp2">Whatsapp</label>
	          <input type="text" name="hp2" class="form-control" value="{{old('hp2')}}" placeholder="Whatsapp">
	          @if($errors->has('hp2'))
	              <span class="help-block"> {{$errors->first('hp2')}} </span>
	          @endif
	      </div>
	      <div class="form-group {{ $errors->has('pesan') ? ' has-error' : '' }} ">
	          <label for="pesan">Pesan</label>
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