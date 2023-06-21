<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial del Equipo</title>
    
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
<!-- Template Stylesheet -->
<link rel="stylesheet" type="text/css" href="1002.css">

</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="logo.png" alt="Logo">
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
      
      <li><a href="#"><i class="fa fa-fonticons" aria-hidden="true"></i> Ficha Técnica</a></li>
      <li><a href="#"><i class="fa fa-history" aria-hidden="true"></i> Historial</a></li>
      
    

    <script src="script.js"></script>


  <div class="dropdown">
    <li class="dropbtn"><a><i class="fa fa-history" aria-hidden="true"></i> Reporte</a><li>
    <ul class="dropdown-content" style="margin-left: 20px;">
    <li><a href="#">Sede</a></li>
    <li><a href="#">Serial</a></li>
    <li><a href="#">General</a></li>
    </ul>
  </div>

  </ul>
    
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

<form method="post">


<div class="fecha">


<div>
<?php
$fechaActual = date('d-m-y');
?>
<label for="fecha"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha:</label>
<input type="text" id="fecha" name="fecha" value="<?php echo $fechaActual; ?>" class="no-border" readonly style="border: none;  background-color: transparent; outline: none; ">
</div>

<div>
<?php
    // Establecer la zona horaria
    date_default_timezone_set('America/Bogota');
    // Obtener la hora actual
    $horaActual = date('H:i:s A'); 
?>
<label for="hora"><i class="fa fa-clock-o" aria-hidden="true"></i> Hora:</label>
<input type="text" id="hora" name="hora" value="<?php echo $horaActual; ?>" class="no-border" readonly style="border: none;  background-color: transparent; outline: none;  ">
</div>

</div>

    <h1 class="form-title">Historial del Equipo</h1>
  
    <div class="ali">

    <div class="main-user-info">

    <div class="user-input-box" style="width: 100% !important; justify-content: start;">
    <div class="user-input-box">
    <label for="serial" style="margin: 5px;">Serial:</label>
    <input class="serial" type="text" id="serial" name="serial" placeholder="Serial del Equipo:">
    </div>
    </div>


    <div class="user-input-box">
    <label for="empresa" style="margin: 5px;">Empresa:</label>
    <input type="text" id="empresa" name="empresa" placeholder="Nombre de la Empresa:">
    </div>

    <div class="user-input-box">
    <label for="sede" style="margin: 5px;">Sede:</label>
    <input type="text" id="sede" name="sede" placeholder="Sede:">
    </div>

    <div class="user-input-box">
    <label for="departamento" style="margin: 5px;">Departamento:</label>
    <input type="text" id="departamento" name="departamento" placeholder="Departamento:">
    </div>

    <div class="user-input-box">
    <label for="" style="margin: 5px;">Tipo de Mantenimiento</label>
    <select class="custom-select" id="tipo_mant" name="tipo_mant">
      <option value="">Tipo de Mantenimiento:</option>
      <option value="Diagnóstico">Diagnóstico</option>
      <option value="Preventivo">Preventivo</option>
      <option value="Correctivo">Correctivo</option>
      <option value="Remoto">Remoto</option>
    </select>
    </div>

    <div class="user-input-box">
    <label for="nom_tec">Nombre del Técnico:</label>
    <select class="custom-select" id="nom_tec" name="nom_tec">
    <option value="">Nombre del Técnico:</option>
    <option value="Denyer Bastida">Denyer Bastida</option>
    <option value="Michael Asprilla">Michael Asprilla</option>
    <option value="Steven Gomez">Steven Gomez</option>
    <option value="Andrés Agudelo">Andrés Agudelo</option>
    <option value="Heimdall Rojas">Heimdall Rojas</option>
    </select>
    </div>

    <div class="user-input-box" style="width: 100% !important; margin-bottom: 20px;">
    <label for="observacion"> Diagnostico Actual:</label>
    <div class="user-input-mega-box">
    <label id="observacion" rows="4" name="observacion">sdfvk,sbadjknñlknafclansmdlkqwsdñlsñdlmsa,.dcma,.smcdña,smdñlamd,sd xñ,cvmsdañlfjmsadñlfcmñldmfcñlsadmñlsadm</label>
    </div>
    </div>

    <div class="user-input-box" style="width: 100% !important;">
    <label for="observacion"> Diagnostico Actual:</label>
    <textarea id="observacion" rows="4" name="observacion"></textarea>
    </div>

    <div class="user-input-box" style="width: 100% !important;">
    <label for="recomendaciones">Recomendaciones:</label>
    <textarea id="recomendaciones" rows="4" name="recomendaciones"></textarea>
    </div>
    <!--
    <label for="nom_tec">Nombre del Técnico:</label>
    <input type="text" id="nom_tec" name="nom_tec">-->



<!-- Botones-->
    <div class="form-submit-btn">
    <input type="submit" id="guardarBtn" name="agregar" value="Guardar"></input>
    <input type="submit" name="editar" value="Editar"></input>
    </div>
    
</div>

</div>
</form>

  


     

<!-- Acciones de los botones -->
  <?php
  //Acciones de los submit
if (isset($_POST['agregar'])) {
  // Código para manejar el registro
  //echo "Registro Guardado";
  include('insertar.php');
    
} else if (isset($_POST['editar'])) {
  // Código para manejar la edición de un registro
   // include('actualizar.php');
  echo "Registro Editado";
   //include('modificar.php');


} else if (isset($_POST['eliminar'])) {
  // Código para manejar la eliminación de un registro
  echo "Registro eliminado";
 // include('eliminar.php');
}
?>

<!--Script para buscar en tiempo real la cedula, llamando el archivo buscar.php-->
<script>
//La infomación de la base de datos va a cada input del formulario
document.getElementById("serial").addEventListener("input", function() {
  var input = this.value;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "buscar.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var response = JSON.parse(this.responseText);
      if (response.exists) {
        document.getElementById("empresa").value = response.empresa;
        document.getElementById("sede").value = response.sede;
        document.getElementById("departamento").value = response.departamento;
        
        
      }
    }
  };
  xhr.send("input=" + input);
});
</script>

</div>

</div>


</body>
</html>