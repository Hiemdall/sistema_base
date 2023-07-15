<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$conexion = mysqli_connect("localhost", "root", "", "blockbl5_hacienda");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtener el valor de la sede seleccionada
  $sede = $_POST['sede'];

  // Validar que se haya seleccionado una sede
  if (!empty($sede)) {
    // Modificar la consulta en la base de datos para filtrar por sede
    $consulta = "SELECT * FROM tbl_impresora WHERE sede = '$sede'";
    $resultado = mysqli_query($conexion, $consulta);

    $html = '<html>';
    $html .= '<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
      background-image: url(../img/FormatoImpresora.jpg);
      background-size: cover; 
      background-repeat: no-repeat;
      background-size: 100%;
      font-family: Arial, sans-serif;
      font-size: 16px;
    }

    .fecha{
        position: absolute;
        margin: 0;
        top: 6px;
        left: 68%;
      }
  
      .hora{
        position: absolute;
        margin: 0;
        top: 30px;
        left: 68%;
      }
  
      .serial{
        position: absolute;
        margin: 0;
        top: 57px;
        left: 68%;
      }
  
      .empresa{
        position: absolute;
        margin: 0;
        top: 142px;
        left: 2%;
      }
  
      .sede{
        position: absolute;
        margin: 0;
        top: 142px;
        left: 51%;
      }
  
      .departamento{
        position: absolute;
        margin: 0;
        top: 174px;
        left: 2%;
      }
  
      .activo{
        position: absolute;
        margin: 0;
        top: 242px;
        left: 2%;
      }
  
      .modelo{
        position: absolute;
        margin: 0;
        top: 210px;
        left: 51%;
      }
  
  
      .fabricante{
        position: absolute;
        margin: 0;
        top: 210px;
        left: 2%;
      }
  
      .equipo{
        position: absolute;
        margin: 0;
        top: 274px;
        left: 51%;
      }
  
      .ip{
        position: absolute;
        margin: 0;
        top: 242px;
        left: 51%;
      }
  
      .procesador{
        position: absolute;
        margin: 0;
        top: 306px;
        left: 51%;
      }
  
            
      .disco{
        position: absolute;
        margin: 0;
        top: 338px;
        left: 51%;
      }
  
      .tequipo{
        position: absolute;
        margin: 0;
        top: 338px;
        left: 2%;
      }
  
      .ram{
        position: absolute;
        margin: 0;
        top: 370px;
        left: 2%;
      }
  
      .slot{
        position: absolute;
        margin: 0;
        top: 370px;
        left: 51%;
      }
  
      
      .so{
        position: absolute;
        margin: 0;
        top: 404px;
        left: 2%;
      }
  
      .adi{
        position: absolute;
        top: 430px;
        left: 2%;
        width: 660px;
        overflow: hidden;
        word-wrap: break-word;
      }
  
      .tecnico{
        position: absolute;
        margin: 0;
        top: 172px;
        left: 2%;
      }
  
      .usuario{
        position: absolute;
        margin: 0;
        top: 174px;
        left: 51%;
      }
  
      
  
      .img{
        position: absolute;
        margin: 0;
        top: 82%;
        left: 37%;
        width: 150px;
        height: 75px;
      }
  
      .logo{
        position: absolute;
        margin: 0;
        top: 2px;
        left: 0%;
        width: 240px;
        height: 75px;
      }
  
  
      
      .visita{
        position: absolute;
        margin: 0;
        top: 275px;
        left: 2%;
      }
  
      .observacion{
        position: absolute;
        top: 325px;
        left: 2%;
        width: 660px;
        overflow: hidden;
        word-wrap: break-word;
      }
  
      .recomendaciones{
        position: absolute;
        top: 488px;
        left: 2%;
        width: 660px;
        overflow: hidden;
        word-wrap: break-word;
      }
  
      .repuesto{
        position: absolute;
        top: 655px;
        left: 2%;
        width: 660px;
        overflow: hidden;
        word-wrap: break-word;
      }  
  
  </style>
</head>';
  
    while ($fila = mysqli_fetch_assoc($resultado)) {
      $html .= '<body>';
     
      $html .= '<p class="empresa">Empresa: '. $fila['empresa'] .'</p>';
      $html .= '<p class="sede">Sede: '. $fila['sede'] .'</p>';
      $html .= '<p class="fecha">Fecha: '. $fila['fecha'] .'</p>';
      $html .= '<p class="hora">Hora: '. $fila['hora'] .'</p>';
      $html .= '<p class="serial">Serial: '. $fila['serial'] .'</p>';
      $html .= '<p class="departamento">Departamento: '. $fila['departamento'] .'</p>';
      $html .= '<p class="activo">Activo fijo: '. $fila['activo_fijo'] .'</p>';
      $html .= '<p class="visita">Visita:'. $fila['visita'] .'</p>';
      $html .= '<p class="observacion">'. $fila['diagnostico'] .'</p>';
      $html .= '<p class="modelo">Modelo: '. $fila['modelo'] .'</p>';
      $html .= '<p class="ip">Ip del equipo: '. $fila['ip_equipo'] .'</p>';
      $html .= '<p class="fabricante">Fabricante:  '. $fila['fabricante'] .' </p>';
      $html .= '<p class="recomendaciones">'. $fila['recomendaciones'] .'</p>';
      $html .= '<p class="repuesto">'. $fila['detalle_repuesto'] .'</p>';
      $html .= '<p class="usuario">Técnico: '. $fila['nom_tec'] .'</p>';

  
      $tecnico = $fila['nom_tec'];
      $imagenFirma = obtenerImagenFirma($tecnico);
  
      $html .= '<img src="' . $imagenFirma . '" alt="Firma del técnico" class="img">';
  
      // Salto a la otra página si hay más registros
      $html .= '<div style="page-break-after: always;"></div>';
  
      $html .= '</body>';
    }
  
    $html .= '</html>';
  
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->loadHtml($html);
    $dompdf->render();
  
    // Descargar el archivo PDF
    $dompdf->stream("Historico.pdf", ["Attachment" => false]);
  }
}

function obtenerImagenFirma($tecnico) {
  // Puedes implementar tu lógica para obtener la ruta de la imagen de firma según el técnico
  // Por ejemplo, puedes tener un array asociativo donde las claves sean los nombres de los técnicos y los valores sean las rutas de las imágenes
  $firmaTecnicos = array(
    'Heimdall Rojas' => 'firmas/heimdall.jpg',
    'Denyer Bastidas' => 'firmas/denyer.jpeg',
    'Andrés Agudelo' => 'firmas/andres.jpg',
    'Michael Asprilla' => 'firmas/michael.jpg',
    'Michael Saavedra' => 'firmas/savedra.jpg',
    'Luis Agredo' => 'firmas/luis.jpg',
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