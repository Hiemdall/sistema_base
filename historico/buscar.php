<?php
// Conexión local
include("../procesos/conexion.php");

/* Obtener el valor del parámetro "input" enviado a través de una solicitud POST.
   Asignar el valor a la variable $serial para su posterior procesamiento. */
$serial = $_POST["input"];

// Consulta en la tabla "datos"
$sql = "SELECT empresa, sede, departamento
FROM datos WHERE serial = '$serial'";

//Con una sola tabla
<<<<<<< HEAD
//$result = mysqli_query($conn, $sql);
//if (mysqli_num_rows($result) > 0) {
    //$row = mysqli_fetch_assoc($result);

// Ejecutar la consulta en la tabla "datos"
$result_datos = mysqli_query($conn, $sql_datos);

// Ejecutar la consulta en la tabla "disco"
//$result_disco = mysqli_query($conn, $sql_disco);

if (mysqli_num_rows($result_datos) > 0) {      //&& mysqli_num_rows($result_disco) > 0
    $row_datos = mysqli_fetch_assoc($result_datos);
    //$row_disco = mysqli_fetch_assoc($result_disco);
    

=======
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
>>>>>>> 732dba2d994fd78731f2e3729fbb1136bc4a5e53
    //Variable   ->     Campo (BD)
        $empresa = $row["empresa"];
        $sede = $row["sede"];
        $departamento = $row["departamento"];
        
        
    // "name del input formulario  -> Variable que contiene el campo de la base de datos"
    // "name del input  -> Variable que contiene el campo de la base de datos"
    $data = array(
        "exists" => true,
        "empresa" => $empresa,
        "sede" => $sede,
        "departamento" => $departamento,
                
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
             
       
    );
    echo json_encode($data);
    //echo "El valor ingresado no existe en la base de datos";
}

$conn->close();
?>