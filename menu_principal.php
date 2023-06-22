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
    <title>Document</title>
  <link rel="stylesheet" type="text/css" href="css/1002.css">
  <link rel="stylesheet" href="css/2004.css">
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
    <div class="logo">
        <img src="logo.png" alt="Logo">
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
    <a href="form_login.php"><i class='fa fa-sign-out'> Cerrar Seccion</i></a>

    <footer> 
      <a href="/">Desarrollado por Integratic © 2023</a>
    </footer>
    </div>

    </div>

    <div style="margin-left: 50px;">

    <div class="container">
    <h1 class="title">Menù Principal</h1>

    <div class="cards">


    
    <div class="card">
        <a href="Ficha">
        <img src="img/Denyer.jpeg" alt="">
        <h4>Ficha tecnica de Computadoras</h4>
        <p>Caracteristicas</p>
        </a>
    </div>

    <div class="card">
        <a href="historico">
        <img src="img/Denyer.jpeg" alt="">
        <h4>Historial de Computadoras</h4>
        <p>Caracteristicas</p>
        </a>
    </div>

    <div class="card">
        <a href="/">
        <img src="img/Denyer.jpeg" alt="">
        <h4>Ficha tecnica de Impresoras</h4>
        <p>Caracteristicas</p>
        </a>
    </div>

    <div class="card">
        <a href="/">
        <img src="img/Denyer.jpeg" alt="">
        <h4>Historial de Impresoras</h4>
        <p>Caracteristicas</p>
        </a>
    </div>

    <div class="card">
        <a href="/">
        <img src="img/Denyer.jpeg" alt="">
        <h4>Reporte</h4>
        <p>Caracteristicas</p>
        </a>
    </div>

    <div class="card">
        <a href="/">
        <img src="img/Denyer.jpeg" alt="">
        <h4>Configuraciones</h4>
        <p>Caracteristicas</p>
        </a>
    </div>

    <div class="card">
        <a href="/">
        <img src="img/Denyer.jpeg" alt="">
        <h4>Estadisticas</h4>
        <p>Caracteristicas</p>
        </a>
    </div>

    </div>

    </div>

    </div>

   

</body>
</html>