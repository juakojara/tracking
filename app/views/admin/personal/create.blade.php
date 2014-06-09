@extends('plantillas.lista')

@section('titulo')
	@if($personal->id)
		Modificar Personal
	@else
		Registrar Personal
	@endif
@stop

@section('contenido')
	<h2 class="text-center">
		@if($personal->id)
			Modificar Personal
		@else
			Registrar Personal
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
	{{ Form::open(array('url' => 'admin/personal/' . $personal->id , 'class'=>'form-horizontal')) }}
		<!-- Nombre -->
		<div class="form-group">
			{{ Form::label('nombre', 'Nombre :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('nombre', $personal->nombre, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
	        </div>
	    </div>
	    <!-- Email -->
		<div class="form-group">
			{{ Form::label('email', 'Email :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::text('email', $personal->email, array('class'=>'form-control', 'placeholder'=>'Email')) }}
	        </div>
	    </div>
	    <!-- Tipo de Usuario -->
	    <div class="form-group">
	    	{{ Form::label('Tipo', 'Tipo :', array('class'=>'col-md-2 col-md-offset-2 control-label')) }}
	        <div class="col-md-4">
	        	{{ Form::select('tipo', $tipos , $personal->tipo_personal_id, array('class'=>'form-control')) }}
	        </div>
	    </div>
	    @if($personal->id)
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