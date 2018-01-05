@extends('layouts.app')

@section('content')
<hr>
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading text-center">Insert Brands</div>
			<div class="panel-body">
				<form action="" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
			      <div class="form-group {{ $errors->has('brands') ? ' has-error' : '' }} ">
			          <label for="brand">Brand</label>
			          <input type="text" name="brand" class="form-control" value="{{old('brand')}}" placeholder="brands">
			          @if($errors->has('brand'))
			              <span class="help-block"> {{$errors->first('brand')}} </span>
			          @endif
			      </div>
			      <div class="form-group">
			        @include('layouts.upload')
			    	</div>
			      <div class="form-group">
			        <input type="submit" class="btn btn-primary btn-sm" value="post">
			    	</div>
				</form>		
			</div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4 class="text-center">Brands</h4>
				<table class="table table-hover">
					@foreach($brands as $brand)
						<tr>
							<td>
								{{$brand->brand}}
								<button data-toggle="collapse" data-target="#edit_{{$brand->id}}" class="btn btn-success btn-sm pull-right">Option</button>
									<div id="edit_{{$brand->id}}" class="collapse">
										<form action="/admin/brand/{{$brand->id}}/edit" method="post" class="form-inline" enctype="multipart/form-data">
											{{csrf_field()}}<br>
											<input type="text" name="brand" class="col-md-12 input-sm" placeholder="edit brand">
								      @include('layouts.upload')
											<input type="submit" class="btn btn-warning btn-sm" value="edit">
											<a href="/admin/brand/{{$brand->id}}/delete" class="btn btn-sm btn-danger">delete</a>
										</form>
								</div>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
	<script type="text/javascript" src="/js/get.js"></script>
@stop