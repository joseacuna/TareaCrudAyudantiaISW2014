<?php
class Producto extends Eloquent {
protected $primaryKey='id_p';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
protected $table = 'producto';
public $timestamps = false;

public function bodega(){
return $this->belongsTo('Bodega');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
}
}