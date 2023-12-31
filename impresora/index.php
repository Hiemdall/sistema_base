<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Impresora</title>
    <link rel="stylesheet" href="458.css">
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
      <li><a href="/"><i class="fa fa-eye" aria-hidden="true"></i>  Vistas</a></li>
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





<!-- *****************************           Formulario de ficha de Dispositivos         *****************************************-->
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

<h1 class="form-title">Ficha de Dispositivo</h1>

<div class="ali">

<div class="main-user-info">


    <div class="user-input-box" style="width: 50% !important; justify-content: start; ">
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
    <select id="sede" name="sede" onkeydown="moveToNextInput(event, 'departamento')" onkeydown="moveToNextInput(event, 'departamento')" required>
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
    <input type="text" id="departamento" name="departamento" placeholder="Departamento:" onkeydown="moveToNextInput(event, 'activo_fijo')" required>
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
    <input type="text" id="fabricante" name="fabricante" placeholder="Fabricante:" onkeydown="moveToNextInput(event, 'ip_equipo')" required>
    </div>
     
    <div class="user-input-box">
    <label for="IP" style="margin: 5px;">IP del Equipo:</label>
    <input type="text" id="ip_equipo" name="ip_equipo" placeholder="IP del Equipo:" onkeydown="moveToNextInput(event, 'tipo_mant')" required>
    </div>

    <div class="user-input-box">
    <label for="" style="margin: 5px;">Tipo de Mantenimiento</label>
    <select class="custom-select" id="tipo_mant" name="tipo_mant" onkeydown="moveToNextInput(event, 'tipo_equipo')" required>
      <option value="">Tipo de Mantenimiento:</option>
      <option value="Diagnóstico">Diagnóstico</option>
      <option value="Preventivo">Preventivo</option>
      <option value="Correctivo">Correctivo</option>
      <option value="Remoto">Remoto</option>
    </select>
    </div>

    <div class="user-input-box">
    <label for="" style="margin: 5px;">Tipo de Equipo:</label>
    <select class="custom-select" id="tipo_equipo" name="tipo_equipo" onkeydown="moveToNextInput(event, 'observacion')" required>
    <option value="">Tipo de Equipo:</option>
    <option value="Impresora">Impresora</option>
    <option value="Scanner">Scanner</option>
    <option value="Video Beam">Video Beam</option>
    <option value="Plotter">Plotter</option>
    <option value="UPS">UPS</option>
    </select>
    </div>
    
      <div class="user-input-box" style="width: 100% !important;">
        <label for="observacion">Diagnóstico:</label>
        <textarea id="observacion" rows="4" name="observacion" required></textarea>
      </div>
      <div class="btos">
        <button class="poup" type="button" onclick="diagnostico()"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></button>
      </div>

      <div class="user-input-box" style="width: 100% !important;">
        <label for="recomendaciones">Solución:</label>
        <textarea id="recomendaciones" rows="4" name="recomendaciones" required></textarea>
      </div>
      <div class="btos">
        <button class="poup" type="button" onclick="agregarRecomendacion()"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></button>
      </div>
   
      <div class="user-input-box" style="width: 100% !important; margin-bottom: 11px;">
        <label for="repuesto" style="width: 10% !important;">Repuesto:</label>
        <input type="checkbox" id="repuesto" name="repuesto" value="1" style="width: 20px !important;"> 
        <label for="detalle" style="width: 85% !important;"></label>
        <textarea id="detalle" rows="4" name="detalle" required></textarea>
      </div>

      <div class="btos">
        <button class="poup" type="button" onclick="agregarRepuesto()"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></button>
      </div>

    <div class="form-submit-btn" style="margin-top: 20px;">
    <input type="submit" id="guardarBtn" name="agregar" value="Guardar" style="width: 100px;  text-align: center; margin: 12px"></input>
    <input type="submit" name="editar" value="Editar" style="width: 100px;   text-align: center; margin: 12px"></input>
    </div>
    

</div>

</div>
</form>

<div class="popup">
      <h1>Descripciones del diagnóstico de dispositivo</h1>
    <p>Atasco de papel: Un problema común en las impresoras es el atasco de papel. Esto puede ocurrir cuando el papel se introduce incorrectamente en la bandeja de papel o cuando se utiliza papel arrugado o de mala calidad. </p>
       <h1>--------------------------------------------------------------------------------------</h1>
    <p>Calidad de impresión deficiente: Si la calidad de impresión de sus documentos o imágenes es baja, es posible que haya un problema con los cartuchos de tinta o los cabezales de impresión. Verifique si los cartuchos de tinta están vacíos o a punto de agotarse y reemplácelos si es necesario.</p>
       <h1>--------------------------------------------------------------------------------------</h1>
    <p>Mensajes de error en la pantalla: Las impresoras a menudo muestran mensajes de error en su pantalla para indicar problemas o situaciones anormales. Estos mensajes pueden incluir códigos de error específicos o mensajes descriptivos. Algunos ejemplos comunes de mensajes de error incluyen "sin papel", "cartucho vacío" o "atascado". </p>
    <button id="cerrar">Cerrar</button>  
