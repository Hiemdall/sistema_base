<?php
 // Llamar a el archivo conexion.php para hacer la conexion a la base de datos
 include("../procesos/conexion.php");
 
 // Obtener los valores de la sesión
 $username = $_SESSION['username'];
  
 define("VISITA", 1); 

$empresa = $_POST['empresa'];
$sede = $_POST["sede"];
$departamento = $_POST["departamento"];
$serial = $_POST["serial"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$tipo_mant = $_POST["tipo_mant"];
$observacion = $_POST["observacion"];
$recomendaciones = $_POST["recomendaciones"];
$repuesto = $_POST["repuesto"];
$detalle = $_POST["detalle"];

// Insertar los datos en la base de datos
     
$sql = "INSERT INTO historial (empresa, sede, departamento, serial, fecha, hora, tipo_mant, visita, observacion, recomendaciones, nom_tec, repuesto, detalle_repuesto)
       VALUES ('$empresa', '$sede', '$departamento', '$serial', '$fecha', '$hora', '$tipo_mant', ".VISITA.", '$observacion', '$recomendaciones','$username','$repuesto','$detalle')";        

if ($conn->query($sql) === TRUE) {
   // Generar una alerta con SweetAlert 
   echo '<script>';
   echo 'Swal.fire({';
   echo '  icon: "success",';
   echo '  title: "El historico fue Guardado Correctamente",';
   echo '  showConfirmButton: true';
   //echo '  confirmButtonColor: "#ff0000"';
   echo '});';
   echo '</script>';
 
} else {
  echo "Error al insertar los datos: " . $conn->error;
}

mysqli_close($conn);
