<?php
// Llamar a el archivo conexion.php para hacer la conexion a la base de datos
include("../procesos/conexion.php");
        
// Obtener los valores de la sesión
$username = $_SESSION['username'];

$empresa = "D.A.C.P";
define("VISITA", 1); 

// Obtener los valores del formulario
//$datos_empresa = $_POST['empresa'];
$sede = $_POST['sede'];
$departamento = $_POST['departamento'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$serial = $_POST['serial'];
$activo_fijo = $_POST['activo_fijo'];
$ip_equipo = $_POST['ip_equipo'];
$tipo_equipo = $_POST['tipo_equipo'];
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

// Insertar los valores en la tabla datos_empresa
$sql_datos_empresa = "INSERT INTO tbl_impresora(empresa, sede, departamento, nom_tec, fecha, hora, serial, activo_fijo, ip_equipo , tipo_equipo, modelo, fabricante, visita, diagnostico, recomendaciones, repuesto, detalle_repuesto ,tipo_mant) 
VALUES ('$empresa', '$sede', '$departamento', '$username','$fecha', '$hora', '$serial', '$activo_fijo', '$ip_equipo', '$tipo_equipo', '$modelo', '$fabricante',".VISITA.", '$observacion', '$recomendaciones', '$repuesto', '$detalle', '$tipo_mant')";

if ($conn->query($sql_datos_empresa) === TRUE) {
    // Obtener el ID del último registro insertado en datos_empresa
    $empresa_id = $conn->insert_id;
     // Generar una alerta con SweetAlert 
   echo '<script>';
   echo 'Swal.fire({';
   echo '  icon: "success",';
   echo '  title: "Ficha del Dispositivo guardado Correctamente",';
   echo '  showConfirmButton: true';
   //echo '  confirmButtonColor: "#ff0000"';
   echo '});';
   echo '</script>';
    
} else {
    echo "Error al guardar la ficha técnica en la tabla datos_empresa: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
