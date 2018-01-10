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
		          <label for="durasi">Durasi - <small><i style="color: green;">Promo</i></small></label>
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
					<div class="form-group {{ $errors->has('area_id') ? ' has-error' : '' }} ">
	          <label for="area_id">Pembayaran</label>
	          <a type="button" href="#checkout" data-toggle="collapse" data-target="#transfer" class="form-control text-center" style="text-decoration: none; color: black;">Pembayaran</a>
	          <div id="transfer" class="collapse">
	          	<div class="panel panel-default">
	          	<div class="panel-body" style="background-color: #f2f2f2;">
		          	<div class="col-sm-6">
		          		<p><h4 class="text-center">Bank Transfer</h4><br>
		          			Harap upload bukti pembayaran, team kami akan segera memproses akun anda secepatnya.<br><br>
		          			<small><i style="color: red;">Note : Tombol upload bukti pembayaran akan terlihat setelah anda berhasil melakukan register Ads Account.</i></small>
		          		</p>
		          	</div>
		          	<div class="col-sm-6 alert alert-success">
		          		<h4 class="text-center">Bank Transfer</h4>
		          		<table class="table">
										<tr>
											<td><p>BCA</p></td><td><p><b>8730342072</b></p></td>
										</tr>
										<tr>
											<td><p>A/N</p></td><td><p><b>Heri Fidiawan</b></p></td>
										</tr>
										<tr>
											<td><p>10 Hari</p></td><td><p><b>Rp 180.000 </b></p></td>
										</tr>
										<tr>
											<td><p>20 Hari</p></td><td><p><b>Rp 340.000 </b></p></td>
										</tr>
										<tr>
											<td><p>30 Hari</p></td><td><p><b>Rp 500.000 </b></p></td>
										</tr>
									</table>
		          	</div>
		          </div>
		          </div>
			      </div>
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
	<div class="col-md-6">
		<h4 class="text-center"><b>Kenapa harus beriklan ?</b></h4>
		<p>
			Iklan atau promosi di internet saat ini bukan suatu hal yang asing lagi, karena semakin hari pengguna internet khususnya di Indonesia terus bertambah. Iklan sudah muncul sejak era media cetak, baliho, kemudian media elektronik (TV dan radio) yang sampai saat ini masih dipakai. Prinsip “promosi” akan efektif jika ditempatkan di suatu tempat yang dikunjungi, diketahui, dan dilihat banyak orang. Seperti media massa (koran/majalah), jalan raya, pasar, event dsb adalah tempat-tempat yang biasa dipilih untuk memasang iklan.
		</p>
		<p><b>Kelebihan beriklan di Internet</b></p>
		<p>Tentu saja banyak kelebihan dengan beriklan atau promosi di internet antara lain:</p>
		<p><b>- Murah,</b> dibandingkan dengan beriklan di TV, radio dan surat kabar, beriklan di internet dengan media Google, Facebook, iklan baris, dan marketplace ternyata bisa lebih murah.</p>
		<p><b>- Akses yang luas,</b> jika beriklan dengan menggunakan bahasa Indonesia kemungkinan bisa diakses di seluruh wilayah Indonesia, jika menggunakan bahasa Inggris kemungkinan bisa diakses lebih luas di seluruh dunia yang mayoritas penduduknya mengunakan bahasa Inggris.</p>
		<p><b>- Target yang spesifik,</b> layanan iklan seperti contohnya di Google dan Facebook semakin menekankan tayangan iklan pada target pasar yang potensial berdasar spesifikasi keyword, jenes kelamin, usia, dan minat yang bisa di deteksi melalui cookies di Google dan biodata di Facebook.</p>
	</div>
</div>
@endsection
@section('js')
	<script type="text/javascript" src="/js/get.js"></script>
@stop
