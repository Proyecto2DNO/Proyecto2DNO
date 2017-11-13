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
  <title>4 Col Portfolio - Start Bootstrap Template</title>


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
        <select class="form-control" id="selector 1" onChange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor">
        <option style="background-color: white; color: black;" disabled selected>Estado</option>
        <option style="background-color: #A9F5BC; color: black;">Disponible</option>
        <option style="background-color: #F78181; color: black;">Reservado</option>
        <option style="background-color: #E6E6E6; color: black;">Devuelto</option>


    </select>

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
                echo "<h6>($resultado[recurso_tipo])</h6>";  
                // echo "<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt?</p>";
                echo "<button type='button' class='btn btn-success boton'>Reservar</button>";
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
                // echo "<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt?</p>";
                echo "<button type='button' class='btn btn-danger boton'>Reservar</button>";
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
                  echo "<a href='#'>$result[recurso_nombre]</a>";
                echo "</h4>";
              echo "<h6>($result[recurso_tipo])</h6>";  
              // echo "<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt?</p>";
                echo "<button type='button' class='btn btn-danger boton'>Reservar</button>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      } else {
        
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
