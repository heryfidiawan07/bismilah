<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editKarir">
Edit Iklan Anda
</button>

<!-- Modal -->
<div class="modal fade" id="editKarir" tabindex="-1" role="dialog" aria-labelledby="editiklan" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">    
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-center" id="editiklan">Edit Profil
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
        </h5>
      </div>

      <div class="modal-body">
				
				<form action="/karir/{{$iklan->id}}/edit" method="post" enctype="multipart/form-data">
					{{csrf_field()}}

		      <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
		      		<img src="{{asset('/iklanImg/'.$iklan->img )}}" width="200" class="img-responsive">
		          <label for="img">Ganti foto</label>
		          @include('layouts.upload')
		      </div>

		      <div class="form-group {{ $errors->has('hp') ? ' has-error' : '' }} ">
		          <label for="hp">Hp</label>
		          <input type="text" name="hp" class="form-control" value="{{$iklan->hp}}">
		          @if($errors->has('hp'))
		              <span class="help-block"> {{$errors->first('hp')}} </span>
		          @endif
		      </div>

		      <div class="form-group {{ $errors->has('wa') ? ' has-error' : '' }} ">
		          <label for="wa">Whatsapp</label>
		          <input type="text" name="wa" class="form-control" value="{{$iklan->wa}}">
		          @if($errors->has('wa'))
		              <span class="help-block"> {{$errors->first('wa')}} </span>
		          @endif
		      </div>

		      <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }} ">
		          <label for="deskripsi">Deskripsi</label>
		          <textarea name="deskripsi" rows="5" class="form-control">{{$iklan->deskripsi}}</textarea>
		          @if($errors->has('deskripsi'))
		              <span class="help-block"> {{$errors->first('deskripsi')}} </span>
		          @endif
		      </div>

			    <div class="form-group">
			      <input type="submit" class="btn btn-primary btn-sm" value="update">
			    </div>

				</form>

			</div>

	    <div class="modal-footer">
	      <button style="color: black !important;" type="button" class="btn btn-default" data-dismiss="modal"><b>Close</b></button>
	    </div>

		</div>
  </div>
</div>