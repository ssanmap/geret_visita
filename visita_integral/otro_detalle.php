<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
$id = $_POST['datos_id'];

$query = "SELECT

TITAN_VI_FORMULARIOS.ID, 
TITAN_VI_FORMULARIOS.TASKNUMBER, 
TITAN_VI_FORMULARIOS.CUSTOM1, 
TITAN_VI_FORMULARIOS.CUSTOM2, 
TITAN_VI_FORMULARIOS.CUSTOM3, 
TITAN_VI_FORMULARIOS.CUSTOM4, 
TITAN_VI_FORMULARIOS.CUSTOM5, 
TITAN_VI_FORMULARIOS.CUSTOM6, 
TITAN_VI_FORMULARIOS.CUSTOM7, 
TITAN_VI_FORMULARIOS.CUSTOM8, 
TITAN_VI_FORMULARIOS.CUSTOM9, 
TITAN_VI_FORMULARIOS.CUSTOM10, 
TITAN_VI_FORMULARIOS.CUSTOM11, 
TITAN_VI_FORMULARIOS.CUSTOM12, 
TITAN_VI_FORMULARIOS.CUSTOM13, 
TITAN_VI_FORMULARIOS.CUSTOM14, 
TITAN_VI_FORMULARIOS.CUSTOM15, 
TITAN_VI_FORMULARIOS.CUSTOM16, 
TITAN_VI_FORMULARIOS.CUSTOM17, 
TITAN_VI_FORMULARIOS.CUSTOM18, 
TITAN_VI_FORMULARIOS.CUSTOM19, 
TITAN_VI_FORMULARIOS.CUSTOM20, 
TITAN_VI_FORMULARIOS.CUSTOM21, 
TITAN_VI_FORMULARIOS.CUSTOM22, 
TITAN_VI_FORMULARIOS.CUSTOM23, 
TITAN_VI_FORMULARIOS.CUSTOM24, 
TITAN_VI_FORMULARIOS.CUSTOM25, 
TITAN_VI_FORMULARIOS.CUSTOM26, 
TITAN_VI_FORMULARIOS.CUSTOM27, 
TITAN_VI_FORMULARIOS.CUSTOM28, 
TITAN_VI_FORMULARIOS.CUSTOM29, 
TITAN_VI_FORMULARIOS.CUSTOM30, 
TITAN_VI_FORMULARIOS.CUSTOM31, 
TITAN_VI_FORMULARIOS.CUSTOM32, 
TITAN_VI_FORMULARIOS.CUSTOM33, 
TITAN_VI_FORMULARIOS.CUSTOM34, 
TITAN_VI_FORMULARIOS.CUSTOM35, 
TITAN_VI_FORMULARIOS.CUSTOM36, 
TITAN_VI_FORMULARIOS.CUSTOM37, 
TITAN_VI_FORMULARIOS.CUSTOM38, 
TITAN_VI_FORMULARIOS.CUSTOM39, 
TITAN_VI_FORMULARIOS.CUSTOM40, 
TITAN_VI_FORMULARIOS.CUSTOM41, 
TITAN_VI_FORMULARIOS.CUSTOM42, 
TITAN_VI_FORMULARIOS.CUSTOM43, 
TITAN_VI_FORMULARIOS.CUSTOM44
FROM
TITAN_VI_FORMULARIOS
WHERE TITAN_VI_FORMULARIOS.TASKNUMBER = '$id'";

$result = mysqli_query($cnn,$query) or die(" error $query");

$tabla .= '<table class="table table-bordered text-center" style="font-size: 10pt;">
            <tr class="bg-primary">
            <td style="background-color:#428bca;">Preguntas</td>
            <td style="background-color:#428bca;">Respuestas</td>
           
            </tr>';
while ($row = mysqli_fetch_array($result,MYSQLI_NUM)){
    $tabla .= '<tr>
    <tr>
    <td>1.- Tarea validada con?</td>
    <td><center>'.utf8_encode($row[3]).'<center></td>
    </tr>
    <tr>
    <td>2.- ¿El diagnóstico de quién generó la Tarea(NOC/CRM) fue acertado?</td>
    <td><center>'.utf8_encode($row[5]).'<center></td>
    </tr>
    <tr>
    <td>3.- Observaciones Diagnóstico</td>
    <td><center>'.utf8_encode($row[7]).'<center></td>
    </tr>
    <tr>
    <td>4.- ¿Tuvo respuesta en menos de 15 minutos al validar la Ejecución de la Tarea?</td>
    <td><center>'.utf8_encode($row[9]).'<center></td>
    </tr>
    <tr>
    <td>5.- Si estás de TAD, ¿Despacho te llamó por esta Tarea?</td>
    <td><center>'.utf8_encode($row[11]).'<center></td>
    </tr>
    <tr>
    <td>6.- ¿La falla fue corregida con o sin intervención?</td>
    <td><center>'.utf8_encode($row[13]).'<center></td>
    </tr>
    <tr>
    <td>7.- Enviar Formulario al siguiente correo:</td>
    <td><center>'.utf8_encode($row[15]).'<center></td>
    </tr>
    <tr>
    <td>8.- Trabajo Realizado 1</td>
    <td><center>'.utf8_encode($row[17]).'<center></td>
    </tr>
    <tr>
    <td>9.- Comentario</td>
    <td><center>'.utf8_encode($row[19]).'<center></td>
    </tr>
    <tr>
    <td>10.- Observaciones Generales</td>
    <td><center>'.utf8_encode($row[21]).'<center></td>
    </tr>
    <tr>
    <td>11.- Trabajo Realizado 2</td>
    <td><center>'.utf8_encode($row[23]).'<center></td>
    </tr>
    <tr>
    <td>12.- Comentario/Cantidad</td>
    <td><center>'.utf8_encode($row[25]).'<center></td>
    </tr>
    <tr>
    <td>13.- Sitio Vandalizado?</td>
    <td><center>'.utf8_encode($row[29]).'<center></td>
    </tr>
    <tr>
    <td>14.-Funcionamiento de Clima (Equipo y Ventiladores)</td>
    <td><center>'.utf8_encode($row[31]).'<center></td>
    </tr>
    <tr>
    <td>15.-Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)</td>
    <td><center>'.utf8_encode($row[33]).'<center></td>
    </tr>
    <tr>
    <td>16.-Alarmas en Equipos (Energía, RAN y TX)</td>
    <td><center>'.utf8_encode($row[35]).'<center></td>
    </tr>
    <tr>
    <td>17.-Estado GG (Alarmas, nivel de combustible)</td>
    <td><center>'.utf8_encode($row[37]).'<center></td>
    </tr>
    <tr>
    <td>18.-Se observan conexiones Irregulares de Electricidad?</td>
    <td><center>'.utf8_encode($row[39]).'<center></td>
    </tr>
    <tr>
    <td>19.-Se observa el uso indebido de las instalaciones físicas?</td>
    <td><center>'.utf8_encode($row[41]).'<center></td>
    </tr>
    <tr>
    <td>20.-Se observan problemas estructurales en la torre?</td>
    <td><center>'.utf8_encode($row[43]).'<center></td>
    </tr>
    <tr>
    <td>21.-Observaciones Generales</td>
    <td><center>'.utf8_encode($row[45]).'<center></td>
    </tr>

  
</tr>';
}                               
$tabla .= '</table>';   
echo $tabla;
?>
