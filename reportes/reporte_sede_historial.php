<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sede Historial</title>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
<!-- Template Stylesheet -->
<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
     <link rel="stylesheet" type="text/css" href="../css/formulari.css">

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
      
      <li><a href="../Ficha/index.php"><i class="fa fa-fonticons" aria-hidden="true"></i> Ficha Técnica</a></li>
      <li><a href="#"><i class="fa fa-history" aria-hidden="true"></i> Historial</a></li>
      <li><a href="../impresora/"><i class="fa fa-print" aria-hidden="true"></i>  Dispositivos</a></li>
      <li><a href="/"><i class="fa fa-eye" aria-hidden="true"></i>  Vistas</a></li>
    

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
    <a href="../form_login.php"><i class='fa fa-sign-out'> Cerrar Sección</i></a>


    <footer> 
      <a href="/">Desarrollado por Integratic © 2023</a>
    </footer>
    </div>

    



  </div>  

<div style="margin-left: 50px;">  

<div class="container">

  <div class="box-sede">

  <h1>Historiales por Sede</h1>

<form action="historial.php" method="post" >
  <label for="sede">Seleccionar Sede:</label>
  <select id="sede" name="sede">
    <option value="">Seleccione una sede</option>
    <option value="Secretaria de Salud">Secretaria de Salud</option>
    <option value="Secretaria de Hacienda">Secretaria de Hacienda</option>
    <option value="Secretaria Cultura">Secretaria Cultura</option>
    <option value="D.A.G.M.A">D.A.G.M.A</option>
    <option value="U.A.E.G.B.S">U.A.E.G.B.S</option>
    <!-- Agrega más opciones según tus necesidades -->
  </select>
  
  <div class="form-submit-btn">
  <button type="submit" name="Formulario">Generar PDF</button>
  </div>


<?php
// Verificar si se ha enviado el formulario para generar el PDF
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Formulario'])) {
// Obtener el valor de la sede seleccionada
$sede = $_POST['sede'];

// Redirigir al archivo generar_pdf.php y pasar la sede como parámetro
header('Location: historial.php?sede=' . urlencode($sede));
exit();
}
?>


</form>

  </div>

</div>
  </div> 

</body>
</html>