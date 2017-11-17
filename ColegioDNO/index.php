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

<<<<<<< HEAD
=======

>>>>>>> refs/remotes/origin/master
<!DOCTYPE html>


<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/4-col-portafolio.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<<<<<<< HEAD
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <title>ColegioDNO - Lista de Recursos</title>

<div id='cssmenu'>
<ul>
   <li><a href='index.php'>Inicio</a></li>
   <li><a href='login.php'>Iniciar sesión</a></li>  
</ul>
</div>
  <!-- Bootstrap core CSS -->

=======
  <title>ColegioDNO</title>


<div id='cssmenu'>
<ul>
   <li><a href='#'>Inicio</a></li>
   <li class='active'><a href='#'>Mis reservas</a>
     
   </li>
  <li> <a href='Sesiones/index.php'>Cerrar sesión</a></li>
   <li><a href=""><?php echo "Bienvenido " . $_SESSION['usuario_nombre']; ?></a></li>
</ul>
</div>
>>>>>>> refs/remotes/origin/master

  <!-- Custom styles for this template -->
  <link href="css/4-col-portfolio.css" rel="stylesheet">



</head>

<body>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container">
      <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
          <i></i>
        </a>
      <h4><b>BUSQUEDA RECURSO</b></h4>
      <p class="w3-text-grey">Aqui puedes filtrar los recursos</p>
    </div>
    <div class="w3-bar-block">
<<<<<<< HEAD
    	<form name="buscador" action="index_proc.php" method="GET">
	        <div class="form-group w3-bar-item">
	          <label for="usr">Nombre del recurso:</label>
	          <input type="text" class="form-control" id="nombre" name="nombre">
	          <br/>
	          	<select class="form-control" id="tipo_recurso" name="tipo_recurso">
		          <option disabled selected>Selecciona un tipo</option>
		          <option>Aula de teoría</option>
		          <option>Aula de informática</option>		          
		          <option>Despacho</option>
		          <option>Sala de reuniones</option>
		          <option>Proyector portátil</option>
		          <option>Carro portátil</option>
		          <option>Dispositivo Móvil</option>
		          <option>Portátil</option>
	        	</select>
	        <br/>
	          <select class="form-control" id="estado" name="estado" onChange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor">
		          <option style="background-color: white; color: black;" disabled selected>Estado</option>
		          <option style="background-color: #A9F5BC; color: black;">Disponible</option>
		          <option style="background-color: #F78181; color: black;">Reservado</option>
		          <option style="background-color: #E6E6E6; color: black;">Devuelto</option>
		          <option style="background-color: white; color: black;">Ver todos</option>
	          </select>
	        </br>
	        <button type="submit" class="btn btn-default" style="margin: auto; width: 58%; background-color:white!important;border: 1px solid #ced4da!important;">Filtrar</button>
	        <button type="reset" value="reset" class="btn btn-default" style="float:right; margin: auto; width: 40%; background-color:white!important;border: 1px solid #ced4da!important;" onClick="document.getElementById('estado').style.backgroundColor='#fff'">Limpiar</button>
      	</form>
=======
      <form>
        <div class="form-group w3-bar-item">
          <label for="usr">Name:</label>
          <input type="text" class="form-control" id="usr">
          <br/>
          <select class="form-control" id="selector 1">
          <option disabled selected>Selecciona un tipo</option>
          <option>Aula de teoría</option>
          <option>Aula Informatica</option>
          <option>Portatil</option>
          <option>Despacho</option>
          <option>Carro de portátil</option>
          <option>Dispositivo Móvil</option>
          <option>Sala de reuniones</option>
          <option>Proyector portátil</option>
        </select>
        <br/>
          <select class="form-control" id="selector 2" onChange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor">
          <option style="background-color: white; color: black;" disabled selected>Estado</option>
          <option style="background-color: #A9F5BC; color: black;">Disponible</option>
          <option style="background-color: #F78181; color: black;">Reservado</option>
          <option style="background-color: #E6E6E6; color: black;">Devuelto</option>
          </select>
        </br>
        <button type="button" class="btn btn-default" style="margin: auto; width: 58%; background-color:white!important;border: 1px solid #ced4da!important;">Filtrar</button>
        <button type="reset" value="reset" class="btn btn-default" style="float:right; margin: auto; width: 40%; background-color:white!important;border: 1px solid #ced4da!important;" onClick="document.getElementById('selector 2').style.backgroundColor='#fff'">Limpiar</button>
      </form>
