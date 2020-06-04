<?php
include('/var/www/html/allware/conexion.php');
//include_once('./menu.php');
//$con       =   new mysqli($linkpsg,$psguser,$psgpass,$o_m);
$conn      =   new mysqli($hostRAN,$userRAN,$passRAN,$db_aden);
$con_rm = new mysqli($link ,$dbuser ,  $dbpass ,$bd_gestionceldas );
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3','officetrack');

$tildes = $conOT->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente

$sql_ot = "SELECT
F.TaskNumber,
F.FormName,
F.FormVersion,
F.FormCustomerNumber,
F.FechaForm,
F.custom1,
F.custom2,
F.custom3,
F.custom4,
F.custom5,
F.custom6,
F.custom7,
F.custom8,
F.custom9,
F.custom10,
F.custom11,
F.custom12,
F.custom13,
F.custom14,
F.custom15,
F.custom16,
F.custom17,
F.custom18,
F.custom19,
F.custom20,
F.custom21,
F.custom22,
F.custom23,
F.custom24,
F.custom25,
F.custom26,
F.custom27,
F.custom28,
F.custom29,
F.custom30,
F.custom31,
F.custom32,
F.custom33,
F.custom34,
F.custom35,
F.custom36,
F.custom37,
F.custom38,
F.custom39,
F.custom40,
F.custom41,
F.custom42,
F.custom43,
F.custom44,
F.custom45,
F.custom46,
F.custom47,
F.custom48,
F.custom49,
F.custom50,
F.custom51,
F.custom52,
F.custom53,
F.custom54,
F.custom55,
F.custom56,
F.custom57,
F.custom58,
F.custom59,
F.custom60,
F.Updated,
tmp_Task.ContractorCode,
tmp_Task.CustomerCity,
tmp_Task.CustomerState,
tmp_Task.EmployeeFirstName
FROM
Form AS F
INNER JOIN tmp_Task ON F.TaskNumber = tmp_Task.TaskNumber
WHERE
F.FORMNAME = 'MTTO Correctivo - Cierre - v2' AND (
F.CUSTOM32 = 'Si' OR
F.CUSTOM34 = 'NOK' OR
F.CUSTOM36 = 'NOK' OR
F.CUSTOM38 = 'NOK' OR
F.CUSTOM40 = 'NOK' OR
F.CUSTOM42 = 'Si' OR
F.CUSTOM44 = 'Si' OR
F.CUSTOM46 = 'Si') AND FormVersion >= 28";

$res_ot = mysqli_query($conOT,$sql_ot);
if(!$res_ot){echo "<pre>ERROR MYSQLI ".mysqli_error($conOT)."</pre>";}
$row_num = mysqli_num_rows($res_ot);
if ($row_num > 0) { echo "OK"; } else { echo "NOK"; }

$bandera_update = 0;
$bandera_insert = 0;

$sql = "SELECT
T1.ID,
T1.TASKNUMBER,
T1.UPDATED,
T1.FORMCUSTOMERNUMBER,
T1.FECHAFORM
FROM TITAN_VI_FORMULARIOS T1";
$r = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($r)){
  $arrExistentes[] = $row['TASKNUMBER'].'|'.$row['FECHAFORM'];
  $arrExistentesID[$row['TASKNUMBER'].'|'.$row['FECHAFORM']] = $row['ID'];
  $arrExistentesUPDATED[$row['TASKNUMBER'].'|'.$row['FECHAFORM']] = $row['UPDATED'];
}

