@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6">
	@if(Auth::user())
	@if(session('ads'))
    <div class="alert alert-success">
        <small class="">{{session('ads')}}</small>
    </div>
	@endif
		@if($ads)
			@include('ads.edit')
			@include('ads.adsuser')
		@else

		<h4 class="text-center">Buat iklan yang menarik</h4>
			@if(session('adswrong'))
		    <div class="alert alert-danger">
		        <small class="">{{session('adswrong')}}</small>
		    </div>
			@endif
			<form action="" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
					
					<div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
		          <label for="img">Foto</label>
		          @include('layouts.upload')
		      </div>
		      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
		          <label for="title">Judul</label>
		          <input type="text" name="title" class="form-control" value="{{old('title')}}">
		          @if($errors->has('title'))
		              <span class="help-block"> {{$errors->first('title')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} ">
		          <label for="description">Deskripsi</label>
		          <textarea type="text" name="description" class="form-control" rows="8">{{old('description')}}</textarea>
		          @if($errors->has('description'))
		              <span class="help-block"> {{$errors->first('description')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} ">
		          <label for="phone">Hp</label>
		          <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
		          @if($errors->has('phone'))
		              <span class="help-block"> {{$errors->first('phone')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('whatsapp') ? ' has-error' : '' }} ">
		          <label for="whatsapp">Whatsapp</label>
		          <input type="text" name="whatsapp" class="form-control" value="{{old('whatsapp')}}">
		          @if($errors->has('whatsapp'))
		              <span class="help-block"> {{$errors->first('whatsapp')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('coverage') ? ' has-error' : '' }} ">
		          <label for="coverage">Area Cakupan</label>
		          <input type="text" name="coverage" class="form-control" value="{{old('coverage')}}">
		          @if($errors->has('coverage'))
		              <span class="help-block"> {{$errors->first('coverage')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('durasi') ? ' has-error' : '' }} ">
		          <label for="durasi">Durasi</label>
		          <select name="durasi" class="form-control">
		          	<option value="">Atur durasi</option>
		          	<option value="10">10 Hari Rp 180.000</option>
		          	<option value="20">20 Hari Rp 340.000</option>
		          	<option value="30">30 Hari Rp 500.000</option>
		          </select>
		          @if($errors->has('durasi'))
		              <span class="help-block"> {{$errors->first('durasi')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('start') ? ' has-error' : '' }} ">
		          <label for="start">Iklan akan di mulai</label>
		          <input type="date" name="start" class="form-control" value="{{old('start')}}">
		          @if($errors->has('start'))
		              <span class="help-block"> {{$errors->first('start')}} </span>
		          @endif
		      </div>
		      <div class="form-group">
		        <input type="submit" class="btn btn-primary btn-sm" value="kirim">
		    </div>

			</form>
			@endif

		@else

			<div class="alert alert-warning">
				Anda harus <a href="/login">login !</a>
			</div>

		@endif
	</div>
</div>
@endsection
@section('js')
	<script type="text/javascript" src="/js/get.js"></script>
@stop
