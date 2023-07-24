<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
<!-- Template Stylesheet -->
<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
<link rel="stylesheet" type="text/css" href="../css/menu5.css">
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
      
    <li><a href="#" style="color: yellow;"><i class="fa fa-fonticons" aria-hidden="true"></i> Ficha Técnica</a></li>

      <li><a href="../historico/"><i class="fa fa-history" aria-hidden="true"></i>  Historial</a></li>
      <li><a href="../impresora/"><i class="fa fa-print" aria-hidden="true"></i>  Dispositivos</a></li>
      <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>  Vistas</a></li>
      <li><a href="../reportes/index.php"><i class="fa fa-history" aria-hidden="true"></i>  Reportes</a><li>

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
  <div class="container">
    <h1 class="title">Reportes</h1>

    <div class="cards">


    
    <a href="reporte_ficha_sede_fecha.php"><div class="card">
        <i class="fa fa-file-text fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Ficha Fecha</h4>
       
    </div></a>

    <a href="historico"><div class="card">
        <i class="fa fa-history fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Historial Fecha</h4>
       
    </div></a>

    <a href="Ficha"><div class="card">
        <i class="fa fa-file-text fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Dispostivos Fecha</h4>
       
    </div></a>

    <a href="impresora"><div class="card">
    <i class="fa fa-file-text fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Ficha General</h4>
      
    </div></a>

    <a href="./reportes/"><div class="card">
    <i class="fa fa-history fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Historial General</h4>
     
    </div></a>

    <a href="Ficha"><div class="card">
        <i class="fa fa-file-text fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Dispostivos General</h4>
       
    </div></a>

    <a href="./vistas/index.php"><div class="card">
    <i class="fa fa-file-text fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Ficha Serial</h4>
    </div></a>


    <a href="/"><div class="card">
    <i class="fa fa-history fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Historial Serial</h4>
      
    </div></a> 

    <a href="Ficha"><div class="card">
        <i class="fa fa-file-text fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Dispostivos Serial</h4>
       
    </div></a>

    <a href="reporte_sede.php"><div class="card">
    <i class="fa fa-file-text fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Ficha Sede</h4>
    </div></a>


    <a href="reporte_sede_historial.php"><div class="card">
    <i class="fa fa-history fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Historial Sede</h4>
      
    </div></a> 

    <a href="Ficha"><div class="card">
        <i class="fa fa-file-text fa-5x" aria-hidden="true" style="color: white;"></i>
        <h4>Dispostivos Sede</h4>
       
    </div></a>

    </div>

    </div>

    </div>

   

</body>
</html>