<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#karir">
Daftar jadi marketing
</button>

<!-- Modal -->
<div class="modal fade" id="karir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Daftar jadi marketing
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </h5>
    </div>
    
    <div class="modal-body">

		@if(Auth::user())
			<form action="" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
		      <div class="form-group {{ $errors->has('area_id') ? ' has-error' : '' }} ">
		          <label for="area_id">Pilih brand dan wilayah - 
		          	<a href="/kritik-dan-saran" class="btn btn-primary btn-xs">Ajaukan permintaan ke admin</a>
		          </label>
		          <a type="button" href="#" data-toggle="collapse" data-target="#brandArea" class="form-control text-center" style="text-decoration: none; color: black;">Pilih brand dan wilayah</a>
		          <div id="brandArea" class="collapse">
		          	<div class="col-sm-6">
		          		@foreach($brands as $brand)
		          			<input type="radio" name="brand_id" value="{{$brand->id}}" data-id="{{$brand->id}}" data-url="/cek/sales/" class="brands">{{$brand->brand}}<br>
		          		@endforeach
		          	</div>
		          	<div class="col-sm-6">
		          		@foreach($areas as $area)
		          			<span class="hasil_{{$area->id}}"><input type="radio" name="area_id" value="{{$area->id}}" class="areas_{{$area->id}}">{{$area->area}}</span> <br>
		          		@endforeach
		          	</div>
		          </div>
		      </div>
		      <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} ">
		          <label for="name">Nama</label>
		          <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Nama">
		          @if($errors->has('name'))
		              <span class="help-block"> {{$errors->first('name')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
		          <label for="img">Image</label>
		          @include('layouts.upload')
		      </div>
		      <div class="form-group {{ $errors->has('pt') ? ' has-error' : '' }} ">
		          <label for="pt">PT</label>
		          <input type="text" name="pt" class="form-control" value="{{old('pt')}}" placeholder="Perusahaan">
		          @if($errors->has('pt'))
		              <span class="help-block"> {{$errors->first('pt')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }} ">
		          <label for="alamat">Alamat</label>
		          <input type="text" name="alamat" class="form-control" value="{{old('alamat')}}" placeholder="Alamat">
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
		      <div class="form-group {{ $errors->has('tentang') ? ' has-error' : '' }} ">
		          <label for="tentang">Promosikan kelebihan anda</label>
		          <textarea name="tentang" rows="5" class="form-control">{{old('tentang')}}</textarea>
		          @if($errors->has('tentang'))
		              <span class="help-block"> {{$errors->first('tentang')}} </span>
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
			          			Setelah melakukan pembayaran upload bukti pembayaran, team kami akan segera memproses akun anda secepatnya.<br><br>
			          			<small><i style="color: orange;">Note : Tombol upload bukti pembayaran akan terlihat ketika anda berhasil mendaftar sebagai marketing.</i></small>
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
											<tr>
												<td><p>Nominal</p></td><td><p><b>RP 100.000</b></p></td>
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