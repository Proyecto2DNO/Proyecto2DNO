<?php 
	session_start();

	// variable declaration
	$usuario_nombre = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$db=mysqli_connect("localhost", "root", "", "proyecto_reservas");


	if (isset($_POST['login_user'])) {
		$usuario_nombre = $_POST['usuario_nombre'];
		$usuario_pw = $_POST['usuario_pw'];


		if (count($errors) == 0) {
			$query = "SELECT * FROM tbl_usuarios WHERE usuario_nombre = '$usuario_nombre'";
			
			$results = $db->query($query);
 $row = $results->fetch_array(MYSQLI_ASSOC);
 if ($row['usuario_pw'] == $usuario_pw) { 
    $_SESSION['loggedin'] = true;
    $_SESSION['usuario_nombre'] = $usuario_nombre;
    $_SESSION['success'] = "Bienvenido " . $_SESSION['usuario_nombre'];
    
    header('location: ../index.php');

		
			}else {
				array_push($errors, "Usuario o contraseña incorrectos");
			}
		}
	}


?>