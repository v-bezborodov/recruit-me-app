@extends('errors.layout')

@section('title', 'Not Found')
@section('code', '404')
@section('message')
<div class="container">
    <img src="{{ asset('/img/404.png') }}" alt="oops!">
</div>
@stop

