<?php

class PagoController extends \BaseController {

	private $autorizado;
	public function __construct()
	{
	    $this->autorizado = (Auth::check() and Auth::user()->tipo_personal_id != 1);
	} 

	/**
	 * Lista todos los pagos.
	 */
	public function index()
	{
	}


	/**
	 * Mostrar Formulario de registro
	 */
	public function create()
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
   		$pagos = new PagoCliente();
   		// Tipos y estados para llenar Select
   		$tipos = TipoPago::lists('descripcion', 'id');
   		$estados = EstadoPago::lists('descripcion', 'id');
   		$cliente = Cliente::find($_GET['cliente']);
		return View::make('admin.pagos.create', array('pagos' => $pagos, 'tipos' => $tipos, 'estados' => $estados, 'cliente' => $cliente));
	}


	/**
	 * Insertar nuevo registro en la DB
	 */
	public function store()
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$cliente = Cliente::find($_POST['cliente']);
		// Tipos y estados para llenar Select
   		$tipos = TipoPago::lists('descripcion', 'id');
   		$estados = EstadoPago::lists('descripcion', 'id');
		// Capturar datos
		$pagos = new PagoCliente();
		$pagos->cliente_id = Input::get('cliente');
		$pagos->tipo_pago_id = Input::get('tipo');
		$pagos->monto = Input::get('monto');
		$pagos->fecha = Input::get('date');
		$pagos->numero_documento = Input::get('documento');
		$pagos->descripcion = Input::get('descripcion');
		$pagos->estado_pago_id = Input::get('estado');

		// Validar datos
		$validator = PagoCliente::validate(array(
		    'monto' => Input::get('monto'),
		    'date' => Input::get('date'),
		    'numero_documento' => Input::get('documento'),
		    'descripcion' => Input::get('descripcion')
		));

		if($validator->fails()){
	      	$errors = $validator->messages()->all();
	      	
	      	$cliente = Cliente::find($_POST['cliente']);
	      	return View::make('admin/pagos/create', array('pagos'=> $pagos, 'errors' => $errors, 'cliente' => $cliente, 'tipos' => $tipos, 'estados' => $estados ));
	   	}else{
	      	$pagos->save();
			return Redirect::to('admin/clientes/'.Input::get('cliente'))->with('notice', 'El pago ha sido agregado correctamente.');
	   }
		
	}


	/**
	 * Mostrar un registro
	 */
	public function show($id)
	{

	}


	/**
	 *  Muestra formulario para modificar
	 */
	public function edit($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$pagos = PagoCliente::find($id);
   		// Tipos de Personal, como Lists para llenar select.
   		$cliente = Cliente::find($_GET['cliente']);
   		$tipos = TipoPago::lists('descripcion', 'id');
   		$estados = EstadoPago::lists('descripcion', 'id');
		return View::make('admin.pagos.create', array('cliente' => $cliente, 'pagos' => $pagos, 'tipos'=>$tipos, 'estados'=>$estados));
	}


	/**
	 * Updatea
	 */
	public function update($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');

		$cliente = Cliente::find($_POST['cliente']);
		// Tipos y estados para llenar Select
   		$tipos = TipoPago::lists('descripcion', 'id');
   		$estados = EstadoPago::lists('descripcion', 'id');
		// Capturar datos
		$pagos = PagoCliente::find($id);
		$pagos->cliente_id = Input::get('cliente');
		$pagos->tipo_pago_id = Input::get('tipo');
		$pagos->monto = Input::get('monto');
		$pagos->fecha = Input::get('date');
		$pagos->numero_documento = Input::get('documento');
		$pagos->descripcion = Input::get('descripcion');
		$pagos->estado_pago_id = Input::get('estado');

		// Validar datos
		$validator = PagoCliente::validate(array(
		    'monto' => Input::get('monto'),
		    'date' => Input::get('date'),
		    'numero_documento' => Input::get('documento'),
		    'descripcion' => Input::get('descripcion')
		));

		if($validator->fails()){
	      	$errors = $validator->messages()->all();
	      	return View::make('admin/pagos/create', array('pagos'=> $pagos, 'errors' => $errors, 'cliente' => $cliente, 'tipos' => $tipos, 'estados' => $estados ));
	   	}else{
	      	$pagos->save();
			return Redirect::to('admin/clientes/'.Input::get('cliente'))->with('notice', 'El pago ha sido modificado correctamente.');
	   }
	}


	/**
	 * Eliminar
	 */
	public function destroy($id)
	{
		if(!$this->autorizado) return Redirect::to('admin/login');
		$pago = PagoCliente::find($id);
		$pago->delete();
	   	return Redirect::back()->with('notice', 'El pago ha sido eliminado correctamente.');
	}



}
