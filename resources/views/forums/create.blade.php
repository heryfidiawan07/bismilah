@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
		<h4 class="text-center">buat pertanyaan atau sebuah diskusi</h4>
			<form action="" method="post">
				{{csrf_field()}}
		      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
		          <label for="title">Judul</label>
		          <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="judul">
		          @if($errors->has('title'))
		              <span class="help-block"> {{$errors->first('title')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }} ">
		          <label for="body">Body</label>
		          <textarea name="body" rows="10" class="form-control">{{old('body')}}</textarea>
		          @if($errors->has('body'))
		              <span class="help-block"> {{$errors->first('body')}} </span>
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
		        <input type="submit" class="btn btn-primary btn-sm" value="kirim">
		    </div>
			</form>
	</div>
</div>
<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="/js/mcef.js"></script>
@endsection