<?php
// Conexión local
include("../procesos/conexion.php");
//include("conexion.php");

/* Obtener el valor del parámetro "input" enviado a través de una solicitud POST.
   Asignar el valor a la variable $serial para su posterior procesamiento. */
$serial = $_POST["input"];

// Verificar si el checkbox está marcado
$repuesto = isset($_POST['repuesto']) ? 1 : 0;

// Consulta en la base de datos
//$sql_datos = "SELECT empresa, sede, departamento, nom_tec, fecha, hora, serial, activo_fijo, ip_equipo , tipo_equipo, modelo, fabricante, visita, diagnostico, recomendaciones, repuesto, detalle_repuesto

//$sql_datos = "SELECT * FROM tbl_impresora WHERE serial = '$serial'";
// Consulta en la base de datos
$sql_datos = "SELECT *, IF(repuesto = 1, 'Sí', 'No') AS repuesto FROM tbl_impresora WHERE serial = '$serial'";


// Ejecutar la consulta en la tabla "datos"
$result_datos = mysqli_query($conn, $sql_datos);

if (mysqli_num_rows($result_datos) > 0 ) { 
    $row_datos = mysqli_fetch_assoc($result_datos);
    
        //Variable   ->     Campo (BD)
        $empresa = $row_datos["empresa"];
        $sede = $row_datos["sede"];
        $departamento = $row_datos["departamento"];
        $fecha = $row_datos["fecha"];
        $hora = $row_datos["hora"];
        $activo_fijo = $row_datos["activo_fijo"];  
        $modelo = $row_datos["modelo"];
        $fabricante = $row_datos["fabricante"];
        $ip_equipo = $row_datos["ip_equipo"];
        $tipo_equipo = $row_datos["tipo_equipo"];
        $observacion = $row_datos["diagnostico"];
        $recomendaciones = $row_datos["recomendaciones"];
        $repuesto = $row_datos["repuesto"];
        $detalle = $row_datos["detalle_repuesto"];
        $nombre = $row_datos["nom_tec"];
        
       
    // "name del input  -> Variable que contiene el campo de la base de datos"
    $data = array(
        "exists" => true,
        "empresa" => $empresa,
        "sede" => $sede,
        "departamento" => $departamento,
        "fecha" => $fecha,
        "hora" => $hora,
        "activo_fijo" => $activo_fijo,
        "modelo" => $modelo,
        "fabricante" => $fabricante,
        "ip_equipo" => $ip_equipo,
        "tipo_equipo" => $tipo_equipo,
        "observacion" => $observacion,
        "recomendaciones" => $recomendaciones,
        "repuesto" => $repuesto,
        "detalle" => $detalle,
        "nombre" => $nombre,
    );
    
    echo json_encode($data);
    // echo "El valor ingresado existe en la base de datos";
   
} else {
    //Coloca vacio los input
    //echo json_encode(array("exists" => true, "empresa" => "","sede" => "", "departamento" => "","nom_usuario" => "","fecha" => "","hora" => ""));
    date_default_timezone_set('America/Bogota');
    $fecha_actual = date('d/m/Y');
    $hora_actual = date('H:i:s A');

    $data = array(
       "exists" => true,
       "empresa" => "",
       "sede" => "",
       "departamento" => "",
       "fecha" => ($fecha_actual != "") ? $fecha_actual : date("Y-m-d"),
       "hora" => ($hora_actual != "") ? $hora_actual : date("H:i:s"),
       "activo_fijo" => "",
       "modelo" => "",
       "fabricante" => "",
       "ip_equipo" => "",
       "tipo_equipo" => "",
       "observacion" => "",
       "recomendaciones" => "",
       "repuesto" => "",
       "detalle" => "",
       "nombre" => "",
    );
    echo json_encode($data);
    //echo "El valor ingresado no existe en la base de datos";
}

$conn->close();
?>