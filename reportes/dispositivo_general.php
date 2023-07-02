
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte General</title>
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
      <li><a href="../impresora/"><i class="fa fa-print" aria-hidden="true"></i>  Impresora</a></li>
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
    <a href="form_login.php"><i class='fa fa-sign-out'> Cerrar Secciòn</i></a>

    <footer> 
      <a href="/">Desarrollado por Integratic © 2023</a>
    </footer>
    </div>

    



  </div>  

<div style="margin-left: 50px;">

<div class="container">

<div class="box-sede">

  <h1>Dispositivo General</h1>

  <form  method="post" action="general_dispositivo.php">

  <div class="form-submit-btn">
  <button type="submit" name="Formulario">Generar PDF </button>
  </div>



</form>


  </div>

</div>
  </div> 

</body>
</html>

