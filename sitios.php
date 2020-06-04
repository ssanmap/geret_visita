<?php 

//conexiones
include('/var/www/html/allware/conexion.php');
$con_rm =      new mysqli( $link ,  $dbuser ,  $dbpass ,  $bd_gestionceldas ); // zona sitio comuna
$conn      =   new mysqli($hostRAN,$userRAN,$passRAN,$db_aden); // titan
$sitio_m = $_POST['sitio_m'];
$nombrefinal = $_POST['nombrefinal'];
$proble = $_POST['proble'];
$problem = strip_tags($proble);
$id= $_POST['id'];
//echo "<pre>"; print_r($sitio_m); echo "</pre>";
//echo "<pre>"; print_r($nombrefinal); echo "</pre>";
//echo "<pre>"; print_r($proble); echo "</pre>";
//solucion cambiar por soluciondos luego de crear
$query = "SELECT 
FORMCUSTOMERNUMBER, 
COMUNA, 
PROBLEMA,
 PERSONA,
  ACTUALIZA, 
  ESTADO,
   SOLUCION

FROM `TITAN_VI_FORMULARIOS` where FORMCUSTOMERNUMBER = '$sitio_m' and ID <> '$id' ";


$result = mysqli_query($conn,$query) ;
//echo "<pre>"; print_r($query); echo "</pre>";

$tabla .= '<table class="table table-bordered text-center table-hover table-condensed" style="font-size: 8pt;">
            <tr>
                <td>SITIO</td>
                <td>COMUNA</td>
                <td>PROBLEMA</td>
                <td>RESPONSABLE</td>
                <td>ACTUALIZACIÓN</td>
                <td>ESTADO</td>
                <td>SOLUCIÓN</td>
                
            </tr>';

            while ($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                $tabla .= '<tr>
              
                <td><center>'.$row[0].'<center></td>
                <td><center>'.utf8_encode($row[1]).'<center></td>
                <td><center>'.$problem.'<center></td>
                <td><center>'.utf8_encode($nombrefinal).'<center></td>
                <td><center>'.utf8_encode($row[4]).'<center></td>
                <td><center>'.utf8_encode($row[5]).'<center></td>
                <td><center>'.utf8_encode($row[6]).'<center></td>
               

                </tr>';
            }
            $tabla .= '</table>';
            echo $tabla;
  ?>