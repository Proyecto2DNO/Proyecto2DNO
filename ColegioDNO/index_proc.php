<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>ColegioDNO - Lista de Recursos</title>


  <!-- Bootstrap core CSS -->


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
    	<form name="buscador" action="index_proc.php" method="GET">
	        <div class="form-group w3-bar-item">
	          <label for="usr">Nombre del recurso:</label>
	          <input type='text' class='form-control' id='nombre' name='nombre'>
	          <br/>
	          	<select class="form-control" id="tipo_recurso" name="tipo_recurso">
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
	          <select class="form-control" id="estado" name="estado" onChange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor">
		          <option style="background-color: white; color: black;" disabled selected>Estado</option>
		          <option style="background-color: #A9F5BC; color: black;">Disponible</option>
		          <option style="background-color: #F78181; color: black;">Reservado</option>
		          <option style="background-color: #E6E6E6; color: black;">Devuelto</option>
	          </select>
	        </br>
	        <button type="submit" class="btn btn-default" style="margin: auto; width: 58%; background-color:white!important;border: 1px solid #ced4da!important;">Filtrar</button>
	        <button type="reset" value="reset" class="btn btn-default" style="float:right; margin: auto; width: 40%; background-color:white!important;border: 1px solid #ced4da!important;" onClick="document.getElementById('estado').style.backgroundColor='#fff'">Limpiar</button>
      	</form>
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
      $conexion = mysqli_connect("localhost","root","","colegiodno");
      $acentos=mysqli_query($conexion,"SET NAMES 'utf8'");

      if(isset($_GET['nombre'])){
      	 $nombre=$_GET['nombre'];
      }
      if (isset($_GET['tipo_recurso'])){
      	$tipo_recurso=$_GET['tipo_recurso'];

      } else {
      	$tipo_recurso='';
      }

      if(isset($_GET['estado'])){
		$estado=$_GET['estado'];
      } else {
      	$estado='';
      }

      $query = "SELECT * FROM tbl_recursos WHERE recurso_nombre LIKE '%$nombre%' AND recurso_tipo LIKE '%$tipo_recurso%' AND recurso_estado LIKE '%$estado%'";
      $lanzarquery = mysqli_query($conexion,$query);      
      while($resultado=mysqli_fetch_array($lanzarquery)){
        if($resultado['recurso_estado']=="Disponible"){
          echo "<div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>";
            echo "<div class='card h-100'>";
              echo "<a href='#''><img class='card-img-top' src='img/Aula.jpg' alt=''></a>";
              echo "<div class='card-body' style='background-color:#A9F5BC;'>";
                echo "<h4 class='card-title'>";
                    echo "ID: $resultado[recurso_id] ";
                    echo "<a href='#'>$resultado[recurso_nombre]</a>";
                  echo "</h4>";
                echo "<h6>($resultado[recurso_tipo])</h6>"; 
                echo "<form action='index_reservar.php'>";
                	echo "<input type='text' name='id_recurso' value='$resultado[recurso_id]'>";
                	echo "<button type='submit' class='btn btn-success boton'>Reservar</button>";
                echo "</form>";
              echo "</div>";
            echo "</div>";
          echo "</div>";
        } else {
          echo "<div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>";
            echo "<div class='card h-100'>";
              echo "<a href='#''><img class='card-img-top' src='img/Aula.jpg' alt=''></a>";
              echo "<div class='card-body' style='background-color:#FA5858;'>";
                echo "<h4 class='card-title'>";
                    echo "ID: $resultado[recurso_id] ";
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
                    echo "<form action='index_devolver.php'>";
                    	echo "<input type='hidden' name='id_reserva' value='$resultado2[reservarecurso_id]'>";
                    	echo "<button type='submit' class='btn btn-danger boton'>Devolver</button>";
                    echo "</form>"; 
                  } 
              echo "</div>";
            echo "</div>";
          echo "</div>";
        } 
        
    }
    echo "</div>";
    ?>

    <h3 class="my-4">Reservados y Devueltos</h3>
    <?php
    echo "<div class='row'>";
    $q = "SELECT tbl_reservasrecursos.reservarecurso_id, tbl_recursos.recurso_nombre, tbl_recursos.recurso_tipo, tbl_recursos.recurso_img, tbl_usuarios.usuario_nombre, tbl_reservasrecursos.reservarecurso_estado, tbl_reservasrecursos.reservarecurso_fechareserva, tbl_reservasrecursos.reservarecurso_fechadevolucion
    FROM ((`tbl_reservasrecursos`
    INNER JOIN tbl_recursos ON tbl_reservasrecursos.reservarecurso_recurso = tbl_recursos.recurso_id)
    INNER JOIN tbl_usuarios ON tbl_reservasrecursos.reservarecurso_usuario = tbl_usuarios.usuario_id)";
    $busqueda = mysqli_query($conexion, $q);
    while ($result=mysqli_fetch_array($busqueda)){
      if($result['reservarecurso_estado']=="Reservado"){
        echo "<div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>";
          echo "<div class='card h-100'>";
            echo "<a href='#''><img class='card-img-top' src='img/Aula.jpg' alt=''></a>";
            echo "<div class='card-body' style='background-color:#FA5858;'>";
              echo "<h4 class='card-title'>";
                  echo "ID: $result[reservarecurso_id] ";
                  echo "<a href='#'>$result[recurso_nombre]</a>";
                echo "</h4>";
              echo "<h6>($result[recurso_tipo])</h6>";
              echo "Reservado por: <b>$result[usuario_nombre] </b></br>";
              echo "Fecha reserva: ";
              echo date ('d-m-Y', strtotime($result['reservarecurso_fechareserva']));
              echo " (";
              echo date ('G:i:s', strtotime($result['reservarecurso_fechareserva']));
              echo ")";  
              // echo "<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt?</p>";
                echo "<button type='button' class='btn btn-danger boton'>Devolver</button>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      } else {
        echo "<div class='col-lg-3 col-md-4 col-sm-6 portfolio-item'>";
          echo "<div class='card h-100'>";
            echo "<a href='#''><img class='card-img-top' src='img/Aula.jpg' alt=''></a>";
            echo "<div class='card-body' style='background-color:#E6E6E6;'>";
              echo "<h4 class='card-title'>";
                  echo "ID: $result[reservarecurso_id] ";
                  echo "<a href='#'>$result[recurso_nombre]</a>";
                echo "</h4>";
              echo "<h6>($result[recurso_tipo])</h6>";
              echo "Reservado por: <b>$result[usuario_nombre] </b></br>";
              echo "Fecha reserva: ";
              echo date ('d-m-Y', strtotime($result['reservarecurso_fechareserva']));
              echo " (";
              echo date ('G:i:s', strtotime($result['reservarecurso_fechareserva']));
              echo ") </br>";
              echo "Fecha devolución: ";
              echo date ('d-m-Y', strtotime($result['reservarecurso_fechadevolucion']));
              echo " (";
              echo date ('G:i:s', strtotime($result['reservarecurso_fechadevolucion']));
              echo ")";   
              // echo "<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt?</p>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      } 
    }
    echo "</div>";
    ?>

    </div>
    <!-- /.row -->


  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
      <p class="m-0 text-center text-white">Copyright &copy; ColegioDNO 2017</p>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
