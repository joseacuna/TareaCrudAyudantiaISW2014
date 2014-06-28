@extends('layouts.maestro')



@section('content')
<h1>Editar Producto</h1>
@if(Session::has('mensaje'))

<h2 style="color: #587dff;">{{ Session::get('mensaje') }}</h2>

@endif

{{ Form::open(array('url' => '/producto/update','method'=>'post')) }}
<p>
    {{Form::label('NombreProducto', 'Nombre Producto')}} {{Form::text('NombreProducto',$datosProductos['nombre_producto'])}}
    {{$errors->first("NombreProducto")}}
</p>

<p>
    {{Form::label('CodigoProducto', 'Codigo Producto')}} {{Form::text('CodigoProducto',$datosProductos['codigo_producto'])}}
    {{$errors->first("CodigoProducto")}}
</p>
<p>
    {{Form::label('PrecioNeto', 'Precio Neto')}}{{Form::text('PrecioNeto',$datosProductos['precio_neto'])}}
    {{$errors->first("PrecioNeto")}}
</p>
<p>
{{Form::label('bodega', 'Nombre Bodega ')}}{{ Form::select('bodega', Bodega::lists('nombre_bodega', 'id_b'),$datosProductos['fk_id_b'])}}
{{$errors->first("bodega")}}

<p>
    {{Form::hidden('id_p',$datosProductos['id_p'])}}
    {{Form::submit('Actualizar')}}
</p>
{{ Form::close() }}
@stop