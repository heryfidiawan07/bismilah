@extends('layouts.app')

@section('content')
<div class="row">
<h3 class="text-center"><u> Daftar Pesan Masuk </u></h3><br>
    @foreach($pesans as $pesan)
	    <div class="col-md-6">
        <div class="well">

      		<div class="media frm">
            <p>{{$pesan->email}} - di kirim :  <small class="pull-right">{{$pesan->created_at}}</small></p>
            <p>{{$pesan->alamat}}</p>
            <p>{{$pesan->hp}} - {{$pesan->wa}}</p>
            <div  style="overflow: scroll; max-height:100px;">
              <p>{!!nl2br($pesan->pesan)!!}</p>
            </div>
  				</div>

        </div>
	    </div>
    @endforeach
</div>

<div class="row">
  <div class="text-center">
    {{$pesans->links()}}
  </div>
</div>
    
@endsection

