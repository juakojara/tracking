@extends('plantillas.lista')

@section('titulo')
	Bienvenido al Sistema
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