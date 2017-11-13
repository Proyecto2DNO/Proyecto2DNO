
<? include("seguridad.php"); ?> 

<html>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="prueba.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Inicio</title>
</head>

<?php
ini_set('session.gc_maxlifetime', 3*60*60); // 3 hours
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.cookie_secure', true);
ini_set('session.use_only_cookies', true);
session_start();
 
/* Cerrar sesión */
if(isset($_POST['cerrar_sesion'])) {
    session_destroy();
}
?> 


<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "login";
$tbl_name = "username";

$conexion=mysqli_connect("localhost", "root", "", "login");  
            mysqli_query ($conexion, "SET NAMES 'utf8'");


$username = $_GET['username'];
$password = $_GET['password'];
 
$sql = "SELECT * FROM usuari WHERE username = '$username'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if ($row['password'] == $password) { 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (500 * 60);


   // echo " Bienvenido! " . $_SESSION['username'];
    //echo "<br><br><a href=logout.php>Logout</a>"; 
  
 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='index.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 
 ?>


<body>

<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span> <?php echo "Bienvenido " . $_SESSION['username']; ?></span></a></li>
   <li><a href='logout.php'><span><?php echo "Cerrar sesión" ?></span></a></li>
   <li><a href='personal.php'><span>Personal</span></a></li>
</ul>
</div>



</body>
<html>
