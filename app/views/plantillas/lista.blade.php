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
      				<p class="navbar-text pull-right" style="color:white"><strong>Bienvenido : Usuario !</strong></p>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
  		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			<div class="col-md-3 well">
				<h3 class="text-center">Menú</h3>
				<hr>
				@yield('menu')
			</div>
			<div class="col-md-9 well">
				@yield('contenido')
			</div>
		</div>
	</div>
</body>
</html>