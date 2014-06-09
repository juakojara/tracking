<?php

class Cliente extends Eloquent {

	protected $table = 'cliente';

  public function pagoCliente()
  {
      return $this->hasMany('PagoCliente', 'cliente_id');
  }
  
	public static $rules = array(
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required|email|unique:cliente,email,id',
        'telefono' => 'required',
        'password' => 'required',
        'password2' => 'required|same:password'
    );

  // Validar Email UNIQUE
  public static function validate($data, $id=null){
    $reglas = self::$rules;
    $reglas['email'] = str_replace('id', $id, self::$rules['email']);
    return Validator::make($data, $reglas);
  }
}