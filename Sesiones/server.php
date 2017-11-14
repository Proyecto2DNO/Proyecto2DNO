<?php 
	session_start();

	// variable declaration
	$username = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$db=mysqli_connect("localhost", "root", "", "login");


	if (isset($_POST['login_user'])) {
		$username = $_POST['username'];
$password = $_POST['password'];


		if (count($errors) == 0) {
			$query = "SELECT * FROM usuari WHERE username = '$username'";
			
			$results = $db->query($query);
 $row = $results->fetch_array(MYSQLI_ASSOC);
 if ($row['password'] == $password) { 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Bienvenido " . $_SESSION['username'];
    
    header('location: index.php');

		
			}else {
				array_push($errors, "Usuario o contraseña incorrectos");
			}
		}
	}


?>