@extends('plantillas.lista')

@section('titulo')
	@if($cliente->id)
		Modificar Clientes
	@else
		Registrar Clientes
	@endif
@stop

@section('contenido')
	<h2 class="text-center">
		@if($cliente->id)
			Modificar Clientes
		@else
			Registrar Clientes
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
	{{ Form::open(array('url' => 'admin/clientes/' . $cliente->id , 'class'=>'form-horizontal')) }}
		<!-- Nombre -->
		<div class="form-group">
			{{ Form::label('nombre', 'Nombre :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('nombre', $cliente->nombre, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
	        </div>
	    </div>
	    <!-- Apellido -->
		<div class="form-group">
			{{ Form::label('apellido', 'Apellido :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('apellido', $cliente->apellido, array('class'=>'form-control', 'placeholder'=>'Apellido')) }}
	        </div>
	    </div>
	    <!-- Email -->
		<div class="form-group">
			{{ Form::label('email', 'Email :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('email', $cliente->email, array('class'=>'form-control', 'placeholder'=>'Email')) }}
	        </div>
	    </div>
	    <!-- Telefono -->
		<div class="form-group">
			{{ Form::label('telefono', 'Teléfono :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('telefono', $cliente->telefono, array('class'=>'form-control', 'placeholder'=>'Teléfono')) }}
	        </div>
	    </div>
	    <!-- Telefono 2  -->
		<div class="form-group">
			{{ Form::label('telefono2', 'Teléfono 2 :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('telefono2', $cliente->telefono2, array('class'=>'form-control', 'placeholder'=>'Teléfono Opcional')) }}
	        </div>
	    </div>
	    <!-- Dirección -->
		<div class="form-group">
			{{ Form::label('direccion', 'Dirección :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('direccion', $cliente->direccion, array('class'=>'form-control', 'placeholder'=>'Dirección')) }}
	        </div>
	    </div>
	    @if($cliente->id)
	    	{{ Form::hidden('_method', 'PUT') }}
	    @else
		    <!-- Clave 1 -->
			<div class="form-group">
				{{ Form::label('password', 'Contraseña :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
		        <div class="col-md-4">
		        	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Clave')) }}
		        </div>
		    </div>
		    <!-- Clave 2 -->
			<div class="form-group">
				{{ Form::label('password2', 'Repita Contraseña :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
		        <div class="col-md-4">
		        	{{ Form::password('password2', array('class'=>'form-control', 'placeholder'=>'Verificar Clave')) }}
		        </div>
		    </div>
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