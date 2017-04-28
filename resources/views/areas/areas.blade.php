@extends('layouts.app')

@section('content')
<hr>
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading text-center">Insert Areas</div>
			<div class="panel-body">
				<form action="" method="post">
					{{csrf_field()}}
			      <div class="form-group {{ $errors->has('area') ? ' has-error' : '' }} ">
			          <label for="area">Area</label>
			          <input type="text" name="area" class="form-control" value="{{old('area')}}" placeholder="area">
			          @if($errors->has('area'))
			              <span class="help-block"> {{$errors->first('area')}} </span>
			          @endif
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
				<h4 class="text-center">Areas</h4>
				<table class="table table-hover">
					@foreach($areas as $area)
						<tr>
							<td>
								{{$area->area}}
								<button data-toggle="collapse" data-target="#edit_{{$area->id}}" class="btn btn-success btn-sm pull-right">Option</button>
								<div id="edit_{{$area->id}}" class="collapse">
									<form action="/admin/area/{{$area->id}}/edit" method="post" class="form-inline">
										{{csrf_field()}}
										<input type="text" name="area" class="col-md-12 input-sm" placeholder="edit area">
										<input type="submit" class="btn btn-warning btn-sm" value="edit">
										<a href="/admin/area/{{$area->id}}/delete" class="btn btn-sm btn-danger">delete</a>
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