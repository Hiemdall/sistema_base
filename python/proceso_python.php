<?php
include("conexion.php");

$empresa = $_POST['empresa'];
$nom = $_POST['nombre'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$sede = $_POST['sede'];
$departamento = $_POST['departamento'];
$nom_usuario = $_POST['nom_usuario'];
$activo_fijo = $_POST['activo_fijo'];
$tipo_equipo = $_POST['tipo_equipo'];
$serial = $_POST['serial'];
$modelo = $_POST['modelo'];
$fabricante = $_POST['fabricante'];
$nom_equipo = $_POST['nom_equipo'];
$processor_model = $_POST['processor_model'];
$formatted_ram_capacity = $_POST['ram'];
$slots = $_POST['slots'];
$ip = $_POST['ip'];
$disco = $_POST['disco'];
$so = $_POST['so'];
$compo = $_POST['compo'];

// Tabla info
// Insertar los datos en la base de datos
$sql = "INSERT INTO datos (empresa, nombre, fecha, hora, sede, departamento, nom_usuario, activo_fijo, tipo_equipo, serial, modelo, fabricante, nom_equipo, nom_procesador, ram, slot, ip_equipo, disco, so, Componentes_add)
        VALUES ('$empresa','$nom','$fecha', '$hora', '$sede', '$departamento', '$nom_usuario', '$activo_fijo', '$tipo_equipo', '$serial', '$modelo', '$fabricante', '$nom_equipo', '$processor_model', '$formatted_ram_capacity', '$slots', '$ip', '$disco', '$so', '$compo')";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error al insertar los datos: " . $conn->error;
}

mysqli_close($conn);

echo "Datos guardados correctamente";

?>

