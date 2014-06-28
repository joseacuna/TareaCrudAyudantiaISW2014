@extends('layouts.maestro')


@section('content')
@if(Session::has('mensaje'))

<h2 style="color: red;">{{ Session::get('mensaje') }}</h2>

@endif
<h1>Listado de Bodegas</h1>
<ul>
    @foreach($datosBodegas as $datoBodega)
    <li>
        <?php echo $datoBodega->nombre_bodega . " " . HTML::link("bodega/update/" . $datoBodega->id_b, 'Actualizar') . " " . HTML::link('bodega/delete/'. $datoBodega->id_b,'Eliminar') ?>

    </li>
    @endforeach
</ul>
<p>
    <?php echo HTML::link("bodega/add","Agregar Bodegas") ?>
    <?php echo HTML::link("producto/productos","Ver Productos") ?>
    <?php echo HTML::link("/","Pagina Principal") ?>
</p>
@stop