@extends('layouts.maestro')


@section('content')
<h1>Actualizar Bodega</h1>
@if(Session::has('mensaje'))

<h2 style="color: #587dff;">{{ Session::get('mensaje') }}</h2>

@endif

{{ Form::open(array('url' => 'bodega/update','method'=>'post')) }}
<p>
    {{Form::label('NombreBodega', 'Nombre Bodega')}} {{Form::text('NombreBodega',$datosBodegas['nombre_bodega'])}}
    {{$errors->first("NombreBodega")}}
</p>

<p>
    {{Form::label('CodigoBodega', 'Codigo Bodega')}} {{Form::text('CodigoBodega',$datosBodegas['codigo_bodega'])}}
      {{$errors->first("CodigoBodega")}}
</p>
<p>
    {{Form::hidden('id_b',$datosBodegas['id_b'])}}
    {{Form::submit('Actualizar')}}
</p>
{{ Form::close() }}
@stop