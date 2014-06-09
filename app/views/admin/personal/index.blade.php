@extends('plantillas.lista')

@section('titulo')
	Lista de Usuarios
@stop

@section('contenido')
	<h2 class="text-center">Cuentas de Usuarios</h2>
	<hr>

	@if(Session::has('notice'))
		<div class="alert alert-success text-center">
			<p><strong> {{ Session::get('notice') }} </strong></p>
      	</div> 
    @endif

	<div class="row">
		<div class="col-md-3">
			<a href="personal/create" class="btn btn-negro"><span class="glyphicon glyphicon-plus" style="margin-right:5px"></span>Nuevo Usuario</a>
		</div>
		<!-- <div class="col-md-4 pull-right">
			<div class="row">
			<div class="col-md-7">
				{{ Form::open(array('url'=>'admin/personal/search')) }}
				{{ Form::text('buscar', null, array('class'=>'form-control','placeholder'=>'Nombre'))}}
			</div>
			
				{{ Form::button("<span class='glyphicon glyphicon-search' style='margin-right:5px'></span>&nbsp;Buscar", array('type'=>'submit','class'=>'btn btn-negro pull-left'))}}
			{{ Form::close() }}
			</div>
		</div> -->
	</div>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>	
		</thead>
		<tbody>
		@foreach($usuarios as $usuario)
			<tr>
				<td><a href="personal/{{ $usuario->id }}" style="color:gray;"><strong>{{ $usuario->nombre }}</strong></a></td>
				<td>{{ $usuario->email }}</td>
				<td> {{ $usuario->tipoPersonal->descripcion }}</td>
				<td><a href="personal/{{ $usuario->id }}/edit"  class="btn btn-negro btn-block"><span class="glyphicon glyphicon-pencil" style="margin-right:5px"></span>&nbsp;Editar</a></td>
				<td>
					 {{ Form::open(array('url' => 'admin/personal/'.$usuario->id)) }}
					     {{ Form::hidden("_method", "DELETE") }}
					     {{ Form::button("<span class='glyphicon glyphicon-trash' style='margin-right:5px'></span>&nbsp;Borrar", array('type'=>'submit','class'=>'btn btn-negro btn-block'))}}
					 {{ Form::close() }}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<div class="text-center">{{ $usuarios->links() }} </div>
	<hr>
	<p class="text-center" style="color:#B9B9B9">Track-Soft &copy; 2014</p>
@stop