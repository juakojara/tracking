@extends('plantillas.lista')

@section('titulo')
	@if($pagos->id)
		Modificar Pagos
	@else
		Registrar Pago
	@endif
@stop

@section('contenido')
	<h2 class="text-center">
		@if($pagos->id)
			Modificar Pagos
		@else
			Registrar Pagos
		@endif
	</h2>
	<hr>
	@if(isset($errors))
      @foreach($errors as $item)
      	<div class="alert alert-danger">
      		- {{ $item }}
      	</div>
      @endforeach
	@endif
	{{ Form::open(array('url' => 'admin/pagos/' . $pagos->id , 'class'=>'form-horizontal')) }}
		<!-- Cliente -->
		<div class="form-group">
			{{ Form::label('cliente', 'Cliente :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('nombre', $cliente->nombre.' '.$cliente->apellido, array('class'=>'form-control', 'placeholder'=>'Nombre', 'disabled')) }}
	        </div>
	    </div>
	    <!-- Email -->
		<div class="form-group">
			{{ Form::label('email', 'Email :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('email', $cliente->email, array('class'=>'form-control', 'placeholder'=>'Email', 'disabled')) }}
	        </div>
	    </div>
	    <!-- Tipo de Pago -->
	    <div class="form-group">
	    	{{ Form::label('Tipo', 'Tipo :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::select('tipo', $tipos , $pagos->tipo_pago_id, array('class'=>'form-control')) }}
	        </div>
	    </div>
	    <!-- Monto -->
		<div class="form-group">
			{{ Form::label('monto', 'Monto :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	<div class="input-group">
	        		<span class="input-group-addon">$</span>
	        		{{ Form::text('monto', $pagos->monto, array('class'=>'form-control', 'placeholder'=>'Monto')) }}
	        	</div>
	        </div>
	    </div>
	    <!-- Fecha de Pago -->
	    <div class="form-group">
	    	{{ Form::label('fecha', 'Fecha :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::input('date', 'date', $pagos->fecha, array('class'=>'form-control')) }}
	        </div>
	    </div>
	    <!-- Numero Documento -->
		<div class="form-group">
			{{ Form::label('documento', 'N° de Pago:', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	<div class="input-group">
	        		<span class="input-group-addon">N°</span>
	        		{{ Form::text('documento', $pagos->numero_documento, array('class'=>'form-control', 'placeholder'=>'N° Cheque o Depósito')) }}
	        	</div>
	        </div>
	    </div>
	    <!-- Descripción -->
		<div class="form-group">
			{{ Form::label('descripcion', 'Descripción :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::textarea('descripcion', $pagos->descripcion, array('class'=>'form-control', 'placeholder'=>'Descripción', 'size' => '10x3')) }}
	        </div>
	    </div>
		<!-- Estado de Pago -->
	    <div class="form-group">
	    	{{ Form::label('estado', 'Estado :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::select('estado', $estados , $pagos->estado_pago_id, array('class'=>'form-control')) }}
	        </div>
	    </div>
	    {{ Form::input('hidden', 'cliente', $cliente->id) }}
	    @if($pagos->id)
	    	{{ Form::hidden('_method', 'PUT') }}
	    @endif
	    <div class="col-md-2 col-md-offset-5">
			{{ Form::submit('Registrar', array('class'=>'btn btn-negro btn-block')) }}
	    </div>
	{{ Form::close() }}
	<br>
	<br>
	<hr>
	<p class="text-center" style="color:#B9B9B9">Track-Soft &copy; 2014</p>
@stop