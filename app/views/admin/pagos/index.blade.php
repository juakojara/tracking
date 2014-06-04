@extends('plantillas.lista')

@section('titulo')
	Lista de Pagos
@stop

@section('contenido')
	<h2 class="text-center">Últimos Pagos</h2>
	<hr>

	@if(Session::has('notice'))
		<div class="alert alert-success text-center">
			<p><strong> {{ Session::get('notice') }} </strong></p>
      	</div> 
    @endif

	<div class="row">
		<div class="col-md-3">
			<a href="pagos/create" class="btn btn-negro"><span class="glyphicon glyphicon-plus" style="margin-right:5px"></span>Agregar Pago</a>
		</div>
	</div>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Tipo</th>
				<th>Monto</th>
				<th>Fecha</th>
				<th># Documento</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>	
		</thead>
		<tbody>
		@foreach($pagos as $pago)
			<tr>
				<td><a href="pagos/{{ $pago->id }}" style="color:gray;"><strong>{{ $pago->cliente->nombre.' '.$pago->cliente->apellido }}</strong></a></td>
				<td>{{ $pago->tipoPago->descripcion }}</td>
				<td>$ {{ $pago->monto }}</td>
				<td>{{ $pago->fecha }}</td>
				<td>{{ $pago->numero_documento }}</td>
				<td><a href="pagos/{{ $pago->id }}/edit"  class="btn btn-negro btn-block"><span class="glyphicon glyphicon-pencil" style="margin-right:5px"></span>&nbsp;Editar</a></td>
				<td>
					 {{ Form::open(array('url' => 'admin/pagos/'.$pago->id)) }}
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