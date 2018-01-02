<div class="panel panel-default">
	<div class="text-center"><img src="/ads/{{$ads->img}}" class="img-responsive"></div>
	<div class="text-center">{!! nl2br($ads->description) !!}</div>
	<div class="text-center">
		<a href="tel://+62{{$ads->phone}}" class="fa fa-whatsapp btn btn-sm btn-primary"> 0{{$ads->phone}}</a>
		<a href="https://api.whatsapp.com/send?phone=62{{$ads->whatsapp}}&text={{$ads->title}}" class="fa fa-whatsapp btn btn-sm btn-success"> 0{{$ads->whatsapp}}</a>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		@if($ads->status == 0)
			@if(session('adscheckout'))
		    <div class="alert alert-success">
		        <small class="">{{session('adscheckout')}}</small>
		    </div>
			@endif
		  <div class="alert alert-warning">
		  	Sedang di tinjau.
		  	<button data-toggle="collapse" data-target="#bayar_{{$ads->user_id}}" class="btn btn-primary btn-xs">Upload bukti pembayaran.</button>
    		<div id="bayar_{{$ads->user_id}}" class="collapse"><br>
					<form action="/advertising/{{$ads->id}}/pembayaran" method="post" enctype="multipart/form-data">
		        {{csrf_field()}}
		        <div class="form-group {{ $errors->has('resi') ? ' has-error' : '' }} ">
		            <label for="resi">Bukti Pembayaran</label>
		            <input type="file" name="resi" class="form-control">
		            @if($errors->has('resi'))
		                <span class="help-block"> {{$errors->first('resi')}} </span>
		            @endif
		        </div>
		        <div class="form-group">
		          <input type="submit" class="btn btn-primary btn-sm" value="kirim">
		        </div>
		      </form>
		  </div>
		@else
			<div class="alert alert-success">
				<p>Sedang berjalan. Tersisa {{$sisa->days+1}} hari lagi.</p>
			
				@if($sisa->days <= 2)
					<button data-toggle="collapse" data-target="#ads_{{$ads->user_id}}" class="btn btn-success btn-xs">perpanjang</button>
	      		<div id="ads_{{$ads->user_id}}" class="collapse"><br>
							<form action="/advertising/{{$ads->id}}/perpanjangan" method="post">
				        {{csrf_field()}}
				        <div class="form-group {{ $errors->has('durasi') ? ' has-error' : '' }} ">
				            <label for="durasi">Durasi</label>
				            <select name="durasi" class="form-control">
				              <option value="">Atur durasi</option>
				              <option value="10">Tambah 10 Hari Rp 180.000</option>
				              <option value="20">Tambah 20 Hari Rp 340.000</option>
				              <option value="30">Tambah 30 Hari Rp 500.000</option>
				            </select>
				            @if($errors->has('durasi'))
				                <span class="help-block"> {{$errors->first('durasi')}} </span>
				            @endif
				        </div>
				        <div class="form-group">
				          <input type="submit" class="btn btn-primary btn-sm" value="kirim">
				        </div>
				      </form>
				    </div>
				  @endif
				</div>

		@endif

		<p>Iklan dimulai : {{$ads->start}} - Selesai : {{$ads->done}}</p>
		<p>Area Cakupan : {{$ads->coverage}}</p>
	</div>
</div>