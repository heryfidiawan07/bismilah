@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
		<h4 class="text-center">Create spesifikasi</h4>
		<form action="" method="post">
			{{csrf_field()}}
      <div class="form-group {{ $errors->has('mobil_id') ? ' has-error' : '' }} ">
          <label for="mobil_id">Model</label>
          <select name="mobil_id" class="form-control">
            <option value="">Pilih model</option>
            @foreach($mobils as $mobil)
              <option value="{{$mobil->id}}">{{$mobil->model}}</option>
            @endforeach
          </select>
          @if($errors->has('mobil_id'))
              <span class="help-block"> {{$errors->first('mobil_id')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="judul">
          @if($errors->has('title'))
              <span class="help-block"> {{$errors->first('title')}} </span>
          @endif
      </div>
      <div class="form-group {{ $errors->has('speks') ? ' has-error' : '' }} ">
          <label for="speks">Spesifikasi</label>
          <textarea name="speks" rows="20" class="form-control">{{old('speks')}}</textarea>
          @if($errors->has('speks'))
              <span class="help-block"> {{$errors->first('speks')}} </span>
          @endif
      </div>
	    <div class="form-group">
	      <input type="submit" class="btn btn-primary btn-sm" value="publish">
	    </div>
		</form>
	</div>
</div>
<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="/js/mce.js"></script>
@endsection