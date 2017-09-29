@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
		<h4 class="text-center">Create videos</h4>
		<form action="" method="post">
			{{csrf_field()}}
      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="judul">
          @if($errors->has('title'))
              <span class="help-block"> {{$errors->first('title')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }} ">
          <label for="link">Link</label>
          <input type="text" name="link" class="form-control" value="{{old('link')}}" placeholder="link video">
          @if($errors->has('link'))
              <span class="help-block"> {{$errors->first('link')}} </span>
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
	    <div class="form-group">
	      <input type="submit" class="btn btn-primary btn-sm" value="publish">
	    </div>
		</form>
	</div>
</div>
@endsection