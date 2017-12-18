@extends('layouts.app')

@section('content')
<div class="row">
<h3 class="text-center"><u> Daftar Member </u></h3><br>
    @foreach($members as $member)
	    <div class="col-md-4">
        <a href="/member/{{$member->slug}}">
          <div class="well" style="min-height: 180px; color: black;">
      		  <div class="col-md-6">
                <img src="<?php if (file_exists(public_path("member/".$member->img))) echo '/member/' ?>{{$member->avatar()}}" class="img-responsive" alt="{{$member->name}}" style="width: 100%; height: 130px;">
              <div class="caption text-center">
                <small>Joined : {{$member->created_at->diffForHumans()}}</small>
              </div>
            </div>
            <div class="col-md-6">
              <p>{{$member->name}}</p>
              <div  style="overflow: scroll; max-height: 115px;">
                <p>{!!$member->profil->status!!}</p>
              </div>
            </div>
          </div>
        </a>
	    </div>
    @endforeach
</div>
<div class="row">
  <div class="text-center">
    {{$members->links()}}
  </div>
</div>
    
@endsection

