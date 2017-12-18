@extends('layouts.app')

@section('content')
<div class="row">
<h3 class="text-center"><u> Daftar Member </u></h3><br>
    @foreach($members as $member)
	    <div class="col-md-4">
        <div class="well">

      		<div class="media index">
            <a href="/member/{{$member->slug}}" class="pull-left">
              <img src="<?php if (file_exists(public_path("member/".$member->img))) echo '/member/' ?>{{$member->avatar() }}" class="img-responsive thumbnail" width="200">
            </a>
            <a href="/member/{{$member->slug}}">
              <p>{{$member->name}}</p>
            </a>
            <p>Joined :  <small>{{$member->created_at->diffForHumans()}}</small> </p>
  				</div>
          <button data-toggle="collapse" data-target="#member_{{$member->id}}" class="btn btn-success btn-xs">option ?</button>
            <div id="member_{{$member->id}}" class="collapse"><br>
              <form action="/admin/users/{{$member->id}}/edit" method="post" class="form-inline">
              {{csrf_field()}}
                <label for="name" class="control-label">Nama</label>
                <input type="text" name="name" value="{{$member->name}}" class="form-control input-sm">
                <br><br>
                <label for="email" class="control-label">Email</label>
                <input type="email" name="email" value="{{$member->email}}" class="form-control input-sm">
                <br><br>
                <label for="status" class="control-label">Status</label>
                <input type="integer" name="status" value="{{$member->status}}" class="form-control input-sm">
                <input type="submit" value="edit" class="btn btn-warning btn-sm">
              </form><br>
              <a href="/admin/users/{{$member->id}}/delete" class="btn btn-danger btn-xs">delete</a>
            </div>
        </div>
	    </div>
    @endforeach
</div>
<div class="row">
  <div class="text-center">
    {{$members->links()}}
  </div>
</div>
    
@endsection

