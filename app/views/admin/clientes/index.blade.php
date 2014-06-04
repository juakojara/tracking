@extends('plantillas.lista')

@section('titulo')
	Lista de Clientes
@stop

@section('contenido')
	<h2 class="text-center">Clientes</h2>
	<hr>

	@if(Session::has('notice'))
		<div class="alert alert-success text-center">
			<p><strong> {{ Session::get('notice') }} </strong></p>
      	</div> 
    @endif

	<div class="row">
		<div class="col-md-3">
			<a href="clientes/create" class="btn btn-negro"><span class="glyphicon glyphicon-plus" style="margin-right:5px"></span>Nuevo Cliente</a>
		</div>
		<div class="col-md-4 pull-right">
			<!-- Búsqueda -->
			<div class="row">
			<div class="col-md-7">
				{{ Form::open(array('url'=>'admin/clientes/search')) }}
				{{ Form::text('buscar', null, array('class'=>'form-control','placeholder'=>'Nombre'))}}
			</div>
			
				{{ Form::button("<span class='glyphicon glyphicon-search' style='margin-right:5px'></span>&nbsp;Buscar", array('type'=>'submit','class'=>'btn btn-negro pull-left'))}}
			{{ Form::close() }}
			</div>
		</div>
	</div>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Email</th>
				<th>Teléfono</th>
				<th>Dirección</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>	
		</thead>
		<tbody>
		@foreach($clientes as $cliente)
			<tr>
				<td><a href="clientes/{{ $cliente->id }}" style="color:gray;"><strong>{{ $cliente->nombre.' '.$cliente->apellido }}</strong></a></td>
				<td>{{ $cliente->email }}</td>
				<td>{{ $cliente->telefono }}</td>
				<td>{{ $cliente->direccion }}</td>
				<td><a href="clientes/{{ $cliente->id }}/edit"  class="btn btn-negro btn-block"><span class="glyphicon glyphicon-pencil" style="margin-right:5px"></span>&nbsp;Editar</a></td>
				<td>
					 {{ Form::open(array('url' => 'admin/clientes/'.$cliente->id)) }}
					     {{ Form::hidden("_method", "DELETE") }}
					     {{ Form::button("<span class='glyphicon glyphicon-trash' style='margin-right:5px'></span>&nbsp;Borrar", array('type'=>'submit','class'=>'btn btn-negro btn-block'))}}
					 {{ Form::close() }}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<br>
	<br>
	<hr>
	<p class="text-center" style="color:#B9B9B9">Track-Soft &copy; 2014</p>
@stop