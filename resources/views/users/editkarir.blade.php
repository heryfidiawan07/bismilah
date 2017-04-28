<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editKarir">
Edit Iklan Anda
</button>

<!-- Modal -->
<div class="modal fade" id="editKarir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		  	<h4 class="panel-heading text-center">Edit marketings</h4>
				<form action="/karir/{{$sales->id}}/edit" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
		      <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} ">
		          <label for="name">Nama</label>
		          <input type="text" name="name" class="form-control" value="{{$sales->name}}">
		          @if($errors->has('name'))
		              <span class="help-block"> {{$errors->first('name')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
		      		<img src="{{asset('/marketingImg/'.$sales->img )}}" width="200" class="img-responsive">
		          <label for="img">Ganti foto</label>
		          @include('layouts.upload')
		      </div>
		      <div class="form-group {{ $errors->has('pt') ? ' has-error' : '' }} ">
		          <label for="pt">PT</label>
		          <input type="text" name="pt" class="form-control" value="{{$sales->pt}}">
		          @if($errors->has('pt'))
		              <span class="help-block"> {{$errors->first('pt')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }} ">
		          <label for="alamat">Alamat</label>
		          <input type="text" name="alamat" class="form-control" value="{{$sales->alamat}}">
		          @if($errors->has('alamat'))
		              <span class="help-block"> {{$errors->first('alamat')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('hp1') ? ' has-error' : '' }} ">
		          <label for="hp1">Hp 1</label>
		          <input type="text" name="hp1" class="form-control" value="{{$sales->hp1}}">
		          @if($errors->has('hp1'))
		              <span class="help-block"> {{$errors->first('hp1')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('hp2') ? ' has-error' : '' }} ">
		          <label for="hp2">Hp 2</label>
		          <input type="text" name="hp2" class="form-control" value="{{$sales->hp2}}">
		          @if($errors->has('hp2'))
		              <span class="help-block"> {{$errors->first('hp2')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('tentang') ? ' has-error' : '' }} ">
		          <label for="tentang">Tentang</label>
		          <textarea name="tentang" rows="5" class="form-control">{{$sales->tentang}}</textarea>
		          @if($errors->has('tentang'))
		              <span class="help-block"> {{$errors->first('tentang')}} </span>
		          @endif
		      </div>
		      <div class="form-group">
		      	<div class="col-sm-6">
		      		<label>Brand</label>
		          <input type="text" class="form-control" value="{{$sales->brand->brand}}" disabled>
		      	</div>
		      	<div class="col-sm-6">
		          <label>Area</label>
		          <input type="text" class="form-control" value="{{$sales->area->area}}" disabled>
		        </div>
		      </div>
		      <div class="form-group {{ $errors->has('area_id') ? ' has-error' : '' }} ">
		          <label for="area_id">Edit brand dan wilayah</label>
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
			    <div class="form-group">
			      <input type="submit" class="btn btn-primary btn-sm" value="update">
			    </div>
				</form>
			</div>

	    <div class="modal-footer">
	      <button style="color: black !important;" type="button" class="btn btn-default" data-dismiss="modal"><b>Close</b></button>
	    </div>

		</div>
  </div>
</div>