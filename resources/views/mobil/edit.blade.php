@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
		<h4 class="panel-heading text-center">Edit profil</h4>
		<form action="" method="post">
      {{csrf_field()}}
        <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }} ">
            <label for="brand_id">Brand</label>
            <select name="brand_id" class="form-control">
              <option value="{{$mobil->brand->id}}">{{$mobil->brand->brand}}</option>
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
            <input type="text" name="depan" class="form-control" value="{{$mobil->depan}}">
            @if($errors->has('depan'))
                <span class="help-block"> {{$errors->first('depan')}} </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('samping') ? ' has-error' : '' }} ">
            <label for="samping">Url image samping</label>
            <input type="text" name="samping" class="form-control" value="{{$mobil->samping}}">
            @if($errors->has('samping'))
                <span class="help-block"> {{$errors->first('samping')}} </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('belakang') ? ' has-error' : '' }} ">
            <label for="belakang">Url image belakang</label>
            <input type="text" name="belakang" class="form-control" value="{{$mobil->belakang}}">
            @if($errors->has('belakang'))
                <span class="help-block"> {{$errors->first('belakang')}} </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('model') ? ' has-error' : '' }} ">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" value="{{$mobil->model}}">
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
@endsection