<<<<<<< HEAD:procesos/conexion.php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blockbl5_red_de_salud_oriente";
//$dbname = "soporte_rso";

// Crear conexi贸n
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexi贸n
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

=======
<?php
$servername = "localhost";
$username = "root";
$password = "";
//$dbname = "blockbl5_red_de_salud_oriente";
$dbname = "soporte_rso";

// Crear conexi贸n
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexi贸n
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

>>>>>>> 40c0e70a3a4f69f76fa6ed23182e2de0c9d0df4e:conexion.php
mysqli_set_charset($conn, "utf8mb4");