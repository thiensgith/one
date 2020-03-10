@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Passport Personal Access Tokens</h1>
@stop

@section('content')
   <passport-personal-access-tokens></passport-personal-access-tokens>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop