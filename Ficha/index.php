<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha técnica</title>
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
      
    <li><a href="#" style="color: yellow;"><i class="fa fa-fonticons" aria-hidden="true"></i> Ficha Técnica</a></li>

      <li><a href="../historico/"><i class="fa fa-history" aria-hidden="true"></i>  Historial</a></li>
      <li><a href="../impresora/"><i class="fa fa-print" aria-hidden="true"></i>  Dispositivos</a></li>
      <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>  Vistas</a></li>
      <li><a href="./reportes/index.php"><i class="fa fa-history" aria-hidden="true"></i>  Reportes</a><li>

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



<!-- *****************************           Formulario de ficha técnica           *****************************************-->
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

<h1 class="form-title">Ficha Técnica del Equipo</h1>

<div class="ali">

<div class="main-user-info">


    <div class="user-input-box" style="width: 50% !important; justify-content: start;">
    <div class="user-input-box" style="width: 60% !important;">
    <label for="serial" style="margin: 5px;">Serial:</label>
    <input class="serial" type="text" id="serial" name="serial" placeholder="Serial del Equipo:" onkeydown="moveToNextInput(event, 'empresa')" required>
    </div>
    </div>

    <div class="user-input-box" style="width: 50% !important; justify-content: end;">
    <div class="user-input-box" style="width: 60% !important;">
    <label for="nombre">Nombre Técnico:</label>
    <input type="text" id="nombre" name="nombre" readonly>
    </div>
    </div>

    <div class="user-input-box">
    <label for="empresa" style="margin: 5px;">Empresa:</label>
    <input type="text" id="empresa" name="empresa" placeholder="D.A.C.P" readonly>
    </div>

    <div class="user-input-box">
    <label for="sede">Seleccionar Sede:</label>
    <select id="sede" name="sede" onkeydown="moveToNextInput(event, 'departamento')">
    <option value="">Seleccione una sede</option>
    <option value="Secretaria de Salud">Secretaria de Salud</option>
    <option value="Secretaria de Hacienda">Secretaria de Hacienda</option>
    <option value="Secretaria Cultura">Secretaria Cultura</option>
    <option value="D.A.G.M.A">D.A.G.M.A</option>
    <option value="U.A.E.G.B.S">U.A.E.G.B.S</option>
    <!-- Agrega más opciones según tus necesidades -->
    </select>
    </div>

    <div class="user-input-box">
    <label for="departamento" style="margin: 5px;">Departamento:</label>
    <input type="text" id="departamento" name="departamento" placeholder="Departamento:" onkeydown="moveToNextInput(event, 'nom_usuario')" required>
    </div>

    <div class="user-input-box">
    <label for="usuario" style="margin: 5px;">Usuario:</label>
    <input type="text" id="nom_usuario" name="nom_usuario" placeholder="Nombre de Usuario:" onkeydown="moveToNextInput(event, 'activo_fijo')" required>
    </div>

    <div class="user-input-box">
    <label for="activo" style="margin: 5px;">Activo Fijo:</label>
    <input type="text" id="activo_fijo" name="activo_fijo" placeholder="Activo Fijo:" onkeydown="moveToNextInput(event, 'modelo')" required>
    </div>

    <div class="user-input-box">
    <label for="modelo" style="margin: 5px;">Modelo:</label>
    <input type="text" id="modelo" name="modelo" placeholder="Modelo:" onkeydown="moveToNextInput(event, 'fabricante')" required>
    </div>

    <div class="user-input-box">
    <label for="fabricante" style="margin: 5px;">Fabricante:</label>
    <input type="text" id="fabricante" name="fabricante" placeholder="Fabricante:" onkeydown="moveToNextInput(event, 'nom_equipo')" required>
    </div>

    <div class="user-input-box">
    <label for="n_equipo" style="margin: 5px;">Nombre de Equipo:</label>
    <input type="text" id="nom_equipo" name="nom_equipo" placeholder="Nombre de Equipo:" onkeydown="moveToNextInput(event, 'ip_equipo')" required>
    </div>

    <div class="user-input-box">
    <label for="IP" style="margin: 5px;">IP del Equipo:</label>
    <input type="text" id="ip_equipo" name="ip_equipo" placeholder="IP del Equipo:" onkeydown="moveToNextInput(event, 'nom_procesador')" required>
    </div>

    <div class="user-input-box">
    <label for="procesador" style="margin: 5px;">Procesador:</label>
    <input type="text" id="nom_procesador" name="nom_procesador" placeholder="Nombre de Procesador:" onkeydown="moveToNextInput(event, 'so')" required>
    </div>

    <div class="user-input-box">
    <label for="" style="margin: 5px;">Sistema Operaivo:</label>
    <select class="custom-select" id="so" name="so" onkeydown="moveToNextInput(event, 'tipo_equipo')" required>
    <option value="">Sistema Operaivo:</option>
    <option value="Windows 10">Windows 10</option>
    <option value="Windows 11">Windows 11</option>
    <option value="Windows 8">Windows 8</option>
    <option value="Windows 7">Windows 7</option>
    <option value="Linux">Linux</option>
    <option value="macOS">macOS</option>
    </select>
    </div>

    <div class="user-input-box">
    <label for="" style="margin: 5px;">Tipo de Equipo:</label>
    <select class="custom-select" id="tipo_equipo" name="tipo_equipo" onkeydown="moveToNextInput(event, 'ram')" required>
    <option value="">Tipo de Equipo:</option>
    <option value="Escritorio">Escritorio</option>
    <option value="Portátil">Portátil</option>
    <option value="Servidor">Servidor</option>
    </select>
    </div>
  
    <div class="user-input-box">
    <label for="ram">RAM:</label>
    <input type="text" id="ram" name="ram" placeholder="8 GB RAM" onkeydown="moveToNextInput(event, 'slot')" required>
    </div>

    <div class="user-input-box">
    <label for="slot">Slot:</label>
    <input type="text" id="slot" name="slot" placeholder="2" onkeydown="moveToNextInput(event, 'capacidad')" required>
    </div>

    <div class="user-input-box">
    <label for="capacidad">Disco:</label>
    <input type="text" id="capacidad" name="capacidad" placeholder="500 GB HDD / SDD" onkeydown="moveToNextInput(event, 'comp_add')" required>
    </div>

    <div class="user-input-box" style="width: 100% !important;">
    <label for="comp_add">Componentes Adicionales:</label>
    <textarea id="comp_add" rows="4" name="comp_add" required></textarea>  
    </div>
    


    <div class="form-submit-btn">
    <input type="submit" id="guardarBtn" name="agregar" value="Guardar" style="width: 100px;  text-align: center; margin: 12px"></input>
    <input type="submit" name="editar" value="Editar" style="width: 90px;   text-align: center; margin: 12px"></input>
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


} else if (isset($_POST['eliminar'])) {
// Código para manejar la eliminación de un registro
echo "Registro eliminado";
// include('eliminar.php');
}
?>



