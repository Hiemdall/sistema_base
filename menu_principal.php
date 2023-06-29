<?php
        session_start(); // Iniciar la sesión
        
        // Obtener los valores de la sesión
        $username = $_SESSION['username'];
        $access_level = $_SESSION['access_level'];
        $email = $_SESSION['email'];
        $archivo = $_SESSION['archivo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <link rel="stylesheet" href="css/menu-i.css">
  <!-- Favicon -->
  <link href="logo.png" rel="icon">

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
</head>
<body>
  <div class="sidebar">
  <div class="logo"><a href="#">
        <img src="./img/logo.png" alt="Logo">
        </a>
    </div>

    <div class="usuario">
        <div class="img">
          <?php
           echo "<img src='img/$archivo' alt='Imagen de usuario'>";
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
    
    

    <div class="exit">
    <a href="#"><i class="fa fa-cog" aria-hidden="true"></i></a>
    <a href="form_login.php"><i class='fa fa-sign-out'> Cerrar Secciòn</i></a>

    <footer> 
      <a href="/">Desarrollado por Integratic © 2023</a>
    </footer>
    </div>

    </div>

    <div style="margin-left: 50px;">

    <div class="container">
    <h1 class="title">Menú Principal</h1>

    <div class="cards">


    
    <a href="Ficha"><div class="card">
        <i class="fa fa-file-text fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Ficha tecnica de Computadoras</h4>
        <p>Caracteristicas</p>
    </div></a>

    <a href="historico"><div class="card">
        <i class="fa fa-history fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Historial de Computadoras</h4>
        <p>Caracteristicas</p>
    </div></a>

    <a href="impresora"><div class="card">
        <i class="fa fa-print fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Impresoras</h4>
        <p>Caracteristicas</p>
    </div></a>

    <a href="./reportes/"><div class="card">
        <i class="fa fa-files-o fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Reporte</h4>
        <p>Caracteristicas</p>
    </div></a>

    <a href="/"><div class="card">
        <i class="fa fa-cog fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Configuraciones</h4>
        <p>Caracteristicas</p>
    </div></a>

    <a href="/"><div class="card">
        <i class="fa fa-bar-chart fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Estadisticas</h4>
        <p>Caracteristicas</p>
    </div></a>

    </div>

    </div>

    </div>

   

</body>
</html>