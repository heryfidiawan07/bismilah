@extends('layouts.app')

@section('content')
<div class="row">
<h3 class="text-center"><u> Daftar Member </u></h3><br>
    @foreach($members as $member)
	    <div class="col-md-4">
          <div class="well" style="min-height: 200px;">
            <div class="col-md-6">
              <a href="/member/{{$member->slug}}" style="color: black;">
                <img src="<?php if (file_exists(public_path("member/".$member->img))) echo '/member/' ?>{{$member->avatar()}}" class="img-responsive" alt="{{$member->name}}" style="width: auto; height: 150px;">
              </a>
                <p class="text-center"><small>Joined : {{$member->created_at->diffForHumans()}}</small></p>
            </div>
            <div class="col-md-6">
              <a href="/member/{{$member->slug}}" style="color: black;"><p>{{$member->name}}</p></a>
              @if(count($member->profil))
                <div style="overflow: scroll; max-height: 130px;">
                    {!!$member->profil->status!!}
                </div>
              @endif
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

