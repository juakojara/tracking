<?php

class PersonalController extends \BaseController {

	private $autorizado;
	public function __construct()
	{
	    $this->autorizado = (Auth::check() and Auth::user()->tipo_personal_id != 2);
	} 

	/**
	 * Lista todos los clientes.
	 */
	public function index()
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$usuarios = Personal::paginate(10);
		return View::make('admin.personal.index', array('usuarios' => $usuarios));
	}


	/**
	 * Mostrar Formulario de registro
	 */
	public function create()
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
   		$personal = new Personal();
   		// Tipos de Personal, como Lists para llenar select.
   		$tipos = TipoPersonal::lists('descripcion', 'id');
		return View::make('admin.personal.create', array('personal' => $personal, 'tipos' => $tipos));
	}


	/**
	 * Insertar nuevo registro en la DB
	 */
	public function store()
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		// Capturar datos
		$personal = new Personal();
		$personal->email = Input::get('email');
		$personal->password = Hash::make(Input::get('password'));
		$personal->nombre = Input::get('nombre');
		$personal->tipo_personal_id = Input::get('tipo');
		
		// Validar datos
		$validator = Personal::validate(array(
		    'nombre' => Input::get('nombre'),
		    'email' => Input::get('email'),
		    'password' => Input::get('password'),
		    'password2' => Input::get('password2')
		));
		if($validator->fails()){
	      	$errors = $validator->messages()->all();
	      	$personal->password = null;
	      	return View::make('admin/personal/create')->with('personal', $personal)->with('errors', $errors);
	   	}else{
	      	$personal->save();
			return Redirect::to('admin/personal')->with('notice', 'El usuario '.$personal->nombre.' ha sido creado correctamente.');
	   }
		
	}


	/**
	 * Mostrar un registro
	 */
	public function show($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$personal = Personal::find($id);
   		return View::make('admin.personal.show')->with('personal', $personal);
	}


	/**
	 *  Muestra formulario para modificar
	 */
	public function edit($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$personal = Personal::find($id);
   		// Tipos de Personal, como Lists para llenar select.
   		$tipos = TipoPersonal::lists('descripcion', 'id');
		return View::make('admin.personal.create', array('personal' => $personal, 'tipos' => $tipos));
	
	}


	/**
	 * Updatea
	 */
	public function update($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		// Capturar datos
		$personal = Personal::find($id);
		$personal->email = Input::get('email');
		$personal->nombre = Input::get('nombre');
		$personal->tipo_personal_id = Input::get('tipo');
		
		// Validar datos
		$validator = Personal::validate(array(
		    'nombre' => Input::get('nombre'),
		    'email' => Input::get('email'),
		    'password' => '123',
		    'password2' => '123'
		), $personal->id);

		if($validator->fails()){
	      	$errors = $validator->messages()->all();
	      	$personal->password = null;
	      	return View::make('admin/personal/create')->with('personal', $personal)->with('errors', $errors);
	   	}else{
	      	$personal->save();
			return Redirect::to('admin/personal')->with('notice', 'El usuario '.$personal->nombre.' ha sido modificado correctamente.');
	   }
	}


	/**
	 * Eliminar
	 */
	public function destroy($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$personal = Personal::find($id);
		$personal->delete();
	   	return Redirect::to('admin/personal')->with('notice', 'El usuario ha sido eliminado correctamente.');
	}


}