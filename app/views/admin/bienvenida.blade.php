@extends('plantillas.lista')

@section('titulo')
	Bienvenido al Sistema
@stop

@section('menu')
	<div class="list-group">
		
		@if(Auth::check() and Auth::user()->tipo_personal_id != 2)
			<a href="{{ URL::to('admin/personal') }}" class="list-group-item text-center"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Cuentas de Usuario</a>
		@else
		
		<a href="#" class="list-group-item text-center">Tickets</a>
		<a href="#" class="list-group-item text-center">Pagos</a>

		<a href="#" class="list-group-item text-center">Reportes</a>
		@endif
	</div>
@stop

@section('contenido')
	<h1 class="text-center">Bienvenido al Sistema</h1>
	<hr>
	<br>
	<br>
	<br>
	<div class="text-center">
	{{HTML::image('img/logo.jpg', 'Multi Cargo', array('style'=>'margin: 0 auto;'));}}
	</div>
	<br>
	<br>
	<br>
	<hr>
	<div class="row text-center">
			<p  style="color:#B9B9B9">Track Soft &copy; 2014</p>
	</div>
@stop