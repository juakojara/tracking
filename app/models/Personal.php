<?php
use Illuminate\Auth\UserInterface;

class Personal extends Eloquent implements UserInterface{

	protected $table = 'personal';

	// Relacion
	public function tipoPersonal()
	{	
		return $this->belongsTo('TipoPersonal');
	}

	// Reglas
	public static $rules = array(
        'nombre' => 'required',
        'email' => 'required|email|unique:personal,email,id',
        'password' => 'required',
        'password2' => 'required|same:password'
    );

    // Validar Email UNIQUE
	public static function validate($data, $id=null){
	   $reglas = self::$rules;
	   $reglas['email'] = str_replace('id', $id, self::$rules['email']);
	   return Validator::make($data, $reglas);
	}

	// Autenticación
	public function getAuthIdentifier()
	{
	   return $this->getKey();
	}

	public function getReminderEmail()
	{
	   return $this->email;
	}

	public function getAuthPassword()
	{
	   return $this->password;
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

}