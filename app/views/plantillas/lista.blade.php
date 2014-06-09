<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('titulo') </title>
	
	<!-- Estilo -->
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css') }}
	
</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
 			<div class="container-fluid">
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				<a class="navbar-brand" href="#" style="color:white">Track Soft</a>
      				<p class="navbar-text pull-right" style="color:white">
      					<strong>Bienvenido : {{ Auth::user()->nombre }}</strong>
						<a href="{{ URL::to('admin/logout') }}">(Logout)</a>
      				</p>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
  		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			<div class="col-md-3 well">
				<h3 class="text-center">Menú</h3>
				<hr>
				<div class="list-group">
					@if(Auth::check() and Auth::user()->tipo_personal_id != 2)
						<a href="{{ URL::to('admin/personal') }}" class="list-group-item text-center"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Cuentas de Usuario</a>
					@elseif(Auth::check() and Auth::user()->tipo_personal_id != 1)
						<a href="{{ URL::to('admin/clientes') }}" class="list-group-item text-center"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Clientes</a>
					@endif
				</div>
			</div>
			<div class="col-md-9 well">
				@yield('contenido')
			</div>
		</div>
	</div>
</body>
</html>