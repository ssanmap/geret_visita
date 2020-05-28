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
    <title>VISITAS</title>
    <style>
        body{
            background-color: #b2a98f;
        }
        td {
            border: 1px solid blue;
            width: 100px;
            word-wrap: break-word;
        }

        td#sitiosul{
            color:blue;
        }
        table{
            width: 100%;
        }
        span{
            cursor: pointer;

        }
        span:hover{
            background-color: gold;
        }
        a{
            cursor: pointer;
        }
        h1{
            font-size:72px;
            color:#2999BE ;
            text-shadow: 2px 2px 4px #000000;
        }
    </style>
</head>
<body>

<?php

?>


        <div class="row">
          <!--   <div class="col-md-10 text-center" style="font-size: 20px; margin-bottom:1.2em;"><strong>Panel Visita Integral</strong></div> -->
          <h1 class="display-1 text-center font-weight-bold"id="titulo"style="font-size:4rem; margin-botom:20px; padding:10px; text-shadow: 2px 2px 2px #000000;">
          Visitas Integrales </h1>
              <div class="col-sm-8 margin-top:1,2rem;"  >
                <table class="table table-bordered text-center" style="font-size: 10pt;">
                <thead>
                    <tr class="bg-primary">
                    	<td><center>CRM</center></td>
                        <td><center>ZONA</center></td>
                    	<td><center>CIUDAD</center></td>
                        <td><center>VANDALISMOS</center></td>
                        <td><center>CLIMA</center></td>
                        <td><center>HIGIENE</center></td>
                        <td><center>ALARMAS</center></td>
                        <td><center>GGEE</center></td>
                        <td><center>IRREGULARIDADES ELÉCTRICAS</center></td>
                        <td><center>IRREGULARIDADES FÍSICAS</center></td>
                        <td><center>IRREGULARIDADES TORRE</center></td>
                        <td><center>SITIOS AFECTADOS</center></td>


                    </tr>
                    </thead>




                    <?php
                        $zona_region = array("", "Norte", "Norte", "Norte", "Norte", "C. Norte", "C. Norte", "C. Norte", "RM", "C. Sur", "C. Sur", "Sur", "Sur", "Sur", "Sur", "Austral", "Austral", "Austral", "Austral", "Austral", "Austral");
                        $zona_nombre = array("", "Arica", "Iquique", "Calama", "Antofagasta", "Copiapo", "La Serena", "Valparaiso", "RM Oriente", "Rancagua", "Talca", "Chillan", "Concepcion", "Los Angeles", "Temuco", "Valdivia", "Osorno", "P. Montt", "Chiloe", "Coyhaique", "P. Arenas");
                        for($x=1; $x<21; $x++)
                        {
                            $zona = "Z".substr("0".$x, -2);
                            if($zona == "Z08") $zona = "Z08O";
                            ?>

                            <tr>
                            <td><center><?php echo $zona_region[$x]; ?></center></td>
                            <td><center> <?php echo $zona; ?></center></td>
                            <td><center><?php echo $zona_nombre[$x]; ?></center></td>
                            <td id="vandalizado">
                            <?php

                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                 $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Sitio Vandalizado?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }

                                ?>

                                 <span onclick="abrirModal('<?php echo $zona; ?>','Sitio Vandalizado?', 'CUSTOM27','<?php echo $preguntaFinal; ?>', '<?php echo utf8_encode($nombreFinal); ?>')">
                                 <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="clima">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Funcionamiento de Clima (Equipo y Ventiladores)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Funcionamiento de Clima (Equipo y Ventiladores)','CUSTOM29','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                                 <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="limpieza">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)','CUSTOM31','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                                <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="alarmas">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Alarmas en Equipos (Energía, RAN y TX)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Alarmas en Equipos (Energia, RAN y TX)','CUSTOM33', '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                                 <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="estadogg">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Estado GG (Alarmas, nivel de combustible)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Estado GG (Alarmas, nivel de combustible)','CUSTOM35','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                                <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="irreg_elect">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observan conexiones Irregulares de Electricidad?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Se observan conexiones Irregulares de Electricidad?','CUSTOM37','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                                <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="inst_fisicas">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observa el uso indebido de las instalaciones fisicas?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Se observa el uso indebido de las instalaciones físicas?','CUSTOM39','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                                <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="problema_estruc">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observan problemas estructurales en la torre?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Se observan problemas estructurales en la torre?','CUSTOM41','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                                <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="sitiosul">
                            <?php   $arreglo = prueba($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                            //echo "<pre>"; print_r($arrayDevuelto); echo "</pre>";
                                $cont = 0;
                              $cantidad = 0;
                              $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                              $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                              $nombreFinal =$nombre['NOMBRES'];
                             // echo $nombreFinal;
                              
                                foreach ($arreglo as $columna)
                                {

                                     $cantidad += $arreglo[$cont]["CANTIDAD"];
                                    // echo "<pre>"; print_r($arrayDevuelto[$cont]["CANTIDAD"]); echo "</pre>";
                                    $cont++;
                                }
                               //echo $cantidad;
                            ?>
                             <span onclick="abrirDetalle('<?php echo $zona ; ?>','<?php echo $nombreFinal ; ?>','<?php echo $preguntaFinal ; ?>')"><?php echo $cantidad; ?> </span>
                            </td>
                        </tr>

                        <?php

                        if($zona == "Z08O")
                        {
                            $zona = "Z08P";
                            ?>

                            <tr>
                            <td><center><?php echo $zona_region[$x]; ?></center></td>
                            <td><center> <?php echo $zona; ?></center></td>
                            <td><center><?php echo "RM Poniente"; ?></center></td>
                            <td id="vandalizado">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Sitio Vandalizado?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Sitio Vandalizado?','CUSTOM27','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                                 <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="clima">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Funcionamiento de Clima (Equipo y Ventiladores)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                             <span onclick="abrirModal('<?php echo $zona; ?>','Funcionamiento de Clima (Equipo y Ventiladores)','CUSTOM29', '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                             <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="limpieza">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)','CUSTOM31','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                                <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="alarmas">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Alarmas en Equipos (Energía, RAN y TX)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                            <span onclick="abrirModal('<?php echo $zona; ?>','Alarmas en Equipos (Energia, RAN y TX)','CUSTOM33','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                             <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="estadogg">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Estado GG (Alarmas, nivel de combustible)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                            <span onclick="abrirModal('<?php echo $zona; ?>','Estado GG (Alarmas, nivel de combustible)','CUSTOM35','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                            <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="irreg_elect">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observan conexiones Irregulares de Electricidad?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                            <span onclick="abrirModal('<?php echo $zona; ?>','Se observan conexiones Irregulares de Electricidad?','CUSTOM37','<?php echo $preguntaFinal?>','<?php echo utf8_encode($nombreFinal); ?>')">
                            <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="inst_fisicas">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                               // echo "<pre>"; print_r($arrayDevuelto); echo "</pre>";
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observa el uso indebido de las instalaciones físicas?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                        <span onclick="abrirModal('<?php echo $zona; ?>','Se observa el uso indebido de las instalaciones fisicas?','CUSTOM39','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">
                        <?php echo $cantidad; ?> </span>

                            </td>
                            <td id="problema_estruc">
                            <?php
                                $arrayDevuelto =  GetDatitos($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                //echo "<pre>"; print_r($arrayDevuelto); echo "</pre>";
                                $cont = 0;
                                $cantidad = 0;
                                $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                $nombreFinal =$nombre['NOMBRES'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observan problemas estructurales en la torre?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                            <span onclick="abrirModal('<?php echo $zona; ?>','Se observan problemas estructurales en la torre?','CUSTOM41','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>')">

                            <?php echo $cantidad; ?> </span>

                            </td>

                            <td id="sitiosul">
                                <?php  $arreglo = prueba($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                       $preguntaFinal = $arrayDevuelto['PreguntasFinal'];
                                      
                                       $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                       utf8_encode($nombreFinal =$nombre['NOMBRES']);
                                      //nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                                                     // echo "<pre>"; print_r($nombre); echo "</pre>";
                                                                 //    echo $nombreFinal;

                                $cont = 0;
                                $cantidad = 0;
                                //mysqli_real_escape_string($conn,utf8_decode($nombreFinal =$nombre['NOMBRES']));
                                //'".mysqli_real_escape_string($conn, utf8_decode($row['custom60']))."'
                                //echo "<pre>"; print_r($nombreFinal); echo "</pre>";
                                  foreach ($arreglo as $columna)
                                  {
                                 //   print "<p>$columna</p>\n";

                                       $cantidad += $arreglo[$cont]["CANTIDAD"];
                                       // echo $arreglo;
                                     //  echo "<pre>"; print_r($columna); echo "</pre>";
                                      $cont++;
                                  }
                                     ?>

                                <span onclick="abrirDetalle('<?php echo $zona ; ?>','<?php echo $nombreFinal ; ?>','<?php echo $preguntaFinal ; ?>')"><?php echo $cantidad; ?> </span>
                            </td>
                           
                            </tr>

                        <?php
                        }
                    }
                    ?>

                </table>

                </div>


            <div class="col-sm-4" id="conte" >
            </div>
        </div>
   <!-- Modal del detalle-->
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg"style="width:1250px;">
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
<!-- Modal de edicion-->
<div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><center>Editar registro</center></h4>
            </div>
            <div class="modal-body" id="contenedor_estado">
              <!-- <div id="listar_otro"></div> -->
            <!--   <div class="input-group  container-fluid"> -->
            <div class="container-fluid">
              <form class="row" id="formEdit">
                    <input name="idrow" type="hidden" id="idRow" />
                    <div class="form-group col-xs-12">

                        <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4">Sitio:</label>
                            <div class="input-group col-xs-8">
                                <input style="text-transform: uppercase"  type="text" name="sitio" id="sitio_final" class="form-control" placeholder="Sitio" readonly/>
                                <input type="hidden" name="nombreSitio" id="nombreSitio" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4">Observación del Técnico:</label>
                            <div class="input-group col-xs-8">
                                <input style="text-transform: uppercase"  type="text" name="sitio" id="obsTec" class="form-control" readonly />
                                <input type="hidden" name="obs" id="obs" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-xs-6 sinpadding">
                            <div class="form-inline col-xs-12" id="datoslabel"></div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                    <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4">Area Responsable</label>
                            <div class="input-group col-xs-8">
                                <select id="arearespon" name="area" class="form-control" >
                                    <option value="CRM Norte">CRM Norte </option>
                                    <option value="CRM Centro Norte">CRM Centro Norte</option>
                                     <option value="CRM Metropolitano">CRM Metropolitano</option>
                                    <option value="CRM Centro Sur" >CRM Centro Sur</option>
                                    <option value="CRM Austral" >CRM Austral</option>
                                    <option value="Infraestructura" >Infraestructura</option>
                                    <option value="CRM Metropolitano" >CRM Metropolitano</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4 col-form-label">Problemas:</label>
                            
                                <input type="text-transform: uppercase"  type="text" name="proble" id="proble"  class="form-control container-fluid" />
                           
                                
                            
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                        <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4">Persona Responsable</label>
                            <div class="input-group col-xs-8">
                                <select id="personarespon" name="responsable" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4">Estado  </label>
                            <div class="input-group col-xs-8">
                                <select id="estados" name="estados" class="form-control">
                                   <!--  <option>Nuevo</option> -->
                                    <option>En progreso</option>
                                    <option>Finalizado</option>
                                </select>
                            </div>
                    </div>
                   
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="des-problema" class="col-form-label">Descripción del Problema:</label>
                        <textarea class="form-control" id="des-problema"></textarea>
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="solucion" class="col-form-label">Solucion:</label>
                        <textarea class="form-control" id="solucion"></textarea>
                    </div>



                </form>
                </div>
            </div>
            <div class="modal-footer">
            <div id="footAccion" class="show">

                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="modEditar();">Actualizar</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
          </div>

        </div>
    </div>

    <!-- Modal otro detalle total -->
<div class="modal fade" id="myModalDeta" role="dialog">
<div class="modal-dialog modal-lg"style="width:1250px;">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><center>Detalle de Sitios</center></h4>
            </div>
            <div class="modal-body" id="contenedor_estadoDos">
              <div id="listar_detalleDos">

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>

        </div>
    </div>

    <script>
        $( document ).ready(function() {
            area($('#arearespon').val());
        });
        id_registroGlobal = 0;

        //detecta el evento change, cuando un elemento cambia
        // callback funcion dentro de una función
        $('#arearespon').change(function(){
            area($('#arearespon').val()); // estoy llamando al selector por el valor seleccionado
        });

      function abrirModal(zona,pregunta,custom, preguntaFinal,nombrefinal) {

          $('#myModal').modal('show');

          $.ajax({
        "url":"./visita_integral/detalle.php",
        type:'POST',
        data:{
            zona:zona,
            pregunta:pregunta,
            custom:custom,
            preguntaFinal:preguntaFinal,
            nombrefinal:nombrefinal
        }
        }).done(function(resp){
          $('#listar_detalle').html(resp);
        })
        }
        function area(area){
            $.ajax({
                "url":"./visita_integral/area.php",
                type:'POST',
                data:{
                // datos id es el post :id es el parametro de la function
                area:area
                }
                }).done(function(resp){
                $('#personarespon').replaceWith(resp);
                console.log('done');
                }).error(function(a,b,c){
                console.log(a);
                console.log(b);
                console.log(c);
                }).success(function(resp){
                console.log('success');
                console.log(resp);
                }) ;
        }
        function abrirModalajax(sitio_modal, id_registro, obsTec,proble,){
         // alert(obsTec);
          sitio=$('#myModal2').modal('show');
          $('#myModal').modal('hide');
          $('#myModalDeta').modal('hide');
          //document.getElementById("sitio").innerHTML = sitio_modal;
          document.getElementById("sitio_final").value = sitio_modal;
          document.getElementById("obsTec").value = obsTec;
          document.getElementById("proble").value = proble;

          id_registroGlobal = id_registro;

          var sitio = $('#sitio').val();
          let cadena = "sitio" + sitio;
          console.log(cadena);
            /*    $.ajax({
                "url":"./visita_integral/otro_detalle.php",
                type:'POST',
                data:{
                // datos id es el post :id es el parametro de la function
                    datos_id:id,
                    datos:datos
                }
                }).done(function(resp){
                $('#listar_otro').html(resp);
                }) */

                }
                function abrirDetalle(zona,nombrefinal,preguntaFinal) {

                $('#myModalDeta').modal('show');
                $.ajax({
                "url":"./visita_integral/ajax.php",
                type:'POST',
                data:{

                  zona:zona,
                  nombrefinal:nombrefinal,
                  preguntaFinal:preguntaFinal
                }
                }).done(function(resp){
                $('#listar_detalleDos').html(resp);
                })


                                                     }
          function modEditar(){

            var desProblema = $("#des-problema").val(); //recoger el texto que ingreso la persona en el elemento
            var personarespon = $('#personarespon').val();
            var estados = $('#estados').val();
            var arearespon = $('#arearespon').val();
            var solucion = $('#solucion').val();
            $.ajax({
                "url":"./visita_integral/actualiza.php",
                type:'POST',
                data:{
                // datos id es el post :id es el parametro de la function
                id:id_registroGlobal,
                desProblema:desProblema,
                personarespon:personarespon,
                estados:estados,
                arearespon:arearespon,
                solucion:solucion
                }
                }).done(function(resp){
                console.log('done');
                }).error(function(a,b,c){
                console.log(a);
                console.log(b);
                console.log(c);
                }).success(function(resp){
                    alert('registro actualizado');
                BootstrapDialog.alert('I want banana!');
                console.log('success');
                console.log(resp);
                }) ;
          }
          /* grafico */
          $('#conte').highcharts( {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Estados '
                },
                tooltip: {
                    pointFormat: ''
                },
                accessibility: {
                    point: {
                    valueSuffix: ''
                    }
                },
                plotOptions: {
                    pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: ''
                    }
                    }
                },
                series: [{
                    name: 'Visitas',
                    colorByPoint: true,
                    data: [

                       <?php
                        $consulta = "SELECT ESTADO, count(*) AS CUENTA FROM TITAN_VI_FORMULARIOS group by ESTADO";
                         $resultado = mysqli_query($cnn,$consulta);


                         while($row = mysqli_fetch_assoc($resultado))
                        {
                            if($row["ESTADO"]== ""){
                            echo '{name: \'Nuevos\',  y: '.$row["CUENTA"].' },';
                            }else{
                                echo '{name: "'.$row["ESTADO"].'",  y: '.$row["CUENTA"].' },';
                            }


                        }
                       ?>

                        ]
                }]
                });
    </script>
</body>
<?php
        function GetDatitos($zona,$hostGeret,$userGeret,$passGeret,$Aden)
        {

        $cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,$Aden);

    $sql_zonas = "
    SELECT
    'Sitio Vandalizado?' as pregunta ,
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
    TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM32 = 'NOK'  AND TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
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
    TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM34 = 'NOK' AND TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
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
    TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM36 = 'NOK' AND TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
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
    TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM38 = 'Si' AND TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
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
    TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM40 = 'Si' AND TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
    GROUP BY
    TITAN_VI_FORMULARIOS.CUSTOM40,TITAN_VI_FORMULARIOS.ZONA
    UNION
    SELECT
    'Se observan problemas estructurales en la torre?' ,
    Count(TITAN_VI_FORMULARIOS.CUSTOM42) as CANTIDAD,
    TITAN_VI_FORMULARIOS.ZONA
    FROM
    TITAN_VI_FORMULARIOS
    WHERE
    TITAN_VI_FORMULARIOS.ZONA <> '' AND TITAN_VI_FORMULARIOS.CUSTOM42 = 'Si' AND TITAN_VI_FORMULARIOS.ZONA = '".$zona."'
    GROUP BY
    TITAN_VI_FORMULARIOS.CUSTOM42,TITAN_VI_FORMULARIOS.ZONA  ";


        $res = mysqli_query($cnn,$sql_zonas);

        //echo "<pre>"; print_r($sql_zonas); echo "</pre>";
        // var_dump($res); return;
           /*  foreach ($res as $row){
                echo  "<pre>"; print_r($row); echo "</pre>";
            } */
            
        $myArray = array();
        while($row = $res->fetch_assoc())
        {
            array_push($myArray, $row);
        }
         //echo "<pre>"; print_r($myArray); echo "</pre>";

         $var_textos_pregunta = '';
     
         foreach ($myArray as $key => $value) {
            extract($value);
            // eso lo encontre buscando que dice que los convirerte en variables      
            //echo $pregunta;
            $var_textos_pregunta .= "<ul/> <li> " . $value['pregunta']." <br>";
            //print_r(array_values($myArray));
           $elemento = $value['pregunta'];
           $buscar = 'Sitio Vandalizado?';
           $remplazo = 'hola';
            $resultSearch = array_search($buscar, $pregunta);
            if (str_replace($resultSearch,$remplazo,$pregunta)) {
                
              //  echo 'Se ha cambiado el termino "'.$resultSearch.'" en la posición '.$buscar;
            } 
             }
             $base = $value['pregunta'];
             $reemplazos = array(0 => "sitio", 4 => "peito");
             $reemplazos2 = array(0 => "uva");
             
             $cesta = array_replace($base, $reemplazos, $reemplazos2);
            /*  if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++; */

        
             //echo $row[2]['pregunta'];
         
            // echo $value['pregunta'];
        // die();
        $myArray['PreguntasFinal'] = $var_textos_pregunta;
      
         // aqui traigo solo las preguntas separadas con un ul li para que se vean como l   
        return $myArray;
            

        }
        function prueba($zona,$hostGeret,$userGeret,$passGeret,$Aden)
        {

        $cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,$Aden);
        $consulta = "SELECT ID, ZONA,FORMCUSTOMERNUMBER, Count(TITAN_VI_FORMULARIOS.FORMCUSTOMERNUMBER)
        as CANTIDAD from TITAN_VI_FORMULARIOS where ZONA = '".$zona."' ";
        $resp = mysqli_query($cnn,$consulta);

        $arregloDos = array();
        while($row = $resp->fetch_assoc())
        {
            array_push($arregloDos, $row);


        }
        //echo "<pre>"; print_r($arregloDos); echo "</pre>";
        return $arregloDos;
    }
       /*  echo "<pre>"; print_r($consulta); echo "</pre>";
        die(); */
        function nombres($zona,$hostGeret,$userGeret,$passGeret,$Aden)
        {

        $cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,$Aden);
        $queryd = "SELECT ZONA , NOMBRE, AREA from TITAN_VI_RESPON where ZONA ='".$zona."' ";
        //echo "<pre>"; print_r($queryd); echo "</pre>";
       // die();
        $respu = mysqli_query($cnn,$queryd);

        $arreglotres = array();
        while($row = $respu->fetch_assoc())
        {
            array_push($arreglotres, $row);


        }
        //echo "<pre>"; print_r($arreglotres); echo "</pre>";
        
         $var_nombre = '';

         foreach ($arreglotres as $key => $value) {
           $var_nombre .=   $value['NOMBRE'];
         }
         //echo "<pre>"; print_r($var_textos_pregunta); echo "</pre>";
        // die();
        $arreglotres['NOMBRES'] = utf8_decode(utf8_encode(utf8_encode($var_nombre)));
        //mysqli_real_escape_string($cnn,utf8_decode($arreglotres));
        
        
        
         return $arreglotres;

       
         
      
    }
   

            ?>


</html>
