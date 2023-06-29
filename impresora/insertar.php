<?php
// Llamar a el archivo conexion.php para hacer la conexion a la base de datos
include("../procesos/conexion.php");

        
// Obtener los valores de la sesión
$username = $_SESSION['username'];

define("VISITA", 1); 

// Obtener los valores del formulario
$datos_empresa = $_POST['empresa'];
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
$repuesto = $_POST["repuesto"];
$detalle = $_POST["detalle"];

// Insertar los valores en la tabla datos_empresa
$sql_datos_empresa = "INSERT INTO tbl_impresora(empresa, sede, departamento, nom_tec, fecha, hora, serial, activo_fijo, ip_equipo , tipo_equipo, modelo, fabricante, visita, diagnostico, recomendaciones, repuesto, detalle_repuesto) 
VALUES ('$datos_empresa', '$sede', '$departamento', '$username','$fecha', '$hora', '$serial', '$activo_fijo', '$ip_equipo', '$tipo_equipo', '$modelo', '$fabricante',".VISITA.", '$observacion', '$recomendaciones', '$repuesto', '$detalle')";



if ($conn->query($sql_datos_empresa) === TRUE) {
    // Obtener el ID del último registro insertado en datos_empresa
    $empresa_id = $conn->insert_id;
    // Generar una alerta
    $mensaje = "Ficha técnica guardada correctamente";
    echo '<script>alert("'. $mensaje . '");</script>';
    
} else {
    echo "Error al guardar la ficha técnica en la tabla datos_empresa: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
