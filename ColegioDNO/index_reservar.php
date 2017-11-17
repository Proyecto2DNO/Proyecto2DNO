<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$id_recurso=$_GET['id_recurso'];
		echo $id_recurso;
		echo "</br>";

		// CONEXION A LA BBDD
		$conexion = mysqli_connect("localhost","root","","colegiodno");
		$acentos=mysqli_query($conexion,"SET NAMES 'utf8'");

		$q="INSERT INTO `tbl_reservasrecursos`(`reservarecurso_recurso`,`reservarecurso_fechareserva`,`reservarecurso_usuario`,`reservarecurso_estado`) VALUES ($id_recurso,CURRENT_TIMESTAMP,1,'Reservado')";
		$query="UPDATE `tbl_recursos` SET `recurso_estado`='Reservado' WHERE `recurso_id`='$id_recurso'";

		echo "$q </br>";
		echo "$query";
		$busqueda = mysqli_query($conexion, $q);
		$busqueda2 = mysqli_query($conexion, $query);
		header('Location: index_logged.php');
	?>
</body>
</html>