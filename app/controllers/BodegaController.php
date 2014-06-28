<?php

class BodegaController extends BaseController {

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


     public function getBodegas(){
        $datosBodegas = Bodega::all();
        return $this->layout->content=View::make('bodega.Bodega',compact("datosBodegas"));
    }

	public function get_add()
	{
        return $this->layout->content = View::make('bodega.add');

	}

    public function post_add(){

        $inputs=Input::all();
        $reglas=array(
            'NombreBodega' =>'required|alpha|min:5',
            'CodigoBodega' => 'required|min:4',
        );
        $mensajes=array(
            "required"=>"este campo es Obligatorio",
            "min"=>"debe tener un minimo de 4 caracteres",
            "alpha"=>"solo se permiten letras en este campo",

        );
        $validar = Validator::make($inputs,$reglas,$mensajes);
        if ($validar->fails())
        {
            return Redirect::back()->withErrors($validar);
        }
        else
        {

            $bodega = new Bodega();
            $bodega->nombre_bodega = $inputs["NombreBodega"];
            $bodega->codigo_bodega = $inputs["CodigoBodega"];
            $bodega->save();
            Session::flash('mensaje', 'El registro ha sido ingresado exitosamente');
            return Redirect::to('bodega/bodegas');
        }
    }

    public function get_update($id_b =null){
        $datosBodegas = Bodega::find($id_b);
        return $this->layout->content = View::make('bodega.update', compact("datosBodegas"));

    }
    public function post_update(){

        $inputs=Input::all();
        $reglas=array(
            'NombreBodega' =>'required|alpha|min:4',
            'CodigoBodega' => 'required|min:4',
        );
        $mensajes=array(
            "required"=>"este campo es Obligatorio",
            "min"=>"debe tener un minimo de 4 caracteres",
            "alpha"=>"solo se permiten letras en este campo",

        );
        $validar = Validator::make($inputs,$reglas,$mensajes);
        if ($validar->fails())
        {
            return Redirect::back()->withErrors($validar);
        }
        else
        {
            //return View::make('bodega.add')->with('datos',Input::all());
            $bodega = Bodega::find($inputs["id_b"]);
            $bodega->nombre_bodega = $inputs["NombreBodega"];
            $bodega->codigo_bodega = $inputs["CodigoBodega"];
            $bodega->save();
            Session::flash('aviso', 'El registro ha sido ingresado exitosamente');
            return Redirect::to('bodega/bodegas');
        }

    }
    public function get_delete($id_b = null) {
        $bodega = Bodega::find($id_b);
        $bodega->productos()->delete();// borra los productos asociados a la bodega.
        $bodega->delete();
        Session::flash('aviso', 'El registro ha sido eliminado');
        return Redirect::to('bodega/bodegas');
    }

}
