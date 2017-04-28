@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10">
	@if(Auth::user())
		<h4 class="text-center">Masukan anda sangat berarti untuk kami.</h4>
		@include('layouts.flash')
			<form action="" method="post">
				{{csrf_field()}}
		      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
		          <label for="title">Subject</label>
		          <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="subject">
		          @if($errors->has('title'))
		              <span class="help-block"> {{$errors->first('title')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} " style="display: none;">
		          <label for="email">Alamat email anda</label>
		          <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="{{$user->email}}">
		          @if($errors->has('email'))
		              <span class="help-block"> {{$errors->first('email')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }} ">
		          <label for="body">Isi kritik dan saran anda</label>
		          <textarea name="body" rows="10" class="form-control">{{old('body')}}</textarea>
		          @if($errors->has('body'))
		              <span class="help-block"> {{$errors->first('body')}} </span>
		          @endif
		      </div>
		      <div class="form-group {{ $errors->has('g-recaptcha') ? ' has-error' : '' }} ">
              <label for="password-confirm">Validasi</label>

              <div class="controll-label">
                  <div class="g-recaptcha" data-sitekey="6Lcu_hwUAAAAABsPEn0ypqHoivEzkXloff_2eEfo" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
              </div>
          </div>
		      <div class="form-group">
		        <input type="submit" class="btn btn-primary btn-sm" value="kirim">
		    	</div>
			</form>
		@else
			<div class="alert alert-warning">
				<h4 class="text-center">Maaf anda harus <a href="/login">login</a> untuk menulis kritik dan saran</h4>
			</div>
		@endif
	</div>
</div>
@endsection