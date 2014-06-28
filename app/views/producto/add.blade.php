@extends('layouts.maestro')


@section('content')
<h1>Agregar Producto</h1>
@if(Session::has('mensaje'))

<h2 style="color: red;">{{ Session::get('mensaje') }}</h2>

@endif
<div>
{{ Form::open(array('url' => '/producto/add','method'=>'post')) }}
<p>
    {{Form::label('NombreProducto', 'Nombre Producto')}} {{Form::text('NombreProducto')}}
    {{$errors->first("NombreProducto")}}
</p>

<p>
    {{Form::label('CodigoProducto', 'Codigo Producto')}}{{Form::text('CodigoProducto')}}
    {{$errors->first("CodigoProducto")}}
</p>
<p>
    {{Form::label('PrecioNeto', 'Precio Neto ')}}{{Form::text('PrecioNeto')}}
    {{$errors->first("PrecioNeto")}}
</p>

<p>
    {{Form::label('listabodega', 'Nombre Bodega ')}}{{ Form::select('bodega', Bodega::lists('nombre_bodega', 'id_b'))}}
    {{$errors->first("bodega")}}
</p>

<p>
    {{Form::submit('Enviar')}}
</p>
<p><?php echo HTML::link("bodega/add","Agregar Bodegas") ?></p>
{{ Form::close() }}
</div>
@stop