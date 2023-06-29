<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$conexion = mysqli_connect("localhost", "root", "", "blockbl5_red_de_salud_oriente");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtener el valor de la sede seleccionada
  $sede = $_POST['sede'];

  // Validar que se haya seleccionado una sede
  if (!empty($sede)) {
    // Modificar la consulta en la base de datos para filtrar por sede
    $consulta = "SELECT * FROM datos WHERE sede = '$sede'";
    $resultado = mysqli_query($conexion, $consulta);

    $html = '<html>';
    $html .= '<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          body{
          background-image: url(../img/Fichatecnica.jpg);
          background-size: cover; 
          background-repeat: no-repeat;
          background-size: 100%;
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
            top: 242px;
            left: 51%;
          }


          .fabricante{
            position: absolute;
            margin: 0;
            top: 274px;
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
            top: 306px;
            left: 2%;
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
            top: 81%;
            left: 12%;
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

         
          
      
        </style>
    </head>';
  
    while ($fila = mysqli_fetch_assoc($resultado)) {
      $html .= '<body>';
      $html .= '<img src="../img/logo.png" alt="Logo" class="logo">';
      $html .= '<p class="empresa">Empresa: '. $fila['empresa'] .'</p>';
      $html .= '<p class="sede">Sede: '. $fila['sede'] .'</p>';
      $html .= '<p class="fecha">Fecha: '. $fila['fecha'] .'</p>';
      $html .= '<p class="hora">Hora: '. $fila['hora'] .'</p>';
      $html .= '<p class="serial">Serial: '. $fila['serial'] .'</p>';
      $html .= '<p class="departamento">Departamento: '. $fila['departamento'] .'</p>';
      $html .= '<p class="usuario">Usuario: '. $fila['nom_usuario'] .'</p>';
      $html .= '<p class="activo">Activo fijo: '. $fila['activo_fijo'] .'</p>';
      $html .= '<p class="modelo">Modelo: '. $fila['modelo'] .'</p>';
      $html .= '<p class="fabricante">Fabricante:  '. $fila['fabricante'] .' </p>';
      $html .= '<p class="equipo">Nombre del equipo:  '. $fila['nom_equipo'] .' </p>';
      $html .= '<p class="ip">Ip del equipo: '. $fila['nom_procesador'] .'</p>';
      $html .= '<p class="procesador">Procesador: '. $fila['ip_equipo'] .'</p>';
      $html .= '<p class="disco">Disco: '. $fila['disco'] .'</p>';
      $html .= '<p class="tequipo">Tipo de equipo: '. $fila['tipo_equipo'] .' </p>';
      $html .= '<p class="ram">Ram: '. $fila['ram'] .' </p>';
      $html .= '<p class="slot">slot: '. $fila['slot'] .' </p>';
      $html .= '<p class="so">Sistema operativo: '. $fila['so'] .' </p>';
      $html .= '<p class="adi">Componentes adicionales: '. $fila['Componentes_add'] .' </p>';
      


      $html .= '<p class="adi"></p>';
      
  
      $tecnico = $fila['nombre'];
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
  // Puedes implementar tu lógica para obtener la ruta de la imagen defirma según el técnico
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