@extends('plantillas.lista')

@section('titulo')
	Información de Usuario
@stop

@section('contenido')
	<h2 class="text-center">
		Información de Usuario
	</h2>
	<hr>
	<div class="form-horizontal">
		<!-- Nombre -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Nombre :</label>
	        <div class="col-md-4">
	            {{ $personal->nombre }}
	        </div>
	    </div>
	    <!-- Email -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Email :</label>
	        <div class="col-md-4">
	            {{ $personal->email }}
	        </div>
	    </div>
	    <!-- Tipo -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Tipo Usuario :</label>
	        <div class="col-md-4">
	            {{ $personal->tipoPersonal->descripcion }}
	        </div>
	    </div>
	    <!-- Fecha de Registro -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Registrado el :</label>
	        <div class="col-md-4">
	            {{ date("d/m/Y",strtotime($personal->created_at)) }} 
	        </div>
	    </div>
	    <!-- Fecha de Update -->
		<div class="form-group">
	        <label class="col-md-2 col-md-offset-3 text-right">Modificado el :</label>
	        <div class="col-md-4">
	            {{ date("d/m/Y",strtotime($personal->updated_at)) }} 
	        </div>
	    </div>
	</div>
	<br>
	<br>
	<hr>
	<p class="text-center" style="color:#B9B9B9">Track-Soft &copy; 2014</p>
@stop