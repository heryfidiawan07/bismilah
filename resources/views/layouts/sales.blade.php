
	<div class="form-inline">
      <label for="area_id"><h5 class="btn btn-warning" style="margin-bottom: 20px;"><b>Cari marketing di kota anda</b></h5></label>
      <select name="brand_id" class="form-control" id="brand" style="margin-bottom: 10px;">
      	<option value="">Pilih Brand</option>
      	@foreach($brands as $brand)
      		<option value="{{$brand->id}}">{{$brand->brand}}</option>
      	@endforeach
      </select>
      <select name="area_id" class="form-control" id="area" style="margin-bottom: 10px;">
      	<option value="">Pilih Kota</option>
      	@foreach($areas as $area)
      		<option value="{{$area->id}}">{{$area->area}}</option>
      	@endforeach
      </select>
      <input type="submit" class="btn btn-primary" value="cari" id="cari" data-url="/cari/" style="margin-bottom: 10px;">
  </div>

<table id="table" class="table table-hover">
	<tr>
		<td>
			<div class="col-sm-3 text-center">
				<a id="aImg" href="">
					<img id="img" src="https://lh3.googleusercontent.com/-fA4GNmqpiLo/WQBwGMc_1nI/AAAAAAAAAkQ/p2pkw2WDaJUj4pJciG3_2AeC1LW3gFNswCHM/s200/%255BUNSET%255D" class="img-responsive" width="200" height="200">
				</a>
			</div>
			<br>
			<div class="col-sm-9">
				<a id="prof" href="" class="btn btn-sm btn-danger pull-right">profil</a>
				<p><b id="name">Nama ?</b></p>
				<p id="pt">PT ?</p>
				<p id="alamat">Alamat ?</p>
				<p id="tentang">Promo ?</p>
				<p>
					<a id="hp1" href="" class="btn btn-primary btn-sm fa fa-phone"></a>
				 	<a id="hp2" href="" class="btn btn-success btn-sm fa fa-whatsapp"></a>
				</p>
			</div>
		</td>
	</tr>
</table>

