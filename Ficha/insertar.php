<?php
// Llamar a el archivo conexion.php para hacer la conexion a la base de datos
include("../procesos/conexion.php");
   
// Obtener los valores de la sesión
$username = $_SESSION['username'];
$access_level = $_SESSION['access_level'];
$email = $_SESSION['email'];
$archivo = $_SESSION['archivo'];

// Obtener los valores del formulario
$datos_empresa = $_POST['empresa'];
$sede = $_POST['sede'];
$departamento = $_POST['departamento'];
$nom_usuario = $_POST['nom_usuario'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$serial = $_POST['serial'];
$activo_fijo = $_POST['activo_fijo'];
$ip_equipo = $_POST['ip_equipo'];
$tipo_equipo = $_POST['tipo_equipo'];
$modelo = $_POST['modelo'];
$fabricante = $_POST['fabricante'];
$nom_equipo = $_POST['nom_equipo'];
$nom_procesador = $_POST['nom_procesador'];
$so = $_POST['so'];
$ram = $_POST['ram'];
$slot = $_POST['slot'];
$disco = $_POST['capacidad'];
$componentes_add = $_POST['comp_add'];

// Insertar los valores en la tabla datos_empresa
$sql_datos_empresa = "INSERT INTO datos(empresa, sede, departamento, nombre, nom_usuario, fecha, hora, serial, activo_fijo, ip_equipo , tipo_equipo, modelo, fabricante, nom_equipo, nom_procesador, so, ram, slot, componentes_add, disco) 
VALUES ('$datos_empresa', '$sede', '$departamento', '$username', '$nom_usuario', '$fecha', '$hora', '$serial', '$activo_fijo', '$ip_equipo', '$tipo_equipo', '$modelo', '$fabricante', '$nom_equipo', '$nom_procesador', '$so', '$ram', '$slot', '$componentes_add', '$disco')";

if ($conn->query($sql_datos_empresa) === TRUE) {
    $empresa_id = $conn->insert_id;
   // Generar una alerta con SweetAlert 
   echo '<script>';
   echo 'Swal.fire({';
   echo '  icon: "success",';
   echo '  title: "Ficha Técnica Guardada Correctamente",';
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
