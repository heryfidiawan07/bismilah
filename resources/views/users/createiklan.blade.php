<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#karir">
Promosikan Produk Anda
</button>

<!-- Modal -->
<div class="modal fade" id="karir" tabindex="-1" role="dialog" aria-labelledby="createIklan" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    
    <div class="modal-header">
      <h5 class="modal-title text-center" id="createIklan">Promosikan produk anda
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </h5>
    </div>
    
    <div class="modal-body">

		@if(Auth::user())
			<form action="" method="post" enctype="multipart/form-data">
				{{csrf_field()}}

		      <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
		          <label for="img">Foto</label>
		          @include('layouts.upload')
		      </div>

		      <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }} ">
		          <label for="deskripsi">Deskpripsi</label>
		          <textarea name="deskripsi" rows="5" class="form-control">{{old('deskripsi')}}</textarea>
		          @if($errors->has('deskripsi'))
		              <span class="help-block"> {{$errors->first('deskripsi')}} </span>
		          @endif
		      </div>

		      <div class="form-group {{ $errors->has('hp') ? ' has-error' : '' }} ">
		          <label for="hp">Call / SMS</label>
		          <input type="text" name="hp" class="form-control" value="{{old('hp')}}" placeholder="Nomor Hp / SMS">
		          @if($errors->has('hp'))
		              <span class="help-block"> {{$errors->first('hp')}} </span>
		          @endif
		      </div>

		      <div class="form-group {{ $errors->has('wa') ? ' has-error' : '' }} ">
		          <label for="wa">Whatsapp</label>
		          <input type="text" name="wa" class="form-control" value="{{old('wa')}}" placeholder="Nomor Whatsapp">
		          @if($errors->has('wa'))
		              <span class="help-block"> {{$errors->first('wa')}} </span>
		          @endif
		      </div>

		      <div class="form-group {{ $errors->has('pilihan') ? ' has-error' : '' }} ">
		          <div class="radio">
					      <label><input type="radio" name="pilihan" value="7">1 Minggu Rp 180.000</label>
					    </div>
					    <div class="radio">
					      <label><input type="radio" name="pilihan" value="14">2 Minggu Rp 310.000</label>
					    </div>
					    <div class="radio">
					      <label><input type="radio" name="pilihan" value="21">3 Minggu Rp 465.000</label>
					    </div>
					    <div class="radio">
					      <label><input type="radio" name="pilihan" value="30">1 Bulan Rp 675.000</label>
					    </div>
		          @if($errors->has('pilihan'))
		              <span class="help-block"> {{$errors->first('pilihan')}} </span>
		          @endif
		      </div>

		      <div class="form-group {{ $errors->has('mulai') ? ' has-error' : '' }} ">
		          <label for="mulai">Iklan dimulai</label>
		          <input type="date" name="mulai" class="form-control" value="{{old('mulai')}}">
		          @if($errors->has('mulai'))
		              <span class="help-block"> {{$errors->first('mulai')}} </span>
		          @endif
		      </div>
		      
		      <div class="form-group {{ $errors->has('area_id') ? ' has-error' : '' }} ">
		          <label for="area_id">Pembayaran</label>
		          <a type="button" href="#checkout" data-toggle="collapse" data-target="#transfer" class="form-control text-center" style="text-decoration: none; color: black;">Pembayaran</a>
		          <div id="transfer" class="collapse">
		          	<div class="panel panel-default">
		          	<div class="panel-body" style="background-color: #f2f2f2;">
			          	<div class="col-sm-6">
			          		<p><h4 class="text-center">Bank Transfer</h4><br>
			          			<b>** Lakukan pembayaran sesuai jumlah yang telah anda pilih pada periode iklan anda akan di jalankan **</b>
			          			<br>
			          			Setelah melakukan pembayaran upload bukti pembayaran, team kami akan segera memproses akun anda secepatnya.<br><br>
			          			<small><i style="color: red;">Note : Tombol upload bukti pembayaran akan terlihat ketika anda berhasil mengisi formulir iklan anda.</i></small>
			          		</p>
			          	</div>
			          	<div class="col-sm-6 alert alert-success">
			          		<h4 class="text-center">Bank Transfer</h4>
			          		<table class="table">
											<tr>
												<td><p>BCA</p></td><td><p><b>8730342072</b></p></td>
											</tr>
											<tr>
												<td><p>A/N</p></td><td><p><b>Heri Fidiawan</b></p></td>
											</tr>
										</table>
			          	</div>
			          </div>
			          </div>
		          </div>
		      </div>
		      <div class="form-group">
		        <input type="submit" class="btn btn-primary btn-sm" value="kirim">
		   		</div>
			</form>
		@endif

		</div>
		
    <div class="modal-footer">
      <button style="color: black !important;" type="button" class="btn btn-default" data-dismiss="modal"><b>Close</b></button>
    </div>
	
	</div>
  </div>
</div>