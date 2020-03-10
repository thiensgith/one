@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Passport Clients</h1>
@stop

@section('content')
    <passport-clients></passport-clients>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop