<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$id_reserva=$_GET['id_reserva'];
		echo "ID Reserva: $id_reserva";
		
		echo "</br>";

		$id_recurso=$_GET['id_recurso'];
		echo "ID Recurso: $id_recurso";
		echo "</br>";

		// CONEXION A LA BBDD
		$conexion = mysqli_connect("localhost","root","","colegiodno");
		$acentos=mysqli_query($conexion,"SET NAMES 'utf8'");

		$query1="SELECT * FROM `tbl_reservasrecursos` WHERE `reservarecurso_id`='$id_reserva'";
		$lanzarquery1 = mysqli_query($conexion,$query1);

		$q="UPDATE `tbl_reservasrecursos` SET `reservarecurso_fechadevolucion`=CURRENT_TIMESTAMP,`reservarecurso_estado`='Devuelto' WHERE `reservarecurso_id`='$id_reserva'";

		while($resultado2=mysqli_fetch_array($lanzarquery1)){
			$query="UPDATE `tbl_recursos` SET `recurso_estado`='Disponible' WHERE `recurso_id`='$resultado2[reservarecurso_recurso]'";
		}
		echo "$q </br>";
		echo "$query";
		$busqueda = mysqli_query($conexion, $q);
		$busqueda2 = mysqli_query($conexion, $query);
		header('Location: index_logged.php');
	?>
</body>
</html>