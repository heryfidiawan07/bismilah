@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<h4 class="text-center">Create Type Model</h4>
			<div class="panel-body"><hr>
				<form action="" method="post">
					{{csrf_field()}}
			      <div class="form-group {{ $errors->has('mobil_id') ? ' has-error' : '' }} ">
			          <label for="mobil_id">Model</label>
			          <select name="mobil_id" class="form-control">
			          	<option value="">Pilih Model</option>
			          	@foreach($mobils as $mobil)
			          		<option value=" {{$mobil->id}} ">{{$mobil->model}}</option>
			          	@endforeach
			          </select>
			          @if($errors->has('mobil_id'))
			              <span class="help-block"> {{$errors->first('mobil_id')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('tipe') ? ' has-error' : '' }} ">
			          <label for="tipe">Tipe</label>
			          <input type="text" name="tipe" class="form-control" value="{{old('tipe')}}" placeholder="tipe">
			          @if($errors->has('tipe'))
			              <span class="help-block"> {{$errors->first('tipe')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }} ">
			          <label for="harga">Harga</label>
			          <input type="text" name="harga" class="form-control" value="{{old('harga')}}" placeholder="harga">
			          @if($errors->has('harga'))
			              <span class="help-block"> {{$errors->first('harga')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('transmisi') ? ' has-error' : '' }} ">
			          <label for="transmisi">Transmisi</label>
			          <select name="transmisi" class="form-control">
			          	<option value="Manual">Manual</option>
			          	<option value="Matic">Matic</option>
			          </select>
			          @if($errors->has('transmisi'))
			              <span class="help-block"> {{$errors->first('transmisi')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('cc') ? ' has-error' : '' }} ">
			          <label for="cc">CC</label>
			          <input type="text" name="cc" class="form-control" value="{{old('cc')}}" placeholder="cc">
			          @if($errors->has('cc'))
			              <span class="help-block"> {{$errors->first('cc')}} </span>
			          @endif
			      </div>
			      <div class="form-group">
			        <input type="submit" class="btn btn-primary btn-sm" value="publish">
			    </div>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
		<div class="panel-body" style="overflow: scroll; max-height: 800px; font-weight: bold;">
			<h4 class="text-center">Mobil Model Series</h4>
			<table class="table table-hover">
				@foreach($tipes as $tipe)
					<tr class="danger">
						<td><p>Model</p></td><td><p class="animated bounceInRight">{{$tipe->mobil->model}}</p></td>
					</tr>
					<tr>
						<td><p>Tipe</p></td><td><p class="animated bounceInRight">{{$tipe->tipe}}</p></td>
					</tr>
					<tr>
						<td><p>Harga</p></td><td><p class="animated bounceInRight">Rp {{$tipe->harga}}</p></td>
					</tr>
					<tr>
						<td><p>Transmisi</p></td><td><p class="animated bounceInRight">{{$tipe->transmisi}}</p></td>
					</tr>
					<tr>
						<td><p>CC</p></td><td><p class="animated bounceInRight">{{$tipe->cc}}</p></td>
					</tr>
					<tr>
						<td>
							<a href="/admin/series/{{$tipe->id}}/edit" class="btn btn-sm btn-warning">edit</a>
						</td>
						<td>
							<button data-toggle="collapse" data-target="#tipe_{{$tipe->id}}" class="btn btn-success btn-sm pull-right">Remove ?</button>
							<div id="tipe_{{$tipe->id}}" class="collapse">
								<a href="/admin/series/{{$tipe->id}}/delete" class="btn btn-sm btn-danger">delete</a>
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