<!--Script para buscar en tiempo real la cedula, llamando el archivo buscar.php-->
<script>

// Esta función mueve el foco al siguiente campo de entrada cuando se presiona la tecla Enter
function moveToNextInput(event, nextInputId) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById(nextInputId).focus();
  }
}


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
   // document.getElementById("sede").value = response.sede;
    document.getElementById("departamento").value = response.departamento;
    document.getElementById("nom_usuario").value = response.nom_usuario;
    document.getElementById("fecha").value = response.fecha;
    document.getElementById("hora").value = response.hora;
    document.getElementById("activo_fijo").value = response.activo_fijo;
    document.getElementById("modelo").value = response.modelo;
    document.getElementById("fabricante").value = response.fabricante;
    document.getElementById("nom_equipo").value = response.nom_equipo;
    document.getElementById("ip_equipo").value = response.ip_equipo;
    document.getElementById("nom_procesador").value = response.nom_procesador;
    document.getElementById("ram").value = response.ram;
    document.getElementById("slot").value = response.slot;
    document.getElementById("nombre").value = response.nombre;
    document.getElementById("capacidad").value = response.capacidad;
    document.getElementById("comp_add").value = response.comp_add;


//**************************** Select sistema operativo *************************** */
 // Obtener el elemento select
 const selectElementSo = document.getElementById("so");
   // Buscar si existe una opción con el valor de response.tipo_equipo
   let optionSo = selectElementSo.querySelector(`option[value="${response.so}"]`);
   if (!optionSo) {
   // Si no existe la opción, agregar una nueva
   optionSo = document.createElement("option");
   optionSo.value = response.so;
   optionSo.textContent = response.so;
   selectElementSo.appendChild(optionSo);
  }   
  // Establecer el atributo selected de la opción
  optionSo.selected = true;

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
  
  //**************************** Select Sede *************************** */
    // Este código se utiliza para cargar el combobox con los valores de la base de datos
    // Obtener el elemento select
    const selectElementSede = document.getElementById("sede");
   // Buscar si existe una opción con el valor de response.sede
   let optionSede = selectElementSede.querySelector(`option[value="${response.sede}"]`);
   if (!optionSede) {
   // Si no existe la opción, agregar una nueva
   optionSede = document.createElement("option");
   optionSede.value = response.sede;
   optionSede.textContent = response.sede;
   selectElementSede.appendChild(optionSede);
  }   
  // Establecer el atributo selected de la opción
  optionSede.selected = true;


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
