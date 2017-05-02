@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
        <div class="panel-body">
            <span class="pull-left">
                <img width="150" src="{{$user->avatar()}}" class="img-responsive">
            </span>
            <span class="pull-left" style="margin-left: 10px;">
                <h5><b>{{$user->name}}</b></h5>
                <p><small>Joined-{{$user->created_at->diffForHumans()}}</small></p>
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
