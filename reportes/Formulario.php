<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$conexion = mysqli_connect("localhost", "root", "", "blockbl5_red_de_salud_oriente");


$resultado = mysqli_query($conexion, "SELECT * FROM datos WHERE sede = '$sede'");

$html = '<html>';
$html = '<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
body{
background-image: url(../img/Fichatecnica.jpeg);
background-size: cover; 
background-repeat: no-repeat;
background-size: 100%;
}

.empresa{
  position: absolute;
  margin: 0;
  top: 142px;
  left: 12%;
}

.fecha{
  position: absolute;
  margin: 0;
  top: 10px;
  left: 85%;
}

.hora{
  position: absolute;
  margin: 0;
  top: 31px;
  left: 83%;
  font-size: 14px;
}

.serial{
  position: absolute;
  margin: 0;
  top: 57px;
  left: 77%;
}

.sede{
  position: absolute;
  margin: 0;
  top: 142px;
  left: 57%;
}

.departamento{
  position: absolute;
  margin: 0;
  top: 172px;
  left: 19%;
}

.activo{
  position: absolute;
  margin: 0;
  top: 239px;
  left: 16%;
}

.tecnico{
  position: absolute;
  margin: 0;
  top: 572px;
  left: 12%;
}

.usuario{
  position: absolute;
  margin: 0;
  top: 173px;
  left: 59%;
}

.tip_mant{
  position: absolute;
  margin: 0;
  top: 5.5%;
  left: 16%;
}

.observacion{
  position: absolute;
  margin: 0;
  top: 42%;
  left: 2%;
}

.recomendaciones{
  position: absolute;
  margin: 0;
  top: 58%;
  left: 2%;
}

.adi{
  position: absolute;
  margin: 0;
  top: 44%;
  left: 1%;
}

img{
  position: absolute;
  margin: 0;
  top: 79%;
  left: 65%;
}
.visita{
      position: absolute;
      margin: 0;
      top: 172px;
      left: 47%;
    }

.logo_form{
  width: 75px; 
  height: 75px;
  position: absolute;
      margin: 0;
      top: 1%;
      left: 2%;
}

</style>
</head>';

while ($fila = mysqli_fetch_assoc($resultado)) {
    $html .= '
    <body>
  <p class="empresa">'. $fila['empresa'] .'</p>
  <p class="sede">'. $fila['sede'] .'</p>
  <p class="fecha">'. $fila['fecha'] .'</p>
  <p class="hora">'. $fila['hora'] .'</p>
  <p class="serial"> Serial: '. $fila['serial'] .'</p>
  <p class="departamento">'. $fila['departamento'] .'</p>
  <p class="tip_mant">Tipo de Mantenimiento:</p>
  <p class="usuario">'. $fila['nom_usuario'] .'</p>
  <p class="activo">'. $fila['activo_fijo'] .'</p>
  <p class="adi">Acepto utilizar este servicio únicamente para fines legales y de acuerdo con las leyes y regulaciones aplicables.
  Entiendo y cionada en este formulario es precisa y verídica.
  Reconozco que cualquier uso indebido o fraudulento de este servicio puede resultar en la cancelación de mi cuenta y posibles accionetos términos de servicio en cualquier momento y es mi responsabilidad revisarlos periódicamente.</p>
  <p class="tecnico">'. $fila['nombre'] .'</p>';

  $tecnico = $fila['nombre'];
  $imagenFirma = obtenerImagenFirma($tecnico);
 
  $html .= '<img src="' . $imagenFirma . '" alt="Firma del técnico" style="width: 150px; height: 75px;">';


  // Salta a la otra pagina si hay mas registros
  $html .= '<div style="page-break-after: always;"></div>';

  $html .= '</body>';
}

$html .= '</html>';

$dompdf->setPaper('A4', 'portrait');
// Renderizar el contenido HTML en PDF
$dompdf->loadHtml($html);
$dompdf->render();


// Descargar el archivo PDF
// Nombre del archivo:
//$dompdf->stream("carta_de_trabajo.pdf");
$dompdf->stream("Historico",[ "Attachment" => false]);

function obtenerImagenFirma($tecnico) {
  // Puedes implementar tu lógica para obtener la ruta de la imagen de firma según el técnico
  // Por ejemplo, puedes tener un array asociativo donde las claves sean los nombres de los técnicos y los valores sean las rutas de las imágenes
  $firmaTecnicos = array(
      'Heimdall Rojas' => 'firmas/heimdall.jpg',
      'Denyer Bastida' => 'firmas/denyer.jpg',
     
      // Agrega más técnicos y sus respectivas rutas de imagen aquí
  );

  // Verificar si el técnico tiene una firma definida
  if (isset($firmaTecnicos[$tecnico])) {
      return $firmaTecnicos[$tecnico];
  } else {
      // Si no hay una firma definida para el técnico, puedes retornar una imagen por defecto o una ruta genérica
      return 'ruta/a/la/imagen/firma_default.jpg';
  }
}
?>
