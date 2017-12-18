@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9">

        <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-5">
                <img src="<?php if (file_exists(public_path("member/".$user->img))) echo '/member/' ?>{{$user->avatar()}}" class="img-responsive" alt="{{$user->name}}" style="width: 100%; height: 180px;">
                <p class="text-center"><small>Joined-{{$user->created_at->diffForHumans()}}</small></p>
            </div>
            <div class="col-md-7">
                <h4>
                    <b>{{$user->name}}</b>
                    @if(Auth::check())
                        @if(Auth::user()->id == $user->id)
                            <small>@include('users.profilModal')</small>
                        @endif
                    @endif
                </h4>
                @if(session('status'))
                    <div class="alert alert-success animated bounceOutUp" style="position: absolute;">
                        <small class="">{{session('status')}}</small>
                    </div>
                @endif
                @if(Auth::check())
                    @if(Auth::user()->id == $user->id)
                        <small>@include('users.statusModal')</small>
                    @endif
                @endif
                <div  style="overflow: scroll; max-height: 130px;">
                    <p>{!!$user->profil->status!!}</p>
                </div>
            </div>
        </div>
        </div>

        <div class="text-center"><h3><u> Forum </u></h3></div>
            <br>
        @if($threads->count())
            <div class="row">@include('layouts.forums')</div>
        @else
            <p class="text-center">{{$user->name}} belum menulis di forum</p>
        @endif


    </div>
</div>

@endsection

@section('js')
    <script type="text/javascript" src="/js/get.js"></script>
    <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript" src="/js/mceStatus.js"></script>
@stop