while($row = mysqli_fetch_assoc($res_ot)){


    if(!in_array($row['TaskNumber'].'|'.$row['FechaForm'],$arrExistentes)){
      //insert
      echo "Inserta ".$row['TaskNumber']. "\n";
      $sqlinsert = "
      INSERT INTO
        TITAN_VI_FORMULARIOS (
          `TASKNUMBER`,
          `FORMNAME`,
          `FORMVERSION`,
          `FORMCUSTOMERNUMBER`,
          `FECHAFORM`,
          `CUSTOM1`,
          `CUSTOM2`,
          `CUSTOM3`,
          `CUSTOM4`,
          `CUSTOM5`,
          `CUSTOM6`,
          `CUSTOM7`,
          `CUSTOM8`,
          `CUSTOM9`,
          `CUSTOM10`,
          `CUSTOM11`,
          `CUSTOM12`,
          `CUSTOM13`,
          `CUSTOM14`,
          `CUSTOM15`,
          `CUSTOM16`,
          `CUSTOM17`,
          `CUSTOM18`,
          `CUSTOM19`,
          `CUSTOM20`,
          `CUSTOM21`,
          `CUSTOM22`,
          `CUSTOM23`,
          `CUSTOM24`,
          `CUSTOM25`,
          `CUSTOM26`,
          `CUSTOM27`,
          `CUSTOM28`,
          `CUSTOM29`,
          `CUSTOM30`,
          `CUSTOM31`,
          `CUSTOM32`,
          `CUSTOM33`,
          `CUSTOM34`,
          `CUSTOM35`,
          `CUSTOM36`,
          `CUSTOM37`,
          `CUSTOM38`,
          `CUSTOM39`,
          `CUSTOM40`,
          `CUSTOM41`,
          `CUSTOM42`,
          `CUSTOM43`,
          `CUSTOM44`,
          `CUSTOM45`,
          `CUSTOM46`,
          `CUSTOM47`,
          `CUSTOM48`,
          `CUSTOM49`,
          `CUSTOM50`,
          `CUSTOM51`,
          `CUSTOM52`,
          `CUSTOM53`,
          `CUSTOM54`,
          `CUSTOM55`,
          `CUSTOM56`,
          `CUSTOM57`,
          `CUSTOM58`,
          `CUSTOM59`,
          `CUSTOM60`,
          `UPDATED`,
          `ZONA`,
          `COMUNA`,
          `REGION`,
          `TECNICO`

            )
        VALUES (

        '".mysqli_real_escape_string($conn, $row['TaskNumber'])."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['FormName']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['FormVersion']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['FormCustomerNumber']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['FechaForm']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom1']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom2']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom3']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom4']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom5']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom6']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom7']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom8']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom9']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom10']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom11']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom12']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom13']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom14']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom15']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom16']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom17']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom18']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom19']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom20']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom21']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom22']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom23']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom24']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom25']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom26']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom27']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom28']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom29']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom30']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom31']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom32']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom33']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom34']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom35']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom36']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom37']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom38']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom39']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom40']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom41']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom42']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom43']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom44']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom45']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom46']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom47']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom48']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom49']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom50']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom51']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom52']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom53']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom54']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom55']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom56']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom57']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom58']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom59']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['custom60']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['Updated']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['ContractorCode']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['CustomerCity']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['CustomerState']))."',
        '".mysqli_real_escape_string($conn, utf8_decode($row['EmployeeFirstName']))."')";

        $res_update = mysqli_query($conn, $sqlinsert)
        or die("<br>Error query en el insert "
        .mysqli_error($conn)."<br>".print_r($sqlinsert));

        if ($res_update) {
          $bandera_insert++;
        }

    }else{

        //updaTea recordar siempre el where UPDATED(antigua) TASKNUMBER()  T1.FORMNAME
        $fUpdated = $arrExistentesUPDATED[$row['TaskNumber'].'|'.$row['FechaForm']];
        if ($fUpdated != $row['Updated']) {
          $idRegistro = $arrExistentesID[$row['TaskNumber'].'|'.$row['FechaForm']];
          echo "Updatea ".$row['TaskNumber']. " ID ".$idRegistro."\n";

          $sql_up = "UPDATE `TITAN_VI_FORMULARIOS` SET
          FORMVERSION='".utf8_decode($row['FormVersion'])."',
          FORMCUSTOMERNUMBER='".utf8_decode($row['FormCustomerNumber'])."',
          FECHAFORM='".utf8_decode($row['FechaForm'])."',
          CUSTOM1='".utf8_decode($row['Custom1'])."',
          CUSTOM2='".utf8_decode($row['Custom2'])."',
          CUSTOM3='".utf8_decode($row['Custom3'])."',
          CUSTOM4='".utf8_decode($row['Custom4'])."',
          CUSTOM5='".utf8_decode($row['Custom5'])."',
          CUSTOM6='".utf8_decode($row['Custom6'])."',
          CUSTOM7='".utf8_decode($row['Custom7'])."',
          CUSTOM8='".utf8_decode($row['Custom8'])."',
          CUSTOM9='".utf8_decode($row['Custom9'])."',
          CUSTOM10='".utf8_decode($row['Custom10'])."',
          CUSTOM11='".utf8_decode($row['Custom11'])."',
          CUSTOM12='".utf8_decode($row['Custom12'])."',
          CUSTOM13='".utf8_decode($row['Custom13'])."',
          CUSTOM14='".utf8_decode($row['Custom14'])."',
          CUSTOM15='".utf8_decode($row['Custom15'])."',
          CUSTOM16='".utf8_decode($row['Custom16'])."',
          CUSTOM17='".utf8_decode($row['Custom17'])."',
          CUSTOM18='".utf8_decode($row['Custom18'])."',
          CUSTOM19='".utf8_decode($row['Custom19'])."',
          CUSTOM20='".utf8_decode($row['Custom20'])."',
          CUSTOM21='".utf8_decode($row['Custom21'])."',
          CUSTOM22='".utf8_decode($row['Custom22'])."',
          CUSTOM23='".utf8_decode($row['Custom23'])."',
          CUSTOM24='".utf8_decode($row['Custom24'])."',
          CUSTOM25='".utf8_decode($row['Custom25'])."',
          CUSTOM26='".utf8_decode($row['Custom26'])."',
          CUSTOM27='".utf8_decode($row['Custom27'])."',
          CUSTOM28='".utf8_decode($row['Custom28'])."',
          CUSTOM29='".utf8_decode($row['Custom29'])."',
          CUSTOM30='".utf8_decode($row['Custom30'])."',
          CUSTOM31='".utf8_decode($row['Custom31'])."',
          CUSTOM32='".utf8_decode($row['Custom32'])."',
          CUSTOM33='".utf8_decode($row['Custom33'])."',
          CUSTOM34='".utf8_decode($row['Custom34'])."',
          CUSTOM35='".utf8_decode($row['Custom35'])."',
          CUSTOM36='".utf8_decode($row['Custom36'])."',
          CUSTOM37='".utf8_decode($row['Custom37'])."',
          CUSTOM38='".utf8_decode($row['Custom38'])."',
          CUSTOM39='".utf8_decode($row['Custom39'])."',
          CUSTOM40='".utf8_decode($row['Custom40'])."',
          CUSTOM41='".utf8_decode($row['Custom41'])."',
          CUSTOM42='".utf8_decode($row['Custom42'])."',
          CUSTOM43='".utf8_decode($row['Custom43'])."',
          CUSTOM44='".utf8_decode($row['Custom44'])."',
          CUSTOM45='".utf8_decode($row['Custom45'])."',
          CUSTOM46='".utf8_decode($row['Custom46'])."',
          CUSTOM47='".utf8_decode($row['Custom47'])."',
          CUSTOM48='".utf8_decode($row['Custom48'])."',
          CUSTOM49='".utf8_decode($row['Custom49'])."',
          CUSTOM50='".utf8_decode($row['Custom50'])."',
          CUSTOM51='".utf8_decode($row['Custom51'])."',
          CUSTOM52='".utf8_decode($row['Custom52'])."',
          CUSTOM53='".utf8_decode($row['Custom53'])."',
          CUSTOM54='".utf8_decode($row['Custom54'])."',
          CUSTOM55='".utf8_decode($row['Custom55'])."',
          CUSTOM56='".utf8_decode($row['Custom56'])."',
          CUSTOM57='".utf8_decode($row['Custom57'])."',
          CUSTOM58='".utf8_decode($row['Custom58'])."',
          CUSTOM59='".utf8_decode($row['Custom59'])."',
          CUSTOM60='".utf8_decode($row['Custom60'])."',
          UPDATED='".$row['Updated']."',
          ZONA= '".utf8_decode($row['ContractorCode'])."',
          COMUNA= '".utf8_decode($row['CustomerCity'])."',
          REGION= '".utf8_decode($row['CustomerState'])."',
          TECNICO= '".utf8_decode($row['EmployeeFirstName'])."'

          WHERE ID = $idRegistro";

        $res_up = mysqli_query($conn, $sql_up)
        or die("\nError query en el update "
        .mysqli_error($conn)."\n".print_r($sql_up));

          if ($res_up) $bandera_update++;

        }
    }
}

echo "SE ACTUALIZARON ".$bandera_update. " REGISTROS.\n ";
echo "SE INGRESARON ".$bandera_insert. " REGISTROS.\n ";
mysqli_close($con_rm);
mysqli_close($conn);
mysqli_close($conOT);

?>
