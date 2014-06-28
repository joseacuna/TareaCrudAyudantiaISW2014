@extends('layouts.maestro')


@section('content')

@if(Session::has('mensaje'))

<h2 style="color: red;">{{ Session::get('aviso') }}</h2>

@endif

<h1>Agregar Bodega</h1>
{{ Form::open(array('url' => '/bodega/add','method'=>'post')) }}
<p>
    {{Form::label('NombreBodega', 'Nombre Bodega')}} {{Form::text('NombreBodega')}}
    {{$errors->first("NombreBodega")}}
</p>

<p>
    {{Form::label('CodigoBodega', 'Codigo Bodega')}}{{Form::text('CodigoBodega')}}
    {{$errors->first("CodigoBodega")}}
</p>
<p>
    {{Form::submit('Enviar')}}
</p>
{{ Form::close() }}

@stop