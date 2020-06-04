<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
$area = $_POST['area'];

$query = "SELECT NOMBRE FROM `TITAN_VI_RESPON` where AREA = '$area'
";
$resultado =  mysqli_query($cnn,$query) ;
//echo "<pre>"; print_r($query); echo "</pre>";
//echo "<pre>"; print_r($resultado); echo "</pre>";
//die();
$select .= ' <select id="personarespon" name="responsable" class="form-control" >   ';

while($row = $resultado->fetch_assoc())
{
   $select .= '<option value="'.utf8_encode($row["NOMBRE"]).'">'.utf8_encode($row["NOMBRE"]).' </option>';
   //echo "<pre>"; print_r($row["NOMBRE"]); echo "</pre>";
}
             
$select .= '</select>';
echo $select;
                                  
  
?>