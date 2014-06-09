@extends('plantillas.lista')

@section('titulo')
	Información de Cliente
@stop

@section('contenido')
	@if(Session::has('notice'))
		<div class="alert alert-success text-center">
			<p><strong> {{ Session::get('notice') }} </strong></p>
      	</div> 
    @endif
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
	<!-- Pagos -->
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading text-center">
	  	<strong>Pagos del cliente</strong>
	  </div>
	  <div class="panel-body">
	    <div class="row">
	    	<div class="col-md-3">
				<a href="../pagos/create?cliente={{$cliente->id}}" class="btn btn-negro"><span class="glyphicon glyphicon-plus" style="margin-right:5px"></span>Agregar Pago</a>
			</div>
		</div>
	  </div>

	  <!-- Tabla -->
	  <table class="table table-bordered">
	    <thead>
			<tr>
				<th>N° Pago</th>
				<th>Monto</th>
				<th>Tipo</th>
				<th>Fecha</th>
				<th>Descripción</th>
				<th>Estado</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>	
		</thead>
		<tbody>
			@foreach ($pagos as $pago)
			<tr @if ($pago->estado_pago_id == 1) {{ "class='success'" }} @else {{ "class='danger'" }}  @endif>
				<td>{{ $pago->numero_documento }}</td>
	    		<td>${{ $pago->monto }}</td>
	    		<td>{{ $pago->tipoPago->descripcion }}</td>
	    		<td>{{ $pago->fecha }}</td>
	    		<td>{{ $pago->descripcion }}</td>
	    		<td>{{ $pago->estadoPago->descripcion }}</td>
	    		<td>
	    			<a href="../pagos/{{ $pago->id }}/edit?cliente={{$cliente->id}}"  class="btn btn-negro btn-block">&nbsp;<span class="glyphicon glyphicon-pencil" style="margin-right:5px"></span>&nbsp;</a></td>
	    		<td>
	    			{{ Form::open(array('url' => 'admin/pagos/'.$pago->id)) }}
					     {{ Form::hidden("_method", "DELETE") }}
					     {{ Form::button("&nbsp;<span class='glyphicon glyphicon-trash' style='margin-right:5px'></span>&nbsp;", array('type'=>'submit','class'=>'btn btn-negro btn-block'))}}
					 {{ Form::close() }}
	    		</td>
			</tr>
	    	@endforeach
		</tbody>
	  </table>
	</div>
	<br>
	<br>
	<hr>
	<p class="text-center" style="color:#B9B9B9">Track-Soft &copy; 2014</p>
@stop