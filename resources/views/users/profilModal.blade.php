<a href="#" type="button" data-toggle="modal" data-target="#profilModal">
    <i class="fa fa-pencil" aria-hidden="true"></i>Edit profil
</a>
<!-- Modal -->
<div class="modal right fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close &#62;</span></button>
				<h4 class="modal-title" id="myModalLabel" style="color: white;">Edit Profil</h4>
			</div>

			<div class="modal-body">
				<form method="post" action="/member/gantiNama/{{Auth::user()->id}}" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} ">
		          <label for="name">Sunting Nama</label>
		          <input type="text" name="name" class="form-control input-sm" value="{{ old('name') }}" required autofocus>
		          @if($errors->has('name'))
                <span class="help-block"> {{$errors->first('name')}} </span>
              @endif
		      </div>
		      <button type="submit" class="btn btn-success btn-xs">update</button>
				</form>
				<hr>
				<form method="post" action="/member/gantiFoto/{{Auth::user()->id}}" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
		          <label for="img">Ubah Foto Profil</label>
		          @include('layouts.upload')
		      </div>
		      <button type="submit" class="btn btn-success btn-xs">update</button>
				</form>
			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->