</div>

<!-- Descripciones de solución -->
<div class="popup1">
      <h1>Descripciones de la solución en dispositivo</h1>
       <p>Se verificó el mecanismo de alimentación en busca de restos y se aseguró de utilizar papel de calidad y cargarlo correctamente. Después de encender la impresora, realizó una prueba de impresión para confirmar que el atasco se había resuelto y que el papel se alimentaba correctamente.</p>
       <h1>--------------------------------------------------------------------------------------</h1>
       <p>Se verificó si los cartuchos de tinta estaban vacíos o a punto de agotarse y los reemplazó si era necesario. Luego, intentó limpiar los cabezales de impresión utilizando la función de limpieza de la impresora. Si el problema persistió, consideró reemplazar los cartuchos de tinta o los cabezales de impresión para mejorar la calidad de impresión.</p>
       <h1>--------------------------------------------------------------------------------------</h1>
       <p>Se leyó detenidamente el mensaje de error y siguió las instrucciones proporcionadas. Consultó el manual de la impresora o buscó en línea el código de error para obtener más información sobre el problema y su solución. También pudo haber reiniciado la impresora y el equipo para restablecer la conexión. Si el problema persistió, pudo haber contactado al soporte técnico del fabricante para obtener ayuda adicional en el diagnóstico y la solución del problema.</p>
    <button id="cerrar1">Cerrar</button>  
</div>

<!-- Descripciones de respuestos -->
<div class="popup2">
      <h1>Descripciones de respuestos en dispositivo</h1>
       <p>KIT de unidad fusora</p>
       <h1>--------------------------------------------------------------------------------------</h1>
       <p>Cabezales de impresión</p>
       <h1>--------------------------------------------------------------------------------------</h1>
       <p>Rodillos de alimentación de papel</p>
    <button id="cerrar2">Cerrar</button>  
</div>

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
//Ventana emergente diagnostico
function diagnostico() {
    var popup = document.querySelector('.popup');
    popup.style.display = 'block';

    var popupTexts = popup.getElementsByTagName('p');
    for (var i = 0; i < popupTexts.length; i++) {
      popupTexts[i].addEventListener('click', function() {
        document.getElementById('observacion').value = this.innerText;
        popup.style.display = 'none';
      });
    }
    document.getElementById('cerrar').addEventListener('click', function() {
    popup.style.display = 'none';
});
}

//Ventana emergente soluciones
function agregarRecomendacion() {
  var popup1 = document.querySelector('.popup1');
  popup1.style.display = 'block';

  var popupTexts1 = popup1.getElementsByTagName('p');
  for (var i = 0; i < popupTexts1.length; i++) {
    popupTexts1[i].addEventListener('click', function() {
      document.getElementById('recomendaciones').value = this.innerText;
      popup1.style.display = 'none';
    });
  }

  document.getElementById('cerrar1').addEventListener('click', function() {
    popup1.style.display = 'none';
  });
}

//Ventana emergente repuestos
function agregarRepuesto() {
  var popup2 = document.querySelector('.popup2');
  popup2.style.display = 'block';

  var popupTexts2 = popup2.getElementsByTagName('p');
  for (var i = 0; i < popupTexts2.length; i++) {
    popupTexts2[i].addEventListener('click', function() {
      document.getElementById('detalle').value = this.innerText;
      popup2.style.display = 'none';
    });
  }

  document.getElementById('cerrar2').addEventListener('click', function() {
    popup2.style.display = 'none';
  });
}


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
    //document.getElementById("sede").value = response.sede;
    document.getElementById("nombre").value = response.nombre;
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

  //**************************** Select tipo de mantenimiento *************************** */
   // Este código se utiliza para cargar el combobox con los valores de la base de datos
    // Obtener el elemento select
    const selectElementTipo_mant = document.getElementById("tipo_mant");
   // Buscar si existe una opción con el valor de response.tipo_mant
   let optionTipo_mant = selectElementTipo_mant.querySelector(`option[value="${response.tipo_mant}"]`);
   if (!optionTipo_mant) {
   // Si no existe la opción, agregar una nueva
   optionTipo_mant = document.createElement("option");
   optionTipo_mant.value = response.tipo_mant;
   optionTipo_mant.textContent = response.tipo_mant;
   selectElementTipo_mant.appendChild(optionTipo_mant);
  }   
  // Establecer el atributo selected de la opción
  optionTipo_mant.selected = true;

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
