@extends('layouts.app')

@section('url') http://kampusmobil.com/iklan @stop
@section('title') Iklankan produk anda atau daftar jadi marketing mobil. @stop
@section('description')
	Kampus mobil memberikan layanan marketing karir untuk anda. Terdapat juga fitur iklan internal atau iklan di media sosial.Promosikan kelebihan dan pelayanan anda.
@stop
@section('image') http://kampusmobil.com/largekampusmobil.png @stop

@section('content')
	<div class="row">
		<div class="col-md-10">
		@include('layouts.flash')
			
			@if(Auth::user())
				@if($iklan)
					@include('users.editiklan')
					@if(!$bukti)
						@include('users.uploadbayariklan')
					@endif
					@if($bukti)
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#bukti">
						Bukti pembayaran Iklan
						</button>

						<!-- Modal -->
						<div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="iklan" aria-hidden="true">
						  <div class="modal-dialog modal-lg" role="document">    
						    <div class="modal-content">
						    	<div class="modal-header">
									  <h5 class="modal-title text-center" id="iklan"><b>Bukti pembayaran</b>
									    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									      <span aria-hidden="true">&times;</span>
									    </button>
									  </h5>
									</div>

									<div class="modal-body">
										@include('users.iklanbukti')
									  @if($iklan->status == 0)
											<div class="alert alert-info text-center">Menunggu konfirmasi admin</div>
										@endif
									</div>
							  </div>
							</div>
						</div>
					@endif
				@else
					@include('users.createiklan')
				@endif
			@endif
			
			@if(!Auth::user())
				<div class="alert alert-warning">
					<h4 class="text-center">Untuk mempromosikan produk, anda harus <a href="/register">register</a> / <a href="/login">login</a> terlebih dahulu.</h4>
				</div>
			@endif

		</div>
	</div>
@endsection
@section('js')
	<script type="text/javascript" src="/js/get.js"></script>
@stop