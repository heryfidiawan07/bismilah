@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-10">
			
			@if(Auth::user())
				@if($sales)
					@include('users.editkarir')
					@if(!$bayar)
						@include('users.uploadbayar')
					@endif
					@if($bayar)
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#bukti">
						Bukti pembayaran
						</button>

						<!-- Modal -->
						<div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-lg" role="document">    
						    <div class="modal-content">
						    	<div class="modal-header">
									  <h5 class="modal-title text-center" id="exampleModalLabel"><b>Bukti pembayaran</b>
									    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									      <span aria-hidden="true">&times;</span>
									    </button>
									  </h5>
									</div>

									<div class="modal-body">
										@include('users.bukti')
									  @if($sales->iklan == 0)
											<div class="alert alert-info text-center">Menunggu konfirmasi admin</div>
										@endif
									</div>
							  </div>
							</div>
						</div>
					@endif
				@else
					@include('users.createkarir')
				@endif
			@endif
			
			@if(!Auth::user())
				<div class="alert alert-warning">
					<h4 class="text-center">Maaf anda harus <a href="/login">login</a> untuk mendaftar jadi marketing</h4>
				</div>
			@endif

		</div>
	</div>
@endsection
@section('js')
	<script type="text/javascript" src="/js/areas.js"></script>
	<script type="text/javascript" src="/js/get.js"></script>
@stop