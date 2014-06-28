@extends('layouts.maestro')


@section('content')
@if(Session::has('mensaje'))

<h2 style="color: #587dff;">{{ Session::get('mensaje') }}</h2>

@endif
<h1>Listado de Productos</h1>
<ul>
    @foreach($datosProductos as $datoProducto)
    <li>
        <?php echo $datoProducto->nombre_producto ." ".$datoProducto->codigo_producto. " " . HTML::link("producto/update/" . $datoProducto->id_p, 'Actualizar') . " " . HTML::link('producto/delete/'. $datoProducto->id_p,'Eliminar') ?>

    </li>
    @endforeach
</ul>
<p>
    <?php echo HTML::link("bodega/bodegas","Ver Bodegas") ?>
    <?php echo HTML::link("producto/add","Agregar Productos") ?>
    <?php echo HTML::link("/","Pagina Principal") ?>
</p>
@stop