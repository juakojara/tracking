<?php
use Illuminate\Auth\UserInterface;

class Personal extends Eloquent implements UserInterface{

	protected $table = 'personal';

	// Relacion
	public function tipoPersonal()
	{
		return $this->hasOne('TipoPersonal', 'id');
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