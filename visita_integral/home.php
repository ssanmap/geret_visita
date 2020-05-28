<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
</head>
<body>
<?php
$zona = $_POST['zona'];

$sql_otra = "
          SELECT
          'Sitio Vandalizado?',
          Count(TITAN_VI_FORMULARIOS.CUSTOM28) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM28 = 'Si'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM28,TITAN_VI_FORMULARIOS.ZONA
          UNION all
          SELECT
          'Funcionamiento de Clima (Equipo y Ventiladores)',
          Count(TITAN_VI_FORMULARIOS.CUSTOM30) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM30 = 'NOK'   AND  TITAN_VI_FORMULARIOS.ZONA != '$zona'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM30,TITAN_VI_FORMULARIOS.ZONA
          UNION all
          SELECT
          'Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)',
          Count(TITAN_VI_FORMULARIOS.CUSTOM32) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM32 = 'NOK' AND  TITAN_VI_FORMULARIOS.ZONA != '$zona'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM32,TITAN_VI_FORMULARIOS.ZONA
          UNION all
          SELECT
          'Alarmas en Equipos (Energía, RAN y TX)',
          Count(TITAN_VI_FORMULARIOS.CUSTOM34) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM34 = 'NOK' AND  TITAN_VI_FORMULARIOS.ZONA != '$zona'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM34,TITAN_VI_FORMULARIOS.ZONA
          UNION all
          SELECT
          'Estado GG (Alarmas, nivel de combustible)',
          Count(TITAN_VI_FORMULARIOS.CUSTOM36) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM36 = 'NOK' AND  TITAN_VI_FORMULARIOS.ZONA != '$zona'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM36,TITAN_VI_FORMULARIOS.ZONA
          UNION all
          SELECT
          'Se observan conexiones Irregulares de Electricidad?',
          Count(TITAN_VI_FORMULARIOS.CUSTOM38) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM38 = 'Si' AND  TITAN_VI_FORMULARIOS.ZONA != '$zona'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM38,TITAN_VI_FORMULARIOS.ZONA
          UNION all
          SELECT
          'Se observa el uso indebido de las instalaciones físicas?',
          Count(TITAN_VI_FORMULARIOS.CUSTOM40) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM40 = 'Si' AND  TITAN_VI_FORMULARIOS.ZONA != '$zona'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM40,TITAN_VI_FORMULARIOS.ZONA
          UNION all
          SELECT
          'Se observan problemas estructurales en la torre?',
          Count(TITAN_VI_FORMULARIOS.CUSTOM42) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM42 = 'Si' AND  TITAN_VI_FORMULARIOS.ZONA != '$zona'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM42,TITAN_VI_FORMULARIOS.ZONA";

          $respuesta_otra = mysqli_query($cnn,$sql_otra);

          $tabla .= '<table class="table table-bordered text-center" style="font-size: 10pt;">
          <tr class="bg-primary">
          <td style="background-color:#428bca;">Preguntas</td>
          <td style="background-color:#428bca;">Cantidad</td>
          <td style="background-color:#428bca;">zona</td>

          </tr>';

          // /echo "<pre>"; print_r($sql_otra); echo "</pre>";
       /*    print_r($respuesta_otra);
            exit; */
                // echo "<pre>"; print_r($res); echo "</pre>";
                // exit;
          while ($row = mysqli_fetch_array($respuesta_otra,MYSQLI_NUM)){
            $tabla .= '<tr>
            <td><center>'.$row[0].'<center></td>
            <td><center>'.utf8_encode($row[1]).'<center></td>
            <td><center>'.utf8_encode($row[2]).'<center></td>


        </tr>';
        }
        $tabla .= '</table>';
        echo $tabla;
          ?>
</body>
</html>
