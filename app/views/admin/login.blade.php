<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Administrador</title>
	<!-- Estilo -->
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css') }}
	<style>
		.glyphicon-lock:before{content:"\e033";}
	</style>
	
</head>
<body>
	<div class="container">
		<br>
		<br>
		<div class="col-md-6 col-md-offset-3">
			<div class="well">
				<div class="row" style="margin-bottom:-20px">
					<div class="col-md-7 col-md-offset-2">
						<h1 class="text-center">Acceso al sistema</h1>
					</div>
				</div>
				<hr>
				<div class="row">
					@if(isset($error))
							<div class="alert alert-danger">
								<p><strong>Error:</strong></p>
								<p> -  {{ $error }}  </p>
							</div>	   
						@endif
					<div class="col-md-7 col-md-offset-2">
						{{ Form::open(array('url'=> 'admin/login')) }}
						<!-- Usuario -->
						<div class="input-group input-group-lg">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							{{ Form::text('email', '', array("class"=>"form-control", "placeholder" => "Email" ))}}
						</div>
						<!-- Clave -->
						<br>
						<div class="input-group input-group-lg">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						    {{ Form::password('password', array("class"=>"form-control", "placeholder"=>"Contraseña")) }}
						</div>
						<br>	
						<!-- Boton -->
						{{ Form::submit('Entrar', array("class"=>"btn btn-primary btn-lg btn-block")) }}
						{{ Form::close() }}
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-7 col-md-offset-2">
						<p class="text-center" style="color:#B9B9B9">Track Soft &copy; 2014</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>