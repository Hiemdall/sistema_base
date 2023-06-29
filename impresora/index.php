<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Impresora</title>
  <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
  <link rel="stylesheet" type="text/css" href="../css/formularios.css">
  

  <!-- Favicon -->
  <link href="../img/logo.png" rel="icon">

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
      
      <li><a href="#"><i class="fa fa-fonticons" aria-hidden="true"></i>  Ficha Técnica</a></li>
      <li><a href="../historico/"><i class="fa fa-history" aria-hidden="true"></i>  Historial</a></li>
      <li><a href="../impresora/"><i class="fa fa-print" aria-hidden="true" style="color: white;"></i>  Impresora</a></li>
      
    

    <script src="../js/script.js"></script>


    <div class="dropdown">
    <li class="dropbtn"><a href="index.php"><i class="fa fa-history" aria-hidden="true"></i> Reporte</a><li>
    <ul class="dropdown-content" style="margin-left: 20px;">
    <li><a href="../reportes/reporte_sede.php">Ficha por sede</a></li>
    <li><a href="../reportes/reporte_sede_historial.php">historial por Sede</a></li>


    <li><a href="reporte_general.php">Serial</a></li>
    <li><a href="#">General</a></li>
    </ul>
    </div>

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



<!-- *****************************           Formulario de ficha de Impresora         *****************************************-->
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

<h1 class="form-title">Ficha de Impresora</h1>

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
    <label for="activo" style="margin: 5px;">Activo Fijo:</label>
    <input type="text" id="activo_fijo" name="activo_fijo" placeholder="Activo Fijo:">
    </div>

    <div class="user-input-box">
    <label for="modelo" style="margin: 5px;">Modelo:</label>
    <input type="text" id="modelo" name="modelo" placeholder="Modelo:">
    </div>

    <div class="user-input-box">
    <label for="fabricante" style="margin: 5px;">Fabricante:</label>
    <input type="text" id="fabricante" name="fabricante" placeholder="Fabricante:">
    </div>
     
    <div class="user-input-box">
    <label for="IP" style="margin: 5px;">IP del Equipo:</label>
    <input type="text" id="ip_equipo" name="ip_equipo" placeholder="IP del Equipo:">
    </div>

    <div class="user-input-box">
    <label for="" style="margin: 5px;">Tipo de Equipo:</label>
    <select class="custom-select" id="tipo_equipo" name="tipo_equipo">
    <option value="">Tipo de Equipo:</option>
    <option value="Impresora">Impresora</option>
    <option value="Scanner">Scanner</option>
    <option value="Video Beam">Video Beam</option>
    <option value="Plotter">Plotter</option>
    <option value="UPS">UPS</option>
    </select>
    </div>
    
    <div class="user-input-box" style="width: 100% !important;">
    <label for="observacion"> Diagnostico:</label>
    <textarea id="observacion" rows="4" name="observacion"></textarea>
    </div>

    <div class="user-input-box" style="width: 100% !important;">
    <label for="recomendaciones">Recomendaciones:</label>
    <textarea id="recomendaciones" rows="4" name="recomendaciones"></textarea>
    </div>
    
    <div class="user-input-box" style="width: 20% !important;">
    <label for="repuesto">Repuesto:</label>
    <input type="checkbox" id="repuesto" name="repuesto" value="1">
    </div>

    <div class="user-input-box" style="width: 100% !important;">
    <label for="detalle"></label>
    <textarea id="detalle" rows="4" name="detalle"></textarea>
    </div>

    <div class="form-submit-btn">
    <input type="submit" id="guardarBtn" name="agregar" value="Guardar" style="width: 100px;  text-align: center;"></input>
    <input type="submit" name="editar" value="Editar" style="width: 90px;   text-align: center;"></input>
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
include('modificar.php');
//echo "Registro Editado";
//include('modificar.php');
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
    document.getElementById("fecha").value = response.fecha;
    document.getElementById("hora").value = response.hora;
    document.getElementById("activo_fijo").value = response.activo_fijo;
    document.getElementById("modelo").value = response.modelo;
    document.getElementById("fabricante").value = response.fabricante;
    document.getElementById("ip_equipo").value = response.ip_equipo;
    document.getElementById("observacion").value = response.observacion;
    document.getElementById("recomendaciones").value = response.recomendaciones;
    document.getElementById("detalle").value = response.detalle;
    
    // Checkbox de repuesto
    var repuestoCheckbox = document.getElementById("repuesto");
        if (response.repuesto === "Sí") {
          repuestoCheckbox.checked = true;
        } else {
          repuestoCheckbox.checked = false;
        }



   //**************************** Select tipo de equipo *************************** */
   // Este código se utiliza para cargar el combobox con los valores de la base de datos
    // Obtener el elemento select
    const selectElementTipoEquipo = document.getElementById("tipo_equipo");
   // Buscar si existe una opción con el valor de response.tipo_equipo
   let optionTipoEquipo = selectElementTipoEquipo.querySelector(`option[value="${response.tipo_equipo}"]`);
   if (!optionTipoEquipo) {
   // Si no existe la opción, agregar una nueva
   optionTipoEquipo = document.createElement("option");
   optionTipoEquipo.value = response.tipo_equipo;
   optionTipoEquipo.textContent = response.tipo_equipo;
   selectElementTipoEquipo.appendChild(optionTipoEquipo);
  }   
  // Establecer el atributo selected de la opción
  optionTipoEquipo.selected = true;

  
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
