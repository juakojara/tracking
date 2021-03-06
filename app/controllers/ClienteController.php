<?php

class ClienteController extends \BaseController {

	private $autorizado;
	public function __construct()
	{
	    $this->autorizado = (Auth::check() and Auth::user()->tipo_personal_id > 1);
	} 

	/**
	 * Lista todos los clientes.
	 */
	public function index()
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$clientes = Cliente::all();
		return View::make('admin.clientes.index', array('clientes' => $clientes));
	}


	/**
	 * Mostrar Formulario de registro
	 */
	public function create()
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
   		$cliente = new Cliente();
		return View::make('admin.clientes.create')->with('cliente', $cliente);
	}


	/**
	 * Insertar nuevo registro en la DB
	 */
	public function store()
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$cliente = new Cliente();
		$cliente->email = Input::get('email');
		$cliente->nombre = Input::get('nombre');
		$cliente->apellido = Input::get('apellido');
		$cliente->telefono = Input::get('telefono');
		$cliente->telefono2 = Input::get('telefono2');
		$cliente->direccion = Input::get('direccion');
		$cliente->password = Hash::make(Input::get('password'));
		$validator = Cliente::validate(array(
		    'nombre' => Input::get('nombre'),
		    'apellido' => Input::get('apellido'),
		    'email' => Input::get('email'),
		    'telefono' => Input::get('telefono'),
		    'password' => Input::get('password'),
		    'password2' => Input::get('password2')
		));
		if($validator->fails()){
	      	$errors = $validator->messages()->all();
	      	$cliente->password = null;
	      	return View::make('admin/clientes/create')->with('cliente', $cliente)->with('errors', $errors);
	   	}else{
	      	$cliente->save();
			return Redirect::to('admin/clientes')->with('notice', 'El cliente '.$cliente->nombre.' ha sido creado correctamente.');
	   }
		
	}


	/**
	 * Mostrar un registro
	 */
	public function show($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$cliente = Cliente::find($id);
		$pagos = PagoCliente::where('cliente_id', '=', $id)->get();
   		return View::make('admin.clientes.show', array('cliente' => $cliente, 'pagos' => $pagos));
	}


	/**
	 *  Muestra formulario para modificar
	 */
	public function edit($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$cliente = Cliente::find($id);
   		return View::make('admin.clientes.create')->with('cliente', $cliente);		
	}


	/**
	 * Updatea
	 */
	public function update($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$cliente = Cliente::find($id);
		$cliente->email = Input::get('email');
		$cliente->nombre = Input::get('nombre');
		$cliente->apellido = Input::get('apellido');
		$cliente->telefono = Input::get('telefono');
		$cliente->telefono2 = Input::get('telefono2');
		$cliente->direccion = Input::get('direccion');
	   	$validator = Cliente::validate(array(
		    'nombre' => Input::get('nombre'),
		    'apellido' => Input::get('apellido'),
		    'email' => Input::get('email'),
		    'telefono' => Input::get('telefono'),
		    'password' => '123',
		    'password2' => '123'
		), $cliente->id);
		if($validator->fails()){
	      	$errors = $validator->messages()->all();
	      	$cliente->password = null;
	      	return View::make('admin/clientes/create')->with('cliente', $cliente)->with('errors', $errors);
	   	}else{
	      	$cliente->save();
			return Redirect::to('admin/clientes')->with('notice', 'El cliente '.$cliente->nombre.' ha sido modificado correctamente.');
	   }
	}


	/**
	 * Eliminar
	 */
	public function destroy($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$cliente = Cliente::find($id);
		$cliente->delete();
	   	return Redirect::to('admin/clientes')->with('notice', 'El cliente ha sido eliminado correctamente.');
	}


}
