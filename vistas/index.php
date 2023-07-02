<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Impresora</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
     <link rel="stylesheet" type="text/css" href="../css/formulari.css">
     <!-- Generar una alerta con SweetAlert -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
  

  

  <!-- Favicon -->
  <link href="../img/logo.png" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet">


    <!-- Icon Font Stylesheet -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
</head>
<body>
  <div class="sidebar">
  <div class="logo"><a href="../menu_principal.php">
        <img src="../img/logo.png" alt="Logo">
        </a>
    </div>

    <?php
        session_start(); // Iniciar la sesión
        
        // Obtener los valores de la sesión
        $username = $_SESSION['username'];
        $access_level = $_SESSION['access_level'];
        $email = $_SESSION['email'];
        $archivo = $_SESSION['archivo'];
?>
    
   <div class="usuario">
        <div class="img">
          <?php
           echo "<img src='../img/$archivo' alt='Imagen de usuario'>";
          ?>
        </div>

        <!-- Usuario-->
        <p>
          <?php
           echo $username;
          ?>
        </p>

         <!-- Email usuario-->
        <p>
        <?php
           echo $email;
          ?>
        </p>


    </div>

    <div class="list-opcion">
    
    <ul>
      
      <li><a href="../Ficha/index.php"><i class="fa fa-fonticons" aria-hidden="true"></i>  Ficha Técnica</a></li>
      <li><a href="../historico/"><i class="fa fa-history" aria-hidden="true"></i>  Historial</a></li>
      <li><a href="../impresora/"><i class="fa fa-print" aria-hidden="true"></i>  Dispositivos</a></li>
      <li><a href="vistas/index.php"><i class="fa fa-eye" aria-hidden="true"></i>  Vistas</a></li>
      
    

    <script src="../js/script.js"></script>


    <div class="dropdown">
    <li class="dropbtn"><a href="index.php"><i class="fa fa-history" aria-hidden="true"></i>  Reporte</a><li>
    <ul class="dropdown-content">
    <li><a href="reporte_sede.php">Ficha sede</a></li>
    <li><a href="reporte_sede_historial.php">historial Sede</a></li>

    <li><a href="/">Serial Ficha</a></li>
    <li><a href="/">Serial Historial</a></li>

    <li><a href="reporte_general.php">General Ficha</a></li>
    <li><a href="reporte_general_historial.php">General Historial</a></li>

    <li><a href="dispositivo_general.php">Dispositivo general</a></li>
    <li><a href="reporte_dispositivos.php">Dispositivo sede</a></li>
    </ul>
    </div>

   </ul>

  </div>
    
   

    <div class="exit">
       <!--<a href="#"><i class="fa fa-cog" aria-hidden="true"></i></a>-->
       <a href="form_login.php"><i class='fa fa-sign-out'> Cerrar Sección</i></a>

    <footer> 
      <a href="/">Desarrollado por Integratic © 2023</a>
    </footer>
    </div>

    

<div style="margin-left: 50px;">


<div class="container">

<div class="box">


<h1>Vista</h1>

<form method="post">
  <label for="sede">Seleccionar Sede:</label>
  <select id="sede" name="sede">
    <option value="">Seleccione una sede</option>
    <option value="Charco Azul">Charco Azul</option>
    <option value="Comuneros II">Comuneros II</option>
    <option value="Calipso">Calipso</option>
    <!-- Agrega más opciones según tus necesidades -->
  </select>
  <div class="form-submit-btn">
  <button type="submit" name="Formulario">Generar PDF</button>
  </div>


</form>

</div>

<div class="pantalla" style="width: 500px; height: 500px;">

  <?php
  // Verificar si se envió el formulario
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el valor de la sede seleccionada
    $sede = $_POST['sede'];

    // Validar que se haya seleccionado una sede
    if (!empty($sede)) {
      // Llamar al archivo de conexión a la base de datos
      include("../procesos/conexion.php");

      // Consulta en la base de datos
      $sql = "SELECT serial, empresa, sede, departamento, fecha, hora, tipo_mant, observacion, recomendaciones, nom_tec  FROM historial WHERE sede = '$sede'";
      $result = mysqli_query($conn, $sql);

      // Verificar si se encontraron resultados
      if (mysqli_num_rows($result) > 0) {
        // Obtener los valores de Empresa y Sede
      // $row = mysqli_fetch_assoc($result);
      //  $empresa = $row['empresa'];
      //  $sede = $row['sede'];

        echo '<table>
                <thead>
                    <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Departamento</th>
                    <th>Serail</th>
                    <th>Tipo de Mantenimiento</th>
                    <th>Observación</th>
                    <th>Recomendaciones</th>
                    <th>Técnico</th>
                  </tr>
                </thead>
                <tbody>';
        // Recorrer los resultados y mostrarlos en la tabla
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . $row['fecha'] . '</td>';
          echo '<td>' . $row['hora'] . '</td>';
          echo '<td>' . $row['departamento'] . '</td>';
          echo '<td>' . $row['serial'] . '</td>';
          echo '<td>' . $row['tipo_mant'] . '</td>';
          echo '<td>' . $row['observacion'] . '</td>';
          echo '<td>' . $row['recomendaciones'] . '</td>';
          echo '<td>' . $row['nom_tec'] . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo 'No se encontraron historiales para la sede seleccionada.';
      }

      // Cerrar la conexión a la base de datos
      mysqli_close($conn);
    } else {
      echo 'Por favor, seleccione una sede.';
    }
  }
  ?>

</div>

</body>

</html>

