<!DOCTYPE html>
<html>
<head>
	<title>Reserva de recursos</title>
</head>
<body>
	<h2>PRUEBA</h2>	
	<?php
	// CONEXION A LA BBDD
	$conexion = mysqli_connect("localhost","root","","colegiodno");
	$acentos=mysqli_query($conexion,"SET NAMES 'utf8'");

	// MOSTRAR RESULTADOS
	$q = "SELECT tbl_reservasrecursos.reservarecurso_id, tbl_recursos.recurso_nombre, tbl_recursos.recurso_tipo, tbl_recursos.recurso_img, tbl_usuarios.usuario_nombre, tbl_reservasrecursos.reservarecurso_estado, tbl_reservasrecursos.reservarecurso_fechareserva, tbl_reservasrecursos.reservarecurso_fechadevolucion
	FROM ((`tbl_reservasrecursos`
	INNER JOIN tbl_recursos ON tbl_reservasrecursos.reservarecurso_recurso = tbl_recursos.recurso_id)
	INNER JOIN tbl_usuarios ON tbl_reservasrecursos.reservarecurso_usuario = tbl_usuarios.usuario_id)";
	$busqueda = mysqli_query($conexion, $q);

	while ($result=mysqli_fetch_array($busqueda)){
		if($result['reservarecurso_estado']=="Disponible"){
			echo "<form name='reservar' action='index_proc.php' method='GET'>";
				echo "Id: $result[reservarecurso_id] </br>";
				echo "Recurso: $result[recurso_nombre] </br>";
				echo "Tipo de recurso: $result[recurso_tipo] </br>";
				echo "Img: $result[recurso_img] </br>";
				// SI ESTA DISPONIBLE NO DEBERIA MOSTRAR AMBAS FECHAS.
				// echo "Reservado por: $result[usuario_nombre] </br>";
				echo "Estado: $result[reservarecurso_estado] </br>";
				// SI ESTA DISPONIBLE NO DEBERIA MOSTRAR AMBAS FECHAS.
				//echo "Fecha reserva:";
				//echo date ('G:i:s d-m-Y', strtotime($result['reservarecurso_fechareserva']));
				//echo "</br>";
				//echo "Fecha devolución: ";
				//echo date ('G:i:s d-m-Y', strtotime($result['reservarecurso_fechadevolucion']));		
				echo "</br></br>";
				// Se guarda en un tipo hidden para guardar el id.
				echo "<input type='hidden' name='id' value='$result[reservarecurso_id]'>";		
				echo "<input type='submit' name='' value='Reservar'>";
			echo "</form>";

			echo "</br></br></br>";
		} else {
			echo "<form name='devolver' action='index_proc2.php' method='GET'>";
				echo "Id: $result[reservarecurso_id] </br>";
				echo "Recurso: $result[recurso_nombre] </br>";
				echo "Tipo de recurso: $result[recurso_tipo] </br>";
				echo "Img: $result[recurso_img] </br>";
				echo "Estado: $result[reservarecurso_estado] </br>";
				echo "Reservado por: $result[usuario_nombre] </br>";				
				echo "Fecha reserva: ";
				echo date ('G:i:s d-m-Y', strtotime($result['reservarecurso_fechareserva']));
				echo "</br>";
				// SI ESTA NO DISPONIBLE NO DEBERIA MOSTRAR LA FECHA DE DEVOLUCION
				// echo "Fecha devolución: ";
				// echo date ('G:i:s d-m-Y', strtotime($result['reservarecurso_fechadevolucion']));	
				// Se guarda en un tipo hidden para guardar el id.	
				echo "<input type='hidden' name='id' value='$result[reservarecurso_id]'>";		
				echo "<input type='submit' name='' value='Devolver'>";
			echo "</form>";
				echo "</br></br></br>";
		}

	}
	?>
</body>
</html>