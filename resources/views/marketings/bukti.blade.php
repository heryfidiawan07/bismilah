@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-10">
	     @include('users.bukti')
      <br>
    <a href="/admin/marketings" class="btn btn-success">Edit status iklan min</a>
    <a href="/admin/pembayaran/delete/{{$bayar->id}}" class="btn btn-danger">delete</a>
  </div>
</div>
@endsection
