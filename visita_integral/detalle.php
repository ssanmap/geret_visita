<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
$zona = $_POST['zona'];
$pregunta = $_POST['pregunta'];
$custom = $_POST['custom'];
$preguntaFinal = $_POST['preguntaFinal'];
$nombrefinal = $_POST['nombrefinal'];

if ($pregunta == 'Funcionamiento de Clima (Equipo y Ventiladores)') {
    $condicion = "AND TITAN_VI_FORMULARIOS.CUSTOM30 = 'NOK'";
}
elseif($pregunta == 'Sitio Vandalizado?'){
    $condicion = "AND TITAN_VI_FORMULARIOS.CUSTOM28 = 'Si'";
}
elseif($pregunta == 'Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)'){
    $condicion = "AND TITAN_VI_FORMULARIOS.CUSTOM32 = 'NOK'";
}
elseif($pregunta == 'Alarmas en Equipos (Energia, RAN y TX)'){
    $condicion = "AND TITAN_VI_FORMULARIOS.CUSTOM34 = 'NOK'";
}
elseif($pregunta == 'Estado GG (Alarmas, nivel de combustible)'){
    $condicion = "AND TITAN_VI_FORMULARIOS.CUSTOM36 = 'NOK'";
}
elseif($pregunta == 'Se observan conexiones Irregulares de Electricidad?'){
$condicion = "AND TITAN_VI_FORMULARIOS.CUSTOM38 = 'Si'";
}
elseif($pregunta == 'Se observa el uso indebido de las instalaciones fisicas?'){
$condicion = "AND TITAN_VI_FORMULARIOS.CUSTOM40 = 'Si'";
}
elseif($pregunta ==  'Se observan problemas estructurales en la torre?'){
$condicion = "AND TITAN_VI_FORMULARIOS.CUSTOM42 = 'Si'";
}
else{
    $condicion = '';
}


$query = "SELECT
TITAN_VI_FORMULARIOS.ID,
TITAN_VI_FORMULARIOS.TASKNUMBER,
TITAN_VI_FORMULARIOS.FORMNAME,
TITAN_VI_FORMULARIOS.FORMVERSION,
TITAN_VI_FORMULARIOS.FORMCUSTOMERNUMBER,
TITAN_VI_FORMULARIOS.FECHAFORM,
TITAN_VI_FORMULARIOS.COMUNA,
TITAN_VI_FORMULARIOS.REGION,
TITAN_VI_FORMULARIOS.CUSTOM2,
TITAN_VI_FORMULARIOS.ESTADO ,
TITAN_VI_FORMULARIOS.UPDATED,
TITAN_VI_FORMULARIOS.PERSONA,
TITAN_VI_FORMULARIOS.ACTUALIZA,
TITAN_VI_FORMULARIOS.CUSTOM48,
TITAN_VI_FORMULARIOS.TECNICO


from TITAN_VI_FORMULARIOS
where ZONA = '$zona' and $custom = '$pregunta'  $condicion";

//echo "<pre>"; print_r($query); echo "</pre>";
$result = mysqli_query($cnn,$query) or die(" error $query");



$tabla .= '<table class="table table-bordered text-center" style="font-size: 10pt;">
            <tr class="bg-primary">
                <td>N° TAREA</td>
                <td>SITIO</td>
                <td>COMUNA</td>
                <td>REGION</td>
                <td>TÉCNICO</td>
                <td>PROBLEMA</td>
                <td>RESPONSABLE</td>
                <td>ACTUALIZACIÓN</td>
                <td>CREACIÓN</td>
                <td>ESTADO</td>
                <td>ACCIÓN</td>


            </tr>';
while ($row = mysqli_fetch_array($result,MYSQLI_NUM)){
    $estado = $row[9];
  
    if(empty($row[9])){
        $estado = "Nuevo";
        }
     

        $usuario = $row[14]; 
        $parentesis = "(";
        $punto = ".";
        $sinp = substr($usuario, 0, strpos($usuario, $parentesis));
        $domain = strstr($sinp, $punto,false);
        $final = strstr($domain," ",false);
        
        //echo $final;

        
      
    $tabla .= '<tr>
    
    <td><center>'.$row[1].'<center></td>
    <td><center>'.utf8_encode($row[4]).'<center></td>
    <td><center>'.utf8_encode($row[6]).'<center></td>
    <td><center>'.utf8_encode($row[7]).'<center></td>
    <td><center>'.utf8_encode($final).'<center></td> 
    <td><center> '.$preguntaFinal.' <center></td>
    <td><center>'.utf8_decode($nombrefinal).'<center> </td>
    <td> <center>'.utf8_encode($row[12]).'<center></td>
    <td> '.utf8_encode($row[5]).' </td>
    <td><center>'.utf8_encode($estado).'<center> </td>
    <td><button class="btn btn-warning 	glyphicon glyphicon-pencil" onclick="abrirModalajax(\''.$row[4].'\',\''.$row[0].'\' ,\''.$row[13].'\',\''.$preguntaFinal.'\')">  
    Editar</button></td>
    

</tr>';
}
$tabla .= '</table>';
echo $tabla;


?>
<!--onclick=\"abrirModal('".$row[2]."',".$row[1].")\">
    <a onclick="abrirModalajax('.$row[1].')">
  -->
