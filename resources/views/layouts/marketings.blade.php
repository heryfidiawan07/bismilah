<div class="row">
	<div class="col-md-12">
		<h4 class="text-center"><b>Marketing</b></h4>
		<hr>
			<div class="form-inline">
	        <label for="area_id"><h5 class="btn btn-warning" style="margin-bottom: 20px;"><b>Cari marketing di kota anda</b></h5></label>
	        <select name="area_id" class="form-control" id="area" style="margin-bottom: 10px;">
	        	<option value="">Pilih Kota</option>
	        	@foreach($areas as $area)
	        		<option value="{{$area->slug}}">{{$area->area}}</option>
	        	@endforeach
	        </select>
	        <input type="submit" class="btn btn-primary" value="cari" id="cari" data-brand="{{$brand->slug}}" data-url="/area/{{$brand->slug}}/" style="margin-bottom: 10px;">
	    </div>
		<table id="table" class="table table-hover">
			<tr>
				<td style="background-color: unset;">
				<div class="col-sm-3 text-center">
					<a id="aImg" href="">
						<img id="img" src="https://lh3.googleusercontent.com/-fA4GNmqpiLo/WQBwGMc_1nI/AAAAAAAAAkQ/p2pkw2WDaJUj4pJciG3_2AeC1LW3gFNswCHM/s200/%255BUNSET%255D.jpg" class="img-responsive" width="250" height="250">
					</a>
				</div>
				<div class="col-sm-9">
					<a id="prof" href="" class="btn btn-sm btn-danger pull-right">profil</a>
					<h5><b id="name">Nama ?</b></h5>
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
	</div>
</div>
