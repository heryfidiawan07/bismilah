@extends('layouts.app')

@section('content')
<hr>
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading text-center">Create marketings</div>
			<div class="panel-body">
				<form action="" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
			      <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} ">
			          <label for="name">Nama</label>
			          <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="nama">
			          @if($errors->has('name'))
			              <span class="help-block"> {{$errors->first('name')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
			          <label for="img">Foto</label>
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
			          <label for="hp1">Hp 1</label>
			          <input type="text" name="hp1" class="form-control" value="{{old('hp1')}}" placeholder="Hp 1">
			          @if($errors->has('hp1'))
			              <span class="help-block"> {{$errors->first('hp1')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('hp2') ? ' has-error' : '' }} ">
			          <label for="hp2">Hp 2</label>
			          <input type="text" name="hp2" class="form-control" value="{{old('hp2')}}" placeholder="Hp 2">
			          @if($errors->has('hp2'))
			              <span class="help-block"> {{$errors->first('hp2')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('tentang') ? ' has-error' : '' }} ">
			          <label for="tentang">Tentang</label>
			          <textarea name="tentang" rows="5" class="form-control">{{old('tentang')}}</textarea>
			          @if($errors->has('tentang'))
			              <span class="help-block"> {{$errors->first('tentang')}} </span>
			          @endif
			      </div>
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
			      <div class="form-group {{ $errors->has('area_id') ? ' has-error' : '' }} ">
			          <label for="area_id">Area</label>
			          <select name="area_id" class="form-control">
			          	<option value="">Pilih Area</option>
			          	@foreach($areas as $area)
			          		<option value=" {{$area->id}} ">{{$area->area}}</option>
			          	@endforeach
			          </select>
			          @if($errors->has('area_id'))
			              <span class="help-block"> {{$errors->first('area_id')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }} ">
			          <label for="user_id">User</label>
			          <select name="user_id" class="form-control">
			          	<option value="">Pilih User</option>
			          	@foreach($users as $user)
			          		<option value=" {{$user->id}} ">{{$user->name}}</option>
			          	@endforeach
			          </select>
			          @if($errors->has('user_id'))
			              <span class="help-block"> {{$errors->first('user_id')}} </span>
			          @endif
			      </div>
			      <div class="form-group {{ $errors->has('iklan') ? ' has-error' : '' }} ">
			          <label for="iklan">Iklan</label>
			          <select name="iklan" class="form-control">
			          	<option value="">Status iklan</option>
			          		<option value="0">0</option>
			          		<option value="1">1</option>
			          </select>
			          @if($errors->has('iklan'))
			              <span class="help-block"> {{$errors->first('iklan')}} </span>
			          @endif
			      </div>
			      <div class="form-group">
			        <input type="submit" class="btn btn-primary btn-sm" value="post">
			   		</div>
				</form>		
			</div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-body" style="overflow: scroll; max-height: 670px;">
				<h4 class="text-center">Marketings</h4>
				<table class="table table-hover">
					@foreach($marketings as $sales)
						<tr><td><img src="{{asset('/marketingImg/'.$sales->img )}}" class="img-responsive" width="150" height="150"></td></tr>
						<tr><td>{{$sales->name}}</td></tr>
						<tr><td>{{$sales->pt}}</td></tr>
						<tr><td>{{$sales->alamat}}</td></tr>
						<tr><td>
							<a href="tel://+62{{$sales->hp1}}" class="btn btn-primary">0{{$sales->hp1}}</a>
							<a href="tel://+62{{$sales->hp2}}" class="btn btn-success">0{{$sales->hp2}}</a>
						</td></tr>
						<tr><td>{!!nl2br($sales->tentang)!!}</td></tr>
						<tr><td>
							<a href="/{{$sales->brand->slug}}" class="thumbnail text-center">
								<b>{{$sales->brand->brand}}</b>
							</a>
						</td></tr>
						<tr><td>{{$sales->area->area}}</td></tr>
						<tr><td>{{$sales->iklan}}</td></tr>
						<tr>
							<td>
								<a href="/marketing/{{$sales->slug}}" class="btn btn-sm btn-primary">profil</a>
								<a href="/admin/marketing/{{$sales->id}}/edit" class="btn btn-sm btn-warning">edit</a>
								<button data-toggle="collapse" data-target="#rem_{{$sales->id}}" class="btn btn-success btn-sm pull-right">Remove ?</button>
								<div id="rem_{{$sales->id}}" class="collapse">
									<a href="/admin/marketing/{{$sales->id}}/delete" class="btn btn-sm btn-danger pull-right">delete</a>
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
@section('js')<script type="text/javascript" src="/js/get.js"></script>@stop