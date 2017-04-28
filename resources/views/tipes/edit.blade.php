@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
		<h4 class="panel-heading text-center">Edit Type Model</h4>
		<form action="" method="post">
      {{csrf_field()}}
        <div class="form-group {{ $errors->has('mobil_id') ? ' has-error' : '' }} ">
            <label for="mobil_id">Mobil Model</label>
            <select name="mobil_id" class="form-control">
              <option value="{{$tipe->mobil_id}}">{{$tipe->mobil->model}}</option>
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
            <input type="text" name="tipe" class="form-control" value="{{$tipe->tipe}}">
            @if($errors->has('tipe'))
                <span class="help-block"> {{$errors->first('tipe')}} </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }} ">
            <label for="harga">Harga</label>
            <input type="text" name="harga" class="form-control" value="{{$tipe->harga}}">
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
            <input type="text" name="cc" class="form-control" value="{{$tipe->cc}}">
            @if($errors->has('cc'))
                <span class="help-block"> {{$errors->first('cc')}} </span>
            @endif
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary btn-sm" value="update">
      </div>
    </form>
	</div>
</div>
@endsection