@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
        <div class="panel-body">
            <span class="pull-left">
                <img width="150px" src="{{$user->avatar()}}" class="img-responsive">
            </span>
            <span class="pull-left" style="margin-left: 20px;">
                <h4 class="media-heading"><b>{{$user->name}}</b></h4>
                <p>Joined :  {{$user->created_at->diffForHumans()}} </p>
            </span>
        </div>
        </div>
    </div>
</div>

<div class="row"><div class="text-center"><h3><u> Forum </u></h3></div></div>
    <br>
@if($threads->count())
    <div class="row">@include('layouts.forums')</div>
@else
    <p class="text-center">{{$user->name}} belum menulis di forum</p>
@endif
<div class="row"><div class="text-center">{{$threads->links()}} </div></div>

@endsection
