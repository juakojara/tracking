@extends('plantillas.lista')

@section('titulo')
	Información de Cliente
@stop

@section('contenido')
	<h2 class="text-center">
		Información de Cliente
	</h2>
	<hr>
	<div class="form-horizontal">
		<!-- Nombre -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Nombre :</label>
	        <div class="col-md-4">
	            {{ $cliente->nombre.' '.$cliente->apellido }}
	        </div>
	    </div>
	    <!-- Email -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Email :</label>
	        <div class="col-md-4">
	            {{ $cliente->email }}
	        </div>
	    </div>
	    <!-- Telefono 1 -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Teléfono 1 :</label>
	        <div class="col-md-4">
	            {{ $cliente->telefono }}
	        </div>
	    </div>
	    <!-- Telefono 2 -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Teléfono 2 :</label>
	        <div class="col-md-4">
	            {{ $cliente->telefono2 }}
	        </div>
	    </div>
		<!-- Dirección -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Dirección :</label>
	        <div class="col-md-4">
	            {{ $cliente->direccion }}
	        </div>
	    </div>
	    <!-- Fecha de Registro -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Registrado el :</label>
	        <div class="col-md-4">
	            {{ date("d/m/Y",strtotime($cliente->created_at)) }} 
	        </div>
	    </div>
	    <!-- Fecha de Update -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Modificado el :</label>
	        <div class="col-md-4">
	            {{ date("d/m/Y",strtotime($cliente->updated_at)) }} 
	        </div>
	    </div>
	</div>
	<br>
	<br>
	<hr>
	<p class="text-center" style="color:#B9B9B9">Track-Soft &copy; 2014</p>
@stop