<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");


$id= $_POST['id'];




$sql = "DELETE FROM  TITAN_VI_FORMULARIOS 
        WHERE TITAN_VI_FORMULARIOS.ID = '$id'";

 $res = mysqli_query($cnn,$sql);
?>