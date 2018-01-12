@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<h4 class="text-center">Create profil</h4>
			<div class="panel-body"><hr>
				<form action="" method="post">
					{{csrf_field()}}
			      <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }} ">
			          <label for="brand_id">Brand</label>
			          <select name="brand_id" class="form-control">
			          	<option value="">Pilih Brand</option>
			          	@foreach($brands as $brand)
			          		<option value=" {{$brand->id}} ">{{$brand->brand}}</option>
			          	@endforeach
			          </select>
			          @if($errors->has('brand_id'))
			              <span class="help-block"> {{$errors->first('brand_id')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('depan') ? ' has-error' : '' }} ">
			          <label for="depan">Url image depan</label>
			          <input type="text" name="depan" class="form-control" value="{{old('depan')}}" placeholder="Source image depan">
			          @if($errors->has('depan'))
			              <span class="help-block"> {{$errors->first('depan')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('samping') ? ' has-error' : '' }} ">
			          <label for="samping">Url image samping</label>
			          <input type="text" name="samping" class="form-control" value="{{old('samping')}}" placeholder="Source image samping">
			          @if($errors->has('samping'))
			              <span class="help-block"> {{$errors->first('samping')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('belakang') ? ' has-error' : '' }} ">
			          <label for="belakang">Url image belakang</label>
			          <input type="text" name="belakang" class="form-control" value="{{old('belakang')}}" placeholder="Source image belakang">
			          @if($errors->has('samping'))
			              <span class="help-block"> {{$errors->first('samping')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('model') ? ' has-error' : '' }} ">
			          <label for="model">Model</label>
			          <input type="text" name="model" class="form-control" value="{{old('model')}}" placeholder="nama model">
			          @if($errors->has('model'))
			              <span class="help-block"> {{$errors->first('model')}} </span>
			          @endif
			      </div>
			      <div class="form-group">
			        <input type="submit" class="btn btn-primary btn-sm" value="post">
			    </div>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body" style="overflow: scroll; max-height: 800px; font-weight: bold;">
				<h4 class="text-center">Profil Mobil</h4>
				<table class="table table-hover">
					@foreach($mobils as $mobil)
						<tr><td>{{$mobil->model}}</td></tr>
						<tr><td>
							<a href="/{{$mobil->brand->slug}}" class="thumbnail text-center">
								<b>{{$mobil->brand->brand}}</b>
							</a>
						</td></tr>
						<tr>
							<td>
								<a href="/profil/{{$mobil->brand->slug}}/{{$mobil->slug}}" class="btn btn-sm btn-primary">lihat</a>
								<a href="/admin/mobil/{{$mobil->id}}/edit" class="btn btn-sm btn-warning">edit</a>
								<a href="/admin/series/{{$mobil->slug}}" class="btn btn-sm btn-danger">Harga</a>
								<button data-toggle="collapse" data-target="#rem_{{$mobil->id}}" class="btn btn-success btn-sm pull-right">Remove ?</button>
								<div id="rem_{{$mobil->id}}" class="collapse">
									<a href="/admin/mobil/{{$mobil->id}}/delete" class="btn btn-sm btn-danger pull-right">delete</a>
								</div>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection