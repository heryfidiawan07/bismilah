@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
		<h4 class="panel-heading text-center">Edit marketings</h4>
		<form action="" method="post" enctype="multipart/form-data">
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
      <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }} ">
          <label for="brand_id">Brand</label>
          <select name="brand_id" class="form-control">
          	<option value="{{$sales->brand->id}}">{{$sales->brand->brand}}</option>
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
          	<option value="{{$sales->area->id}}">{{$sales->area->area}}</option>
          	@foreach($areas as $area)
          		<option value=" {{$area->id}} ">{{$area->area}}</option>
          	@endforeach
          </select>
          @if($errors->has('area_id'))
              <span class="help-block"> {{$errors->first('area_id')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('iklan') ? ' has-error' : '' }} ">
          <label for="iklan">Iklan</label>
          <select name="iklan" class="form-control">
          	<option value="{{$sales->iklan}}">{{$sales->iklan}}</option>
          	<option value="0">0</option>
          	<option value="1">1</option>
          </select>
          @if($errors->has('iklan'))
              <span class="help-block"> {{$errors->first('iklan')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }} ">
          <label for="user_id">User</label>
          <select name="user_id" class="form-control">
            <option value="{{$sales->user->id}}">{{$sales->user->name}}</option>
            @foreach($users as $user)
              <option value=" {{$user->id}} ">{{$user->name}}</option>
            @endforeach
          </select>
          @if($errors->has('user_id'))
              <span class="help-block"> {{$errors->first('user_id')}} </span>
          @endif
      </div>
	    <div class="form-group">
	      <input type="submit" class="btn btn-primary btn-sm" value="update">
	    </div>
		</form>
	</div>
</div>
@endsection
@section('js')<script type="text/javascript" src="/js/get.js"></script>@stop
