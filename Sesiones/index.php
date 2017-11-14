<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<link href="estilo.css" rel="stylesheet">
	<link href="bootstrap.min.css" rel="stylesheet">
	<title>Inicio sesión</title>
	
</head>
<body>

	<div class="container">

	<form class="form-signin" method="post" action="index.php">

		<?php include('errors.php'); ?>
		<h2 class="form-signin-heading">Iniciar sesión</h2>
			<label type="text" class="sr-only">Nombre de usuario</label>
			<input type="text" name="usuario_nombre" class="form-control"  placeholder="Usuario" required="" >
		
			<label type="text" class="sr-only">Contraseña</label>
			<input type="password" name="usuario_pw" class="form-control" placeholder="Contraseña" required="">
		
			<button  class="btn btn-lg btn-primary btn-block"type="submit" class="btn" name="login_user">Entrar</button>
		</div>
		<p>
		
		</p>
	</form>


</body>
</html>