
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte General</title>
  <link rel="stylesheet" type="text/css" href="rep.css">
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
<link rel="stylesheet" type="text/css" href="1002.css">

</head>
<body>

<div class="container">

<div class="box">

  <h1>Historiales por Sede</h1>

  <form method="post">
    <label for="sede">Seleccionar Sede:</label>
    <select id="sede" name="sede">
      <option value="">Seleccione una sede</option>
      <option value="Charco Azul">Charco Azul</option>
      <option value="Comuneros II">Comuneros II</option>
      <option value="Calipso">Calipso</option>
      <!-- Agrega más opciones según tus necesidades -->
    </select>
    <input type="submit" name="buscar" value="Buscar">

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sede'])): ?>
    <button type="submit" name="formulario">Generar PDF</button>
    <?php endif; ?>




 

  <?php
  // Verificar si se envió el formulario
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el valor de la sede seleccionada
    $sede = $_POST['sede'];

    // Validar que se haya seleccionado una sede
    if (!empty($sede)) {
      // Llamar al archivo de conexión a la base de datos
      include("./procesos/conexion.php");

      // Consulta en la base de datos
      $sql = "SELECT serial, empresa, sede, departamento, fecha, hora, tipo_mant, observacion, recomendaciones, nom_tec  FROM historial WHERE sede = '$sede'";
      $result = mysqli_query($conn, $sql);

      // Verificar si se encontraron resultados
      if (mysqli_num_rows($result) > 0) {
        // Obtener los valores de Empresa y Sede
      // $row = mysqli_fetch_assoc($result);
      //  $empresa = $row['empresa'];
      //  $sede = $row['sede'];

        echo '<table>
                <thead>
                    <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Departamento</th>
                    <th>Serail</th>
                    <th>Tipo de Mantenimiento</th>
                    <th>Observación</th>
                    <th>Recomendaciones</th>
                    <th>Técnico</th>
                  </tr>
                </thead>
                <tbody>';
        // Recorrer los resultados y mostrarlos en la tabla
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . $row['fecha'] . '</td>';
          echo '<td>' . $row['hora'] . '</td>';
          echo '<td>' . $row['departamento'] . '</td>';
          echo '<td>' . $row['serial'] . '</td>';
          echo '<td>' . $row['tipo_mant'] . '</td>';
          echo '<td>' . $row['observacion'] . '</td>';
          echo '<td>' . $row['recomendaciones'] . '</td>';
          echo '<td>' . $row['nom_tec'] . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo 'No se encontraron historiales para la sede seleccionada.';
      }

      // Cerrar la conexión a la base de datos
      mysqli_close($conn);
    } else {
      echo 'Por favor, seleccione una sede.';
    }
  }
  ?>

</form>

</div>
  </div> 

</body>
</html>

