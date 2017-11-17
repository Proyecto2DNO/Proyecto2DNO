<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$id=$_GET['id'];
	echo $id;

	// CONEXION A LA BBDD
	$conexion = mysqli_connect("localhost","root","","colegiodno");
	$acentos=mysqli_query($conexion,"SET NAMES 'utf8'");

	$q="UPDATE `tbl_reservasrecursos` SET `reservarecurso_fechareserva`= NULL, `reservarecurso_estado`='Disponible' WHERE `reservarecurso_id`=$id";
	$busqueda = mysqli_query($conexion, $q);
	header('Location: index.php');
	?>
</body>
</html>