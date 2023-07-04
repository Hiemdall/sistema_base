<?php
// Llamar al archivo de conexión a la base de datos
include("../procesos/conexion.php");

// Obtener los valores de la sesión
$username = $_SESSION['username'];


// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtener los valores del formulario
  $serial = $_POST['serial'];
  //$empresa = $_POST['empresa'];
  $sede = $_POST['sede'];
  $departamento = $_POST['departamento'];
  $tipo_equipo = $_POST['tipo_equipo'];
  $activo_fijo = $_POST['activo_fijo'];
  $ip_equipo = $_POST['ip_equipo'];
  $modelo = $_POST['modelo'];
  $fabricante = $_POST['fabricante'];
  $observacion = $_POST["observacion"];
  $recomendaciones = $_POST["recomendaciones"];
  //$repuesto = $_POST["repuesto"];
  if (isset($_POST['repuesto'])) {
    $repuesto = $_POST['repuesto'];
  } else {
    $repuesto = ""; // Valor por defecto si no se proporciona el campo repuesto
  }
  $detalle = $_POST["detalle"];
  $tipo_mant = $_POST["tipo_mant"];
  

  // Realizar la consulta para actualizar los campos
  $sql_datos = "UPDATE tbl_impresora SET  sede='$sede', departamento='$departamento', tipo_equipo='$tipo_equipo', 
  activo_fijo='$activo_fijo', ip_equipo='$ip_equipo', modelo='$modelo', fabricante='$fabricante', nom_tec='$username', diagnostico='$observacion',
  recomendaciones='$recomendaciones',repuesto='$repuesto', detalle_repuesto='$detalle' , tipo_mant='$tipo_mant' WHERE serial='$serial'";

  // Ejecutar la consulta SQL
  if (mysqli_query($conn, $sql_datos)) {
    // Generar una alerta con SweetAlert 
   echo '<script>';
   echo 'Swal.fire({';
   echo '  icon: "success",';
   echo '  title: "Los Campos se Actualizaron Correctamente",';
   echo '  showConfirmButton: true';
   //echo '  confirmButtonColor: "#ff0000"';
   echo '});';
   echo '</script>';
     
 } else {
     echo "Error al actualizar los campos: " . mysqli_error($conn);
 }

  // Cerrar la conexión a la base de datos
  mysqli_close($conn);
}
?>
