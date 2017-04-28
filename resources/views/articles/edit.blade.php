@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
		<h4 class="text-center">Edit article</h4>
		<form action="" method="post">
			{{csrf_field()}}
      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" value="{{$article->title}}">
          @if($errors->has('title'))
              <span class="help-block"> {{$errors->first('title')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
          <label for="img">Url image</label>
          <input type="text" name="img" class="form-control" value="{{$article->img}}">
          @if($errors->has('img'))
              <span class="help-block"> {{$errors->first('img')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }} ">
          <label for="body">Body</label>
          <textarea name="body" rows="20" class="form-control">{{$article->body}}</textarea>
          @if($errors->has('body'))
              <span class="help-block"> {{$errors->first('body')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }} ">
          <label for="brand_id">Brand</label>
          <select name="brand_id" class="form-control">
          	<option value="{{$article->brand->id}}">{{$article->brand->brand}}</option>
          	@foreach($brands as $brand)
          		<option value=" {{$brand->id}} ">{{$brand->brand}}</option>
          	@endforeach
          </select>
          @if($errors->has('brand_id'))
              <span class="help-block"> {{$errors->first('brand_id')}} </span>
          @endif
      </div>
	    <div class="form-group">
	      <input type="submit" class="btn btn-primary btn-sm" value="update">
	    </div>
		</form>
	</div>
</div>
<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="/js/mce.js"></script>
@endsection