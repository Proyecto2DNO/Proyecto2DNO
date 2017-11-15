<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<link href="estilo.css" rel="stylesheet">
	<link href="bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

	<title>Inicio sesión</title>
	
</head>
<body>

	<div class="container">

	<form class="form-signin" method="post" action="index.php">

		
		<h2 class="form-signin-heading">Iniciar sesión</h2>
			<label type="text" class="sr-only">Nombre de usuario</label>
			<input type="text" name="usuario_nombre" class="form-control"  placeholder="Usuario" required="" >
		
			<label type="text" class="sr-only">Contraseña</label>
			<input type="password" name="usuario_pw" class="form-control" placeholder="Contraseña" data-toggle="password" required="">
			
			<?php include('errors.php'); ?>
			
		
			<button  class="btn btn-lg btn-primary btn-block"type="submit" class="btn" name="login_user">Entrar</button>
		</div>
		
		<script type="text/javascript">
	$("#password").password('toggle');
</script>
		
	</form>


</body>
</html>