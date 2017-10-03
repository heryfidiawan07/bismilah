@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
		<h4 class="text-center">Edit videos</h4>
		<form action="" method="post">
			{{csrf_field()}}
      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" value="{{$video->title}}">
          @if($errors->has('title'))
              <span class="help-block"> {{$errors->first('title')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }} ">
          <label for="link">Link</label>
          <input type="text" name="link" class="form-control" value="{{$video->link}}">
          @if($errors->has('link'))
              <span class="help-block"> {{$errors->first('link')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('mobil_id') ? ' has-error' : '' }} ">
          <label for="mobil_id">mobil</label>
          <select name="mobil_id" class="form-control">
          	<option value="{{$video->mobil->id}}">{{$video->mobil->slug}}</option>
          	@foreach($mobils as $mobil)
          		<option value=" {{$mobil->id}} ">{{$mobil->slug}}</option>
          	@endforeach
          </select>
          @if($errors->has('mobil_id'))
              <span class="help-block"> {{$errors->first('mobil_id')}} </span>
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