>>>>>>> refs/remotes/origin/master
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">ColegioDNO
        <small>Lista de Recursos</small>
    </h1>



    <div class="row">
    <?php
      // CONEXION A LA BBDD
      $conexion = mysqli_connect("localhost","root","","proyecto_reservas");
      $acentos=mysqli_query($conexion,"SET NAMES 'utf8'");

      $query = "SELECT * FROM tbl_recursos";
      $lanzarquery = mysqli_query($conexion,$query);


      
      while($resultado=mysqli_fetch_array($lanzarquery)){
        if($resultado['recurso_estado']=="Disponible"){
          echo "<div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>";
            echo "<div class='card h-100'>";
              echo "<a href='#''><img class='card-img-top' src='img/Aula.jpg' alt=''></a>";
              echo "<div class='card-body' style='background-color:#A9F5BC;'>";
                echo "<h4 class='card-title'>";
                    echo "<a href='#'>$resultado[recurso_nombre]</a>";
                  echo "</h4>";
<<<<<<< HEAD
                echo "<h6>($resultado[recurso_tipo])</h6>";
                // echo "<form action='index_reservar.php'>";
                // 	echo "<input type='hidden' name='id_recurso' value='$resultado[recurso_id]'>";
                // 	echo "<button type='submit' class='btn btn-success boton'>Reservar</button>";
                // echo "</form>";	
=======
                echo "<h6>($resultado[recurso_tipo])</h6>"; 
                // echo "<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt?</p>";
                echo "<button type='button' class='btn btn-success boton'>Reservar</button>";
>>>>>>> refs/remotes/origin/master
              echo "</div>";
            echo "</div>";
          echo "</div>";
        } else {
          echo "<div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>";
            echo "<div class='card h-100'>";
              echo "<a href='#''><img class='card-img-top' src='img/Aula.jpg' alt=''></a>";
              echo "<div class='card-body' style='background-color:#FA5858;'>";
                echo "<h4 class='card-title'>";
                    echo "<a href='#'>$resultado[recurso_nombre]</a>";
                  echo "</h4>";
                  echo "<h6>($resultado[recurso_tipo])</h6>";
                  $query2 = "SELECT tbl_reservasrecursos.reservarecurso_id, tbl_recursos.recurso_id, tbl_usuarios.usuario_nombre, tbl_reservasrecursos.reservarecurso_fechareserva
                    FROM ((`tbl_reservasrecursos`
                    INNER JOIN tbl_recursos ON tbl_reservasrecursos.reservarecurso_recurso = tbl_recursos.recurso_id)
                    INNER JOIN tbl_usuarios ON tbl_reservasrecursos.reservarecurso_usuario = tbl_usuarios.usuario_id)
                    WHERE tbl_reservasrecursos.reservarecurso_estado='Reservado' AND tbl_recursos.recurso_id=$resultado[recurso_id]";
                  $lanzarquery2 = mysqli_query($conexion,$query2); 
                  while($resultado2=mysqli_fetch_array($lanzarquery2)){
                    echo "Reservado por: <b>$resultado2[usuario_nombre] </b></br>";
                    echo "Fecha reserva: ";
                    echo date ('d-m-Y', strtotime($resultado2['reservarecurso_fechareserva']));
                    echo " (";
                    echo date ('G:i:s', strtotime($resultado2['reservarecurso_fechareserva']));
                    echo ") </br>";
<<<<<<< HEAD
                    // echo "<form action='index_devolver.php'>";
                    // 	echo "<input type='hidden' name='id_reserva' value='$resultado2[reservarecurso_id]'>";
                    // 	echo "<button type='submit' class='btn btn-danger boton'>Devolver</button>";
                    // echo "</form>"; 
=======
>>>>>>> refs/remotes/origin/master
                  }
                // echo "<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt?</p>";
                echo "<button type='button' class='btn btn-danger boton'>Devolver</button>";
              echo "</div>";
            echo "</div>";
          echo "</div>";
        } 
        
    }
    echo "</div>";
    ?>

    

  </div>
  <!-- /.container -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
