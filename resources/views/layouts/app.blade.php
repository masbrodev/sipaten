@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel</p>
@stop

@section('css')
@if(Auth::user()->role == 'a')
<style>
a[data-role=u]{
    display: none;
}
</style>
@elseif(Auth::user()->role == 'u')
<style>
a[data-role=a]{
    display: none;
}
</style>
@endif
@stop

@section('js')
@stop
