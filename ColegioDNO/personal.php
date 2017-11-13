<? include("seguridad.php"); ?> 
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



<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span> <?php echo "Bienvenido " . $_SESSION['username']; ?></span></a></li>
   <li><a href='logout.php'><span><?php echo "Cerrar sesión" ?></span></a></li>
   <li><a href='personal.php'><span>Personal</span></a></li>


</ul>
</div>
	</body>
</html>




