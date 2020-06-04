<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");

$desProblema= $_POST['desProblema'];
$id= $_POST['id'];
$personarespon= $_POST['personarespon'];
$estados= $_POST['estados'];
$solucion = $_POST['solucion'];
$arearespon = $_POST['arearespon'];

$actualiza = date('Y-m-d H:i:s');

$sql = "UPDATE TITAN_VI_FORMULARIOS set TITAN_VI_FORMULARIOS.PROBLEMA = '$desProblema', 
                    TITAN_VI_FORMULARIOS.PERSONA = '$personarespon',
                    TITAN_VI_FORMULARIOS.ESTADO = '$estados',
                    TITAN_VI_FORMULARIOS.AREA = '$arearespon',
                    TITAN_VI_FORMULARIOS.SOLUCION = '$solucion',
                    TITAN_VI_FORMULARIOS.ACTUALIZA = '$actualiza'
WHERE TITAN_VI_FORMULARIOS.ID = '$id'";

 $res = mysqli_query($cnn,$sql);
?>