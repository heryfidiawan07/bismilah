@extends('layouts.app')

@section('content')
<div class="row">
    <div class="text-center">
        <li class="admin">
            <a class="btn btn-primary btn-lg" href="/admin/brands">Brands panel</a>
        </li>
        <li class="admin">
            <a class="btn btn-success btn-lg" href="/admin/areas">Areas panel</a>
        </li>
        <li class="admin">
            <a class="btn btn-info btn-lg" href="/admin/marketings">Marketings Panel</a>
        </li>
        <li class="admin">
            <a class="btn btn-warning btn-lg" href="/admin/article/create">Articles Panel</a>
        </li>
        <li class="admin">
            <a class="btn btn-danger btn-lg" href="/admin/mobils">Mobils Panel</a>
        </li>
        <li class="admin">
            <a class="btn btn-primary btn-lg" href="/admin/spesifikasi/create">Spesifikasi Panel</a>
        </li>
        <li class="admin">
            <a class="btn btn-danger btn-lg" href="/admin/kritik-dan-saran/">Kritik dan saran</a>
        </li>
        <li class="admin">
            <a class="btn btn-success btn-lg" href="/admin/checkout">Marketing CheckOut</a>
        </li>
        <li class="admin">
            <a class="btn btn-warning btn-lg" href="/admin/users">Users panel</a>
        </li>
        <li class="admin">
            <a class="btn btn-info btn-lg" href="/admin/video/create">Videos panel</a>
        </li>
    </div>
</div>
@endsection
