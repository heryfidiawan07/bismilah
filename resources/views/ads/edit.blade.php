<a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#adsEdit">
    Edit >>
</a>
<hr>
<!-- Modal -->
<div class="modal right fade" id="adsEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close &#62;</span></button>
      </div>

      <div class="modal-body">
        
        <form action="/advertising/{{$ads->id}}/update" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
          
          <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }} ">
              <label for="img">Foto</label>
              @include('layouts.upload')
          </div>
          <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
              <label for="title">Judul</label>
              <input type="text" name="title" class="form-control" value="{{$ads->title}}">
              @if($errors->has('title'))
                  <span class="help-block"> {{$errors->first('title')}} </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} ">
              <label for="description">Deskripsi</label>
              <textarea type="text" name="description" class="form-control" rows="8">{{$ads->description}}</textarea>
              @if($errors->has('description'))
                  <span class="help-block"> {{$errors->first('description')}} </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} ">
              <label for="phone">Hp</label>
              <input type="text" name="phone" class="form-control" value="0{{$ads->phone}}">
              @if($errors->has('phone'))
                  <span class="help-block"> {{$errors->first('phone')}} </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('whatsapp') ? ' has-error' : '' }} ">
              <label for="whatsapp">Whatsapp</label>
              <input type="text" name="whatsapp" class="form-control" value="0{{$ads->whatsapp}}">
              @if($errors->has('whatsapp'))
                  <span class="help-block"> {{$errors->first('whatsapp')}} </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('coverage') ? ' has-error' : '' }} ">
              <label for="coverage">Area Cakupan</label>
              <input type="text" name="coverage" class="form-control" value="{{$ads->coverage}}">
              @if($errors->has('coverage'))
                  <span class="help-block"> {{$errors->first('coverage')}} </span>
              @endif
          </div>
          @if($ads->satatus == 0)
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
              <input type="date" name="start" class="form-control">
              @if($errors->has('start'))
                  <span class="help-block"> {{$errors->first('start')}} </span>
              @endif
          </div>
          @endif
          <div class="form-group">
            <input type="submit" class="btn btn-primary btn-sm" value="kirim">
          </div>

        </form>

      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->