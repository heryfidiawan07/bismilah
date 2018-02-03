@extends('layouts.app')
@section('content')
	<div class="col-md-6">
		<form method="post" action="/admin/partialstore" enctype="multipart/form-data">
			{{csrf_field()}}
			@include('layouts.upload')
			<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
				<label for="nama">Nama</label>
				<input type="text" name="nama" class="form-control">
			</div>
			<div class="form-group{{ $errors->has('panjang') ? ' has-error' : '' }}">
				<label for="panjang">Panjang</label>
				<input type="integer" name="panjang" class="form-control">
			</div>
			<div class="form-group{{ $errors->has('lebar') ? ' has-error' : '' }}">
				<label for="lebar">Lebar</label>
				<input type="integer" name="lebar" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" value="simpan" class="btn btn-primary">
			</div>
		</form>
	</div>

	<div class="col-md-6">
	@if($partials)
		@foreach($partials as $part)
			<div class="panel panel-default">
				<div class="panel-body">

					<img src="/partials/{{$part->img}}" style="width: 100px; height: 100px;" class="img-responsive">
					<button data-toggle="collapse" data-target="#part_{{$part->id}}" class="btn btn-success btn-sm pull-right">Edit</button>
						<div id="part_{{$part->id}}" class="collapse">
							<form method="post" action="/admin/partialupdate/{{$part->id}}/edit" enctype="multipart/form-data">
								{{csrf_field()}}
								@include('layouts.upload')
								<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
									<label for="nama">Nama</label>
									<input type="text" name="nama" class="form-control" value="{{$part->img}}">
								</div>
								<div class="form-group{{ $errors->has('panjang') ? ' has-error' : '' }}">
									<label for="panjang">Panjang</label>
									<input type="integer" name="panjang" class="form-control">
								</div>
								<div class="form-group{{ $errors->has('lebar') ? ' has-error' : '' }}">
									<label for="lebar">Lebar</label>
									<input type="integer" name="lebar" class="form-control">
								</div>
								<div class="form-group">
									<input type="submit" value="update" class="btn btn-warning">
								</div>
							</form>
						</div>
					
				</div>
			</div>
		@endforeach
	@endif
	</div>
@endsection
@section('js')
  <script type="text/javascript" src="/js/get.js"></script>
@stop