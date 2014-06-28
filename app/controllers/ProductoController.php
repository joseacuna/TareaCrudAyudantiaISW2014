<?php

class ProductoController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    protected $layout = 'layouts.maestro';

    public function get_productos(){
    $datosProductos = Producto::all();
    return $this->layout->content=View::make('producto.Producto',compact("datosProductos"));
    }
	public function get_add()
	{
        return $this->layout->content = View::make('producto.add');
	}

    public function post_add(){

        $inputs=Input::all();
        $reglas=array(
            'NombreProducto' =>'required|min:4',
            'CodigoProducto' => 'required|min:4',
            'PrecioNeto' => 'required|numeric',
            'bodega'=>'required',
        );
        $mensajes=array(
            "required"=>"este campo es Obligatorio",
            "min"=>"debe tener un minimo de 4 caracteres"
        );
        $validar = Validator::make($inputs,$reglas,$mensajes);
        if ($validar->fails())
        {
            return Redirect::back()->withErrors($validar);
        }
        else
        {
            $producto = new Producto();
            $producto->nombre_producto = $inputs["NombreProducto"];
            $producto->codigo_producto = $inputs["CodigoProducto"];
            $producto->precio_neto= $inputs["PrecioNeto"];
            $producto->fk_id_b = $inputs["bodega"];
            $producto->save();
            Session::flash('mensaje', 'El registro ha sido ingresado exitosamente');
            return Redirect::to('producto/productos');
        }
    }

    public function get_update($id_p =null){
        $datosProductos = Producto::find($id_p);
        return $this->layout->content = View::make('producto.update', compact("datosProductos"));

    }


    public function post_update(){

    $inputs=Input::all();
    $reglas=array(
        'NombreProducto' =>'required|min:4',
        'CodigoProducto' => 'required|min:4',
        'PrecioNeto' => 'required|numeric',
    );
    $mensajes=array(
        "required"=>"este campo es Obligatorio",
        "min"=>"debe tener un minimo de 4 caracteres",
        "numeric"=>"el campo debe ser numerico",
    );
    $validar = Validator::make($inputs,$reglas,$mensajes);
    if ($validar->fails())
    {
        return Redirect::back()->withErrors($validar);
    }
    else
    {
        //return View::make('producto.update')->with('datosProductos',Input::all());
        $producto = Producto::find($inputs["id_p"]);
        $producto->nombre_producto = $inputs["NombreProducto"];
        $producto->codigo_producto = $inputs["CodigoProducto"];
        $producto->precio_neto= $inputs["PrecioNeto"];
        $producto->fk_id_b = $inputs["bodega"];
        $producto->save();
        Session::flash('mensaje', 'El registro ha sido ingresado exitosamente');
        return Redirect::to('producto/productos');
    }

}
    public function get_delete($id_p = null) {
        $bodega = Bodega::find($id_p);
        $bodega->delete();
        Session::flash('aviso', 'El registro ha sido eliminado');
        return Redirect::to('bodega/bodegas');
    }




}
