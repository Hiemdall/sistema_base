<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial del Equipo</title>
    <link rel="stylesheet" href="style.css">
     <!-- Generar una alerta con SweetAlert -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
  
    
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
<!-- Template Stylesheet -->
<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
<link rel="stylesheet" type="text/css" href="../css/formularios.css">

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

     <div class="user-input-box" style="width: 100% !important;">
        <label for="observacion">Diagnostico:</label>
        <textarea id="observacion" rows="4" name="observacion"></textarea>
      </div>
      <div class="btos">
        <button class="poup" type="button" onclick="diagnostico()"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></button>
      </div>
    
      <div class="user-input-box" style="width: 100% !important;">
        <label for="recomendaciones">Solución:</label>
        <textarea id="recomendaciones" rows="4" name="recomendaciones"></textarea>
      </div>
      <div class="btos">
        <button class="poup" type="button" onclick="agregarRecomendacion()"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></button>
      </div>

      <div class="user-input-box" style="width: 20% !important;">
      <label for="repuesto">Repuesto:</label>
      <input type="checkbox" id="repuesto" name="repuesto" value="1">
      </div>
   
     <div class="user-input-box" style="width: 100% !important;">
        <label for="detalle"></label>
        <textarea id="detalle" rows="4" name="detalle"></textarea>
      </div>
      <div class="btos">
        <button class="poup" type="button" onclick="agregarRepuesto()"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></button>
      </div>
    
    
    <!-- Botones-->
    <div class="form-submit-btn">
    <input type="submit" id="guardarBtn" name="agregar" value="Guardar"></input>
    </div>
    
</div>

</div>
</form>

<!-- Descripciones de diagnóstico -->
<div class="popup">
      <h1>Descripciones del diagnóstico</h1>
    <p>Acumulación de polvo y residuos: Se observó una acumulación significativa de polvo y residuos en los componentes internos y externos del equipo, incluyendo ventiladores, disipadores de calor y filtros de aire. Esta acumulación está afectando el flujo de aire adecuado y aumentando el riesgo de sobrecalentamiento del sistema, también se constató que la pasta térmica en el procesador ha perdido sus propiedades y no está proporcionando una disipación de calor eficiente. Esto contribuye al sobrecalentamiento del procesador y puede causar problemas de rendimiento y estabilidad.</p>
       <h1>--------------------------------------------------------------------------------------</h1>
    <p>Conexiones y cables mal ajustados: Se detectaron cables y conexiones mal ajustados en el interior del equipo. Estos problemas pueden causar interrupciones en el suministro de energía y la transmisión de datos, lo que afecta negativamente el rendimiento general del sistema.</p>
       <h1>--------------------------------------------------------------------------------------</h1>
    <p>Rendimiento lento y congelamientos: Los usuarios han experimentado una disminución en el rendimiento general del sistema, incluyendo tiempos de respuesta lentos, congelamientos ocasionales y retrasos al ejecutar aplicaciones o tareas.</p>
    <button id="cerrar">Cerrar</button>  
</div>

<!-- Descripciones de solución -->
<div class="popup1">
      <h1>Descripciones de la solución</h1>
       <p>Limpieza exhaustiva de componentes internos y externos: Se llevó a cabo una limpieza minuciosa de todos los componentes del equipo, incluyendo ventiladores, disipadores de calor y cualquier otra área propensa a la acumulación de polvo y residuos; Se removió la pasta térmica antigua en el procesador y se aplicó una nueva capa de pasta térmica de alta calidad. También se verificó y aseguró que todos los cables y conexiones estuvieran correctamente enchufados y en buen estado de funcionamiento.</p>
       <h1>--------------------------------------------------------------------------------------</h1>
       <p>Inspección detallada: Se llevó a cabo una inspección exhaustiva de todas las conexiones y cables en el interior del equipo. Se verificó cada uno de ellos para identificar aquellos que estuvieran sueltos, mal enchufados o dañados. También se organizó y aseguró la correcta disposición de los cables dentro del equipo. Se utilizó sujetadores o bridas para mantener los cables en su lugar y evitar enredos o interferencias entre ellos.</p>
       <h1>--------------------------------------------------------------------------------------</h1>
       <p>Optimización del sistema operativo: Se llevó a cabo una optimización exhaustiva del sistema operativo. Esto incluyó la eliminación de archivos temporales, la limpieza del registro, la desfragmentación del disco y la desinstalación de programas innecesarios o que consumían muchos recursos. También se verificaron y se actualizaron todos los controladores del sistema, incluyendo los controladores de la tarjeta gráfica, el chipset, el audio y otros dispositivos importantes.</p>
    <button id="cerrar1">Cerrar</button>  
</div>

<!-- Descripciones de respuestos -->
<div class="popup2">
      <h1>Descripciones de respuestos</h1>
       <p>Disco de estado sólido (SSD): Recomendaría un SSD de 256 GB con una velocidad de lectura/escritura de 550 MB/s.<br>Memoria RAM adicional de 8 GB DDR4 para PC de escritorio.</p>
       <h1>--------------------------------------------------------------------------------------</h1>
       <p>Fuente de alimentación ATX, con una potencia de 750 vatios.</p>
       <h1>--------------------------------------------------------------------------------------</h1>
       <p>Teclado y mouse ergonómico USB</p>
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