TareaCrudAyudantiaISW2014
=========================

## Instalacion del Script en la base de datos en phppgadmin.

-ingrese con su usuario y contraseña
-primero crear la base de datos con el nombre que usted quiera
-haga click en la base de datos creada.
-en la parte superios al lado de esquema esta una opcion SQL seleccionela
-copie y peque el contenido del script Ayudantia.sql dentro del campo SQL de phppgadmin
-pulse ejecutar esto deberia crearle la tablas dentro de su base de datos.

## dentro de laravel

para conectar laravel con su base de datos debe dirigirse a la ruta
- /app/config y editar el archivo database.php
- y colocar dentro de el lo siguiente
- 'default' => 'pgsql',
- y configurar dentro del mismo archivo lo siguiente

'pgsql' => array(
			'driver'   => 'pgsql',
			'host'     => 'localhost',
			'database' => 'nombre base de datos',
			'username' => 'usuario',
			'password' => 'su contraseña',
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		),
-y luego guardar los cambios

## ejecutar el servidor



##rutas del programa
-trabajan con la tabla bodega
localhost:8000/bodega/bodegas --muestra el listado de bodegas
http://localhost:8000/bodega/add --agrega bodegas
-trabajan con la tabla producto
localhost:8000/producto/productos --muestra el listado de productos
localhost:8000/producto/add -- agrega productos
