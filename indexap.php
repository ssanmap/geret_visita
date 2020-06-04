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
  <title>Visita Integral</title>
  <style>
    .color-azul{
      color:blue;
    }
    .color-azul:hover{
      background-color: gold;
      cursor: pointer;
    }
    a{
      cursor: pointer;
    }
  </style>
</head>
<body>

<div id="container">
        <form class="form-inline">
            <div class="row">
            <div class="col-md-12 text-center">
                <div class="col-md-4 text-center"></div>
                  <div class="col-md-4 text-center" style="font-size: 20px;"><strong>Panel Visita Integral</strong></div>
                
              </div>
              </div>


            <div class="row">
              <div class="col-md-10">
                <table class="table table-bordered text-center" style="font-size: 10pt;">
                <thead>
                    <tr class="bg-primary">
                    	<td colspan="1"><center>Estado por CRM</center></td>
                        <td><center>Zona</center></td>
                    	<td><center>Ciudad</center></td>
                        <td><center>Incidencias</center></td>

                    </tr>
                    </thead>



                    <tr>
                    	<td rowspan="4"><strong>Norte</strong></td>
                        <td><center>Zona 1</center></td>
                        <td><center>Arica</center></td>
                        <td id="arica">
                          <?php GetDatitos('Z01',$hostGeret,$userGeret,$passGeret,'Aden'); ?>
                           <!-- <span onclick="abrirModal('Z01','<?php echo $contadorZona1 ; ?>')"> <?php echo $contadorZona1 ; ?> </span>  -->
                        </td>

                    </tr>
                    <tr>
                        <td><center>Zona 2</center></td>
                        <td><center>Iquique</center></td>
                        <td id="iquique">
                        <?php GetDatitos('Z02',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

                          <!-- <span onclick="abrirModal('Z02','<?php echo $contadorZona2 ; ?>')"> <?php echo $contadorZona2 ; ?> </span> -->
                          </td>
                    </tr>
                    <tr>
                        <td><center>Zona 3</center></td>
                        <td><center>Calama</center></td>
                        <td id="calama">
                        <?php GetDatitos('Z03',$hostGeret,$userGeret,$passGeret,'Aden'); ?>
                       
<!--                         <span onclick="abrirModal('Z03','<?php echo $contadorZona3 ; ?>')"> <?php echo $contadorZona3 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 4</center></td>
                        <td><center>Antofagasta</center></td>
                        <td id="antofa">
                        <?php GetDatitos('Z04',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

                   
                          <!-- <span onclick="abrirModal('Z04','<?php echo $contadorZona4 ; ?>')"> <?php echo $contadorZona4 ; ?> </span>  -->
                      </td>
                    </tr>
                    <tr>
                        <td rowspan="3" id="centro_norte"></div></td>
                        <td><center>Zona 5</center></td>
                        <td><center>Copiapo</center></td>
                        <td id="copiapo">
                        <?php GetDatitos('Z05',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z05','<?php echo $contadorZona5 ; ?>')"> <?php echo $contadorZona5 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 6</center></td>
                        <td><center>La Serena</center></td>
                        <td id="serena">
                        <?php GetDatitos('Z06',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

                         <!--  <span onclick="abrirModal('Z06','<?php echo $contadorZona6 ; ?>')"> <?php echo $contadorZona6 ; ?> </span> -->
                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 7</center></td>
                        <td><center>Valparaiso</center></td>
                        <td id="valpo">
                        <?php GetDatitos('Z07',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                         <span onclick="abrirModal('Z07','<?php echo $contadorZona7 ; ?>')"> <?php echo $contadorZona7 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                    	<td rowspan="2"><strong>RM</strong></td>
                        <td><center>Zona 8O</center></td>
                        <td><center>RM Oriente</center></td>
                        <td id="divZONA8O">
                        <?php GetDatitos('Z08O',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z08O','<?php echo $contadorZona8o ; ?>')"> <?php echo $contadorZona8o ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 8P</center></td>
                        <td><center>RM Poniente</center></td>
                        <td id="divZONA8P">
                        <?php GetDatitos('Z08P',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z08P','<?php echo $contadorZona8p ; ?>')"> <?php echo $contadorZona8p ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                    	<td rowspan="2"><strong>Centro Sur</strong></td>
                        <td><center>Zona 9</center></td>
                        <td><center>Rancagua</center></td>
                        <td id="rancagua">
                        <?php GetDatitos('Z09',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z09','<?php echo $contadorZona9 ; ?>')"> <?php echo $contadorZona9 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 10</center></td>
                        <td><center>Talca</center></td>
                        <td id="talca">
                        <?php GetDatitos('Z10',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z10','<?php echo $contadorZona10 ; ?>')"> <?php echo $contadorZona10 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                    	<td rowspan="4"><strong>Sur</strong></td>
                        <td><center>Zona 11</center></td>
                        <td><center>Chillan</center></td>
                        <td id="chillan">
                        <?php GetDatitos('Z11',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                            <span onclick="abrirModal('Z11','<?php echo $contadorZona11 ; ?>')"> <?php echo $contadorZona11 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 12</center></td>
                        <td><center>Concepcion</center></td>
                        <td id="conce">
                        <?php GetDatitos('Z12',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z12','<?php echo $contadorZona12 ; ?>')"> <?php echo $contadorZona12 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 13</center></td>
                        <td><center>Los Angeles</center></td>
                        <td id="angeles">
                        <?php GetDatitos('Z13',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z13','<?php echo $contadorZona13 ; ?>')"> <?php echo $contadorZona13 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 14</center></td>
                        <td><center>Temuco</center></td>
                        <td id="temuco">
                        <?php GetDatitos('Z14',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z14','<?php echo $contadorZona14 ; ?>')"> <?php echo $contadorZona14 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                    	<td rowspan="6"><strong>Austral</strong></td>
                        <td><center>Zona 15</center></td>
                        <td><center>Valdivia</center></td>
                        <td id="valdivia">
                        <?php GetDatitos('Z15',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z15','<?php echo $row[1] ; ?>')"> <?php echo $row[1] ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 16</center></td>
                        <td><center>Osorno</center></td>
                        <td id="osorno">
                        <?php GetDatitos('Z16',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z16','<?php echo $contadorZona16 ; ?>')"> <?php echo $contadorZona16 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 17</center></td>
                        <td><center>Puerto Montt</center></td>
                        <td id="montt">
                        <?php GetDatitos('Z17',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z17','<?php echo $contadorZona17 ; ?>')"> <?php echo $contadorZona17 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 18</center></td>
                        <td><center>Chiloe</center></td>
                        <td id="chiloe"> 
                        <?php GetDatitos('Z18',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z18','<?php echo $contadorZona18 ; ?>')"> <?php echo $contadorZona18 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 19</center></td>
                        <td><center>Coyhaique</center></td>
                        <td id="coyhaique">
                        <?php GetDatitos('Z19',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z19','<?php echo $contadorZona19 ; ?>')"> <?php echo $contadorZona19 ; ?> </span>
 -->                      </td>
                    </tr>
                    <tr>
                        <td><center>Zona 20</center></td>
                        <td><center>Punta Arenas</center></td>
                        <td id="arenas">
                        <?php GetDatitos('Z20',$hostGeret,$userGeret,$passGeret,'Aden'); ?>

<!--                           <span onclick="abrirModal('Z20','<?php echo $contadorZona20 ; ?>')"> <?php echo $contadorZona20 ; ?> </span>
 -->                      </td>
                    </tr>
                </table>
              </div>




              <div class="col-md-6">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div id="container1"></div>
                    </div>
                    <div class="col-md-5">
                        <div id="container2"></div>
                    </div>
                    <div class="col-md-1"></div>
                </div></br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div id="container3"></div>
                    </div>
                    <div class="col-md-5">
                        <div id="container4"></div>
                    </div>
                    <div class="col-md-1"></div>
                </div></br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div id="container5"></div>
                    </div>
                    <div class="col-md-5">
                        <div id="container6"></div>
                    </div>
                    <div class="col-md-1"></div>
                </div></br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div id="container7"></div>
                    </div>
                    <div class="col-md-5">
                        <div id="container8"></div>
                    </div>
                    <div class="col-md-1"></div>
                </div></br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div id="container9"></div>
                    </div>
                    <div class="col-md-5">
                        <div id="container10"></div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
              </div>
            </div>
        </form>
    </div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><center>Datos de Visitas integrales</center></h4>
            </div>
            <div class="modal-body" id="contenedor_estado">
              <div id="listar_detalle">

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>

        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><center>Observaciones</center></h4>
            </div>
            <div class="modal-body" id="contenedor_estado">
              <div id="listar_otro">

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>

        </div>
    </div>


    <script>

      function abrirModal(zona,contador) {
        if(contador>0){
          $('#myModal').modal('show');
          $.ajax({
        "url":"./visita_integral/detalle.php",
        type:'POST',
        data:{
            zona:zona
        }
        }).done(function(resp){
          $('#listar_detalle').html(resp);
        })
        }



      }

      function abrirModalajax(id){
        $('#myModal2').modal('show');

        $.ajax({
        "url":"./visita_integral/otro_detalle.php",
        type:'POST',
        data:{
          // datos id es el post :id es el parametro de la function
            datos_id:id
        }
        }).done(function(resp){
          $('#listar_otro').html(resp);
        })

          }

    </script>
</body>

<?php
function GetDatitos($zona,$hostGeret,$userGeret,$passGeret,$Aden){
  //include_once ('../../allware/conexion.php');

  $cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,$Aden);

    $sql_zonas = " SELECT
          'Sitio Vandalizado?',
          Count(TITAN_VI_FORMULARIOS.CUSTOM28) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM28 = 'Si' AND TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM28,TITAN_VI_FORMULARIOS.ZONA
          UNION
          SELECT
          'Funcionamiento de Clima (Equipo y Ventiladores)',
          Count(TITAN_VI_FORMULARIOS.CUSTOM30) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM30 = 'NOK' AND TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM30,TITAN_VI_FORMULARIOS.ZONA
          UNION
          SELECT
          'Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)',
          Count(TITAN_VI_FORMULARIOS.CUSTOM32) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM32 = 'NOK' AND  TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM32,TITAN_VI_FORMULARIOS.ZONA
          UNION
          SELECT
          'Alarmas en Equipos (Energía, RAN y TX)',
          Count(TITAN_VI_FORMULARIOS.CUSTOM34) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM34 = 'NOK' AND  TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM34,TITAN_VI_FORMULARIOS.ZONA
          UNION
          SELECT
          'Estado GG (Alarmas, nivel de combustible)',
          Count(TITAN_VI_FORMULARIOS.CUSTOM36) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM36 = 'NOK' AND  TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM36,TITAN_VI_FORMULARIOS.ZONA
          UNION
          SELECT
          'Se observan conexiones Irregulares de Electricidad?',
          Count(TITAN_VI_FORMULARIOS.CUSTOM38) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM38 = 'Si' AND  TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM38,TITAN_VI_FORMULARIOS.ZONA
          UNION
          SELECT
          'Se observa el uso indebido de las instalaciones físicas?',
          Count(TITAN_VI_FORMULARIOS.CUSTOM40) as CANTIDAD,
          TITAN_VI_FORMULARIOS.ZONA
          FROM
          TITAN_VI_FORMULARIOS
          WHERE
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM40 = 'Si' AND  TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
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
          TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM42 = 'Si' AND  TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
          GROUP BY
          TITAN_VI_FORMULARIOS.CUSTOM42,TITAN_VI_FORMULARIOS.ZONA ";

    $res = mysqli_query($cnn,$sql_zonas);

/*     if ($res) {
      echo "funciona la query";
    }else{
       printf("Errormessage: %s\n", $mysqli->error);
    } */
    $row_zona=array();
    //ejecutar el sql, la respuesta guardarla en un arreglo

    //echo "<pre>"; print_r($row_zona); echo "</pre>";
    // die();
    /*    print_r($respuesta_otra);
         exit; */
    //recorrer la respuesta con un foreach

    // armar tabla

    $tabla_zona .= '<table class="table table-bordered text-center" style="font-size: 10pt;">
    <tr>
    <td>Preguntas</td>
    <td>Cantidad</td>

    </tr>';

    while ($row = mysqli_fetch_array($res,MYSQLI_NUM)){    
      
      $tabla_zona .= "<tr>
      
     
                        <td> $row[0]</td>
                        <td> <span ".(($row[1] < 1)?'class="color-default"':'class="color-azul"')." onclick=\"abrirModal('".$row[2]."',".$row[1].")\"> $row[1]</span> </td>


                        
                      </tr>";
    }

    $tabla_zona .= "</table>";

    echo $tabla_zona;
    // return $tabla_zona;
    //CADENA DE TEXTO APRENDE
}
?>
</html>
