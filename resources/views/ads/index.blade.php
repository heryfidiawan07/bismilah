@extends('layouts.app')

@section('content')
<div class="row">
<h3 class="text-center"><u>ADS</u></h3><br>
    
    @foreach($ads as $ad)
	    <div class="col-md-4">
        <div class="well">

        	<div class="text-center"><img src="/ads/{{$ad->img}}" class="img-responsive"></div>
          <div class="text-center">{!! nl2br($ad->description) !!}</div>
          <div class="text-center">
            <a href="tel://+62{{$ad->phone}}" class="fa fa-whatsapp btn btn-sm btn-primary"> 0{{$ad->phone}}</a>
            <a href="https://api.whatsapp.com/send?phone=62{{$ad->whatsapp}}&text={{$ad->title}}" class="fa fa-whatsapp btn btn-sm btn-success"> 0{{$ad->whatsapp}}</a>
          </div>
          <hr>
          <a href="/resiIklan/{{$ad->resi}}">Bukti Pembayaran</a><br>
          <button data-toggle="collapse" data-target="#ads_{{$ad->user_id}}" class="btn btn-success btn-xs">Option ?</button>
          <div id="ads_{{$ad->user_id}}" class="collapse"><br>
            <form action="/admin/advertising/{{$ad->id}}/verifikasi" method="post">
              {{csrf_field()}}
              <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }} ">
                  <label for="status">Status</label>
                  <input type="integer" name="status" class="form-controll" value="{{$ad->status}}">
                  @if($errors->has('status'))
                      <span class="help-block"> {{$errors->first('status')}} </span>
                  @endif
              </div>
              <div class="form-group {{ $errors->has('perpanjang') ? ' has-error' : '' }} ">
                  <label for="perpanjang">Perpanjang</label>
                  <input type="integer" name="perpanjang" class="form-controll" value="{{$ad->perpanjang}}">
                  @if($errors->has('perpanjang'))
                      <span class="help-block"> {{$errors->first('perpanjang')}} </span>
                  @endif
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="kirim">
              </div>
            </form>
          </div>
        </div>

        </div>
	    </div>
    @endforeach

</div>
<div class="row">
  <div class="text-center">
    {{$ads->links()}}
  </div>
</div>
    
@endsection

