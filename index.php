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
        .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;

        }

        .active, .accordion:hover {
        background-color: #ccc;
        }

        .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
        }
        /* span::after {
        content: "→";
        } */
    </style>
   <!-- <script src="js/alertifyjs/alertify.js"></script> -->

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
                                 $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Sitio Vandalizado?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }

                                ?>

                                 <span onclick="abrirModal('<?php echo $zona; ?>','Sitio Vandalizado?', 'CUSTOM27','<?php echo $preguntaFinal; ?>', '<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Funcionamiento de Clima (Equipo y Ventiladores)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Funcionamiento de Clima (Equipo y Ventiladores)','CUSTOM29',
                                '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>', '<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)','CUSTOM31',
                                '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Alarmas en Equipos (Energía, RAN y TX)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Alarmas en Equipos (Energia, RAN y TX)','CUSTOM33',
                                '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>', '<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Estado GG (Alarmas, nivel de combustible)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Estado GG (Alarmas, nivel de combustible)','CUSTOM35',
                                '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observan conexiones Irregulares de Electricidad?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Se observan conexiones Irregulares de Electricidad?','CUSTOM37',
                                '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>',    '<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observa el uso indebido de las instalaciones fisicas?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Se observa el uso indebido de las instalaciones físicas?',
                                'CUSTOM39','<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observan problemas estructurales en la torre?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Se observan problemas estructurales en la torre?','CUSTOM41',
                                '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf; ?>')">
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
                              $areaf =$nombre['AREAS'];
                             // echo $nombreFinal;

                                foreach ($arreglo as $columna)
                                {

                                     $cantidad += $arreglo[$cont]["CANTIDAD"];
                                    // echo "<pre>"; print_r($arrayDevuelto[$cont]["CANTIDAD"]); echo "</pre>";
                                    $cont++;
                                }
                               //echo $cantidad;
                            ?>
                             <span onclick="abrirDetalle('<?php echo $zona ; ?>','<?php echo $nombreFinal ; ?>','<?php echo $preguntaFinal ; ?>','<?php echo $areaf ; ?>')"><?php echo $cantidad; ?> </span>
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Sitio Vandalizado?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Sitio Vandalizado?','CUSTOM27','<?php echo $preguntaFinal; ?>',
                                '<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Funcionamiento de Clima (Equipo y Ventiladores)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                             <span onclick="abrirModal('<?php echo $zona; ?>','Funcionamiento de Clima (Equipo y Ventiladores)','CUSTOM29', '<?php echo $preguntaFinal; ?>',
                             '<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                                <span onclick="abrirModal('<?php echo $zona; ?>','Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)','CUSTOM31',
                                '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>', '<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Alarmas en Equipos (Energía, RAN y TX)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                            <span onclick="abrirModal('<?php echo $zona; ?>','Alarmas en Equipos (Energia, RAN y TX)','CUSTOM33',
                            '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Estado GG (Alarmas, nivel de combustible)", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                            <span onclick="abrirModal('<?php echo $zona; ?>','Estado GG (Alarmas, nivel de combustible)','CUSTOM35',
                            '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observan conexiones Irregulares de Electricidad?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                            <span onclick="abrirModal('<?php echo $zona; ?>','Se observan conexiones Irregulares de Electricidad?',
                            'CUSTOM37','<?php echo $preguntaFinal?>','<?php echo utf8_encode($nombreFinal); ?>','<?php echo $areaf?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observa el uso indebido de las instalaciones físicas?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                        <span onclick="abrirModal('<?php echo $zona; ?>','Se observa el uso indebido de las instalaciones fisicas?','CUSTOM39',
                        '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>', '<?php echo $areaf; ?>')">
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
                                $areaf =$nombre['AREAS'];
                                foreach ($arrayDevuelto as $columna)
                                {
                                    $valor = array_search("Se observan problemas estructurales en la torre?", $columna);
                                    if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++;
                                }
                            ?>
                            <span onclick="abrirModal('<?php echo $zona; ?>','Se observan problemas estructurales en la torre?','CUSTOM41',
                            '<?php echo $preguntaFinal; ?>','<?php echo utf8_encode($nombreFinal); ?>', '<?php echo $areaf; ?>')">

                            <?php echo $cantidad; ?> </span>

                            </td>

                            <td id="sitiosul">
                                <?php  $arreglo = prueba($zona,$hostGeret,$userGeret,$passGeret,'Aden');
                                       $preguntaFinal = $arrayDevuelto['PreguntasFinal'];

                                       $nombre = nombres($zona,$hostGeret,$userGeret,$passGeret,'Aden');

                                       $areaf =$nombre['AREAS'];
                                       //echo $areaf;
                                       utf8_encode($nombreFinal =$nombre['NOMBRES']);


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

                                <span onclick="abrirDetalle('<?php echo $zona ; ?>','<?php echo $nombreFinal ; ?>','<?php echo $preguntaFinal ; ?>','<?php echo $areaf ; ?>')"><?php echo $cantidad; ?> </span>
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
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><center>Datos de Visitas integrales</center></h4>
            </div>
            <div class="modal-body" id="contenedor_estado">
            <input type="button" value="Exportar"  class="btn btn-success pull-right" onclick="Export('<?php echo $zona; ?>'
            ,'Se observa el uso indebido de las instalaciones fisicas?','CUSTOM39'); "style="margin-top:1px; margin-bottom:4px; margin-left: 4px !important; padding:5px;"/>
            <!-- onclick="Export();" -->
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
        <div class="modal-dialog modal-lg" style="width:1100px;">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="font-size: 2.6rem;"><center>Editar Registro</center></h4>
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
                                <input style="text-transform: uppercase"  type="text" name="sitio" id="sitio_final" class="form-control" rows="3"placeholder="Sitio" readonly/>
                                <input type="hidden" name="nombreSitio" id="nombreSitio" class="form-control" rows="3"/>
                            </div>
                        </div>
                        <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4">Observación del Técnico:</label>
                            <div class="input-group col-xs-8">
                                <textarea class="form-control" id="obsTec" readonly style="text-transform: uppercase"></textarea>
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
                                <select id="areaf" name="areaf" class="form-control" >
                                     <option value="CRM Norte">CRM Norte </option>
                                    <option value="CRM Centro Norte">CRM Centro Norte</option>
                                     <option value="CRM Metropolitano">CRM Metropolitano</option>
                                    <option value="CRM Centro Sur" >CRM Centro Sur</option>
                                    <option value="CRM Sur" >CRM Sur</option>
                                    <option value="CRM Austral" >CRM Austral</option>
                                    <option value="Infraestructura" >Infraestructura</option>
                                   <!--  <option value="CRM Metropolitano" >CRM Metropolitano</option>  -->
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4 col-form-label">Problemas:</label>
                            <div class="input-group col-xs-8">
                                <!-- <input type="text"  type="text" name="proble" id="proble"  class="form-control" /> -->
                                <textarea class="form-control"cols="60" rows="2" id="proble"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                        <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4">Persona Responsable</label>
                            <div class="input-group col-xs-8">
                               <select id="nombrefinal" name="responsable" class="form-control">
                               <!--   <option value="Rodrigo Sances">Rodrigo Sances </option>
                                <option value="Bernardo Monardez">Bernardo Monardez</option>
                                <option value="Eduard Martinez">Eduard Martinez </option>
                                <option value="Mauricio Camacho">Mauricio Camacho </option>
                                <option value="Gerardo Gonzalez">Gerardo Gonzalez </option>
                                <option value="Patricio Rojas">Patricio Rojas </option>
                                <option value="Néstor Videla">Néstor Videla </option>
                                <option value="Daniel Sepúlveda">Daniel Sepúlveda </option>
                                <option value="Marco Ojeda">Marco Ojeda </option>
                                <option value="Marcial Muñoz">Marcial Muñoz</option>
                                <option value="Jaime Vásquez">Jaime Vásquez</option>
                                <option value="Luis Leal">Luis Leal</option>
                                <option value="Andrés Cerda">Andrés Cerda</option>
                                <option value="Domingo Silva">Domingo Silva</option>
                                <option value="Wildo Gallardo ">Wildo Gallardo </option>
                                <option value="Rodolfo Silva">Rodolfo Silva</option>
                                <option value="Omar Lagos">Omar Lagos</option>
                                <option value="Andrés González">Andrés González</option>
                                <option value="Sergio Contreras">Sergio Contreras</option>
                                <option value="Manuel Almonacid">Manuel Almonacid</option>
                                <option value="Manuel Jeria">Manuel Jeria</option>
 -->
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 sinpadding">
                            <label class="col-xs-4">Estado  </label>
                            <div class="input-group col-xs-8">
                                <select id="estados" name="estados" class="form-control">
                                   <!--  <option>Nuevo</option> -->
                                  <!--  <option>Seleccione una Opcion</option> -->
                                    <option>En progreso</option>
                                    <option>Finalizado</option>
                                </select>
                            </div>
                    </div>

                    </div>
                <div class="form-group col-xs-12" id="relacion">
                    <div class="col-xs-12 sinpadding" id="relacion">
                        <!-- <h2 id="relacion">visitas relacionadas</h2> -->
                        <label for="relacion" class="col-form-label col-xs-2">Visitas relacionadas</label>

                       <!--  <a id="link" onclick="sitios()">+</a> -->
                        <a href="#demo" class="btn btn-info accordion" id="link" data-toggle="collapse" onclick="sitios()">+</a>
                            <div id="demo"></div>
                    </div>

                    </div>

                    <div class="form-group col-xs-12">
                         <div class="col-xs-12 sinpadding">
                            <label for="des-problema" class="col-form-label col-xs-4">Observaciones del problema:</label>
                            <textarea class="form-control col-xs-8" id="des-problema" rows="3"></textarea>
                        </div>

                    </div>
                        <div class="form-group col-xs-12">
                            <div class="col-xs-12 sinpadding">
                                <label for="solucion" class="col-form-label col-xs-4">Acciones a realizar:</label>
                                <textarea class="form-control col-xs-8" id="solucion"rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group col-xs-12" style="display:none;" id="soldos">
                            <div class="col-xs-12 sinpadding">
                                <label for="solucionDos" class="col-form-label col-xs-4">Solución Implementada:</label>
                                <textarea class="form-control col-xs-8" id="solucionDos"rows="3"></textarea>
                            </div>
                        </div>


                </form>
                </div>
                <button type="button" class="btn btn-info" onclick=" $('#myModal2').modal('hide'); $('#myModal').modal('show');">
                <span class="glyphicon glyphicon-step-backward"></span>Volver</button>
            </div>
            <div class="modal-footer">
            <div id="footAccion" class="show">

                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="modEditar();">Actualizar</button>
                  <!--   <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="eliminarDatos();">eliminar</button> -->

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
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><center>Detalle de Sitios</center></h4>
            </div>
            <div class="modal-body" id="contenedor_estadoDos" style=" overflow:auto;">
            <input type="button" value="Exportar"  class="btn btn-success pull-right" onclick="Exporta(); "style="margin-bottom:4px; margin-left: 4px !important; padding:10px;"/>
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
        $(document).ready(function() {
            //console.log(personar);
            //$("#soldos").css("display", "none");
           // area($('#areaf').val());
           
        });

        var personar =  $('#personarespon').val();
        id_registroGlobal = 0;
        //detecta el evento change, cuando un elemento cambia
        // callback funcion dentro de una función
        $('#areaf').change(function(){
            area($('#areaf').val());
           // persona($('#$personarespon').val()); // estoy llamando al selector por el valor seleccionado
        });


        $('#personarespon').change(function(){
            area($('#personarespon').val());
        });
        //var solucionDos = $("#solucionDos").val();
        $('#estados').change(function(){
            var estados = $('#estados').val();
           // alert('hola soy el change');
            $("#soldos").css("display", "block");
            if (estados == 'En progreso'){
                $("#soldos").css("display", "none");
            }else{
                $("#soldos").css("display", "block");
            }


        });

         $('#myModal2').on('shown.bs.modal', function (e) {
           // esta funcion es como un reset en lo q entra nuevamente 
           $('#estados').val($('#estados > option:first').val());

           $(".collapse").collapse('hide');
            area($('#areaf').val());
            $("#soldos").css("display", "none");
          
        });
        function area(areaf){
            $.ajax({
                "url":"./visita_integral/area.php",
                type:'POST',
                data:{
                // datos id es el post :id es el parametro de la function
                area:areaf
                }
                }).done(function(resp){
                $('#personarespon').html(resp);
                //replaceWith
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

      function abrirModal(zona,pregunta,custom, preguntaFinal,nombrefinal,areaf) {

          $('#myModal').modal('show');

          $.ajax({
        "url":"./visita_integral/detalle.php",
        type:'POST',
        data:{
            zona:zona,
            pregunta:pregunta,
            custom:custom,
            preguntaFinal:preguntaFinal,
            nombrefinal:nombrefinal,
            areaf:areaf
        }
        }).done(function(resp){
          $('#listar_detalle').html(resp);
        })
        }

        function abrirModalajax(sitio_modal, id_registro, obsTec,proble,areaf,nombrefinal,desproblema,solucion){
          //alert(areaf);
          sitio=$('#myModal2').modal('show');
          $('#myModal').modal('hide');
          $('#myModalDeta').modal('hide');
          //document.getElementById("sitio").innerHTML = sitio_modal;
          document.getElementById("sitio_final").value = sitio_modal;
          document.getElementById("obsTec").innerHTML = obsTec;
          document.getElementById("proble").innerHTML = proble;
          document.getElementById("areaf").value = areaf;
          document.getElementById("nombrefinal").value = nombrefinal;
          document.getElementById("des-problema").value = desproblema;
          document.getElementById("solucion").value = solucion;

          id_registroGlobal = id_registro;

          var sitio = $('#sitio').val();
          let cadena = "sitio" + sitio;
          //console.log(cadena);

        }
                function abrirDetalle(zona,nombrefinal,preguntaFinal,areaf) {

                $('#myModalDeta').modal('show');
                $('#myModal').modal('show');

                $.ajax({
                "url":"./visita_integral/ajax.php",
                type:'POST',
                data:{

                  zona:zona,
                  nombrefinal:nombrefinal,
                  preguntaFinal:preguntaFinal,
                  areaf:areaf
                }
                }).done(function(resp){
                  $('#listar_detalleDos').html(resp);

                })


              }

              function Export(zona,pregunta,custom){
                        alert(zona,pregunta,custom);
                         $.post('./visita_integral/detalle.php', {
                        "zona": zona,
                        "pregunta":pregunta,
                        "custom":custom

                        });

                            location.href = './visita_integral/detalle.php'
              }
              function Exporta(zona){
                alert(zona);
                $.post('./visita_integral/ajax.php', {
                        "zona": zona});

                location.href = './visita_integral/ajax.php'
              }
        function sitios(){
            //alert('hola');
         
           var sitio_m = $("#sitio_final").val();
           var proble = $("#proble").val();
           var nombrefinal = $("#nombrefinal").val();
           //valor del registro
           $(' #sitio_final').trigger('change');
           //$('arearespon, #tipoproblema, #personarespon').trigger('change');
            $.ajax({
                "url":"./visita_integral/sitios.php",
                type:'POST',
                data:{
                    sitio_m:sitio_m,
                    proble:proble,
                    nombrefinal:nombrefinal,
                    id:id_registroGlobal
                }}).done(function(resp){
                  $('#demo').html(resp);
                })

        }


          function modEditar(){

            $('#myModal2').modal('hide');
            var desProblema = $("#des-problema").val();
            //recoger el texto que ingreso la persona en el elemento
            var personarespon = $('#personarespon').val();
            var estados = $('#estados').val();
            var areaf = $('#areaf').val();
            var solucion = $('#solucion').val();
            $.ajax({
                "url":"./visita_integral/actualiza.php",
                type:'POST',
                data:{
                // datos id es el post :id es el parametro de la function (tomo el post y el id global que asigne )
                id:id_registroGlobal,
                desProblema:desProblema,
                personarespon:personarespon,
                estados:estados,
                areaf:areaf,
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
                console.log('success');
                console.log(resp);
                }) ;
          }
          function eliminarDatos(id){
            $.ajax({
                "url":"./visita_integral/elimina.php",
                type:'POST',
                data:{
                // datos id es el post :id es el parametro de la function
                id:id_registroGlobal

                }
                }).done(function(resp){
                console.log('done');
                }).error(function(a,b,c){
                console.log(a);
                console.log(b);
                console.log(c);
                }).success(function(resp){
                    alert('registro eliminado');
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
                    type: 'pie',

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

                        ],
                        events: {

                    click: function (e) {
                    alert('hola');
                    $('#myModal').modal('show');
                        }}


                }]
                });

    
    </script>
</body>
<?php
        function GetDatitos($zona,$hostGeret,$userGeret,$passGeret,$Aden)
        {

        $cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,$Aden);
//estado <> finalizado para que se vean los cambios de la cantidad.
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
            //
           if($value['pregunta'] == "Sitio Vandalizado?" ){
            $var_textos_pregunta .= " <p> &#8226; Vandalizado  </p> ";
           }elseif($value['pregunta'] == "Funcionamiento de Clima (Equipo y Ventiladores)"){
            $var_textos_pregunta .= " <p> &#8226; Clima </p> ";
           }elseif($value['pregunta'] == "Limpieza y Sanitizado(Desmalezado, Basura, Desratizado)"){
            $var_textos_pregunta .= " <p> &#8226; Limpieza </p> ";
           }elseif($value['pregunta'] == "Alarmas en Equipos (Energía, RAN y TX)"){
            $var_textos_pregunta .= "<p>  &#8226; Alarma </p> ";
           }elseif($value['pregunta'] == "Estado GG (Alarmas, nivel de combustible)"){
            $var_textos_pregunta .= " <p> &#8226; GGEE </p> ";
           }elseif($value['pregunta'] == "Se observan conexiones Irregulares de Electricidad?"){
            $var_textos_pregunta .= " <p> &#8226;I. Eléctricas </p> ";
           }elseif($value['pregunta'] == "Se observa el uso indebido de las instalaciones físicas?"){
            $var_textos_pregunta .= " <p> &#8226;I. Físicas </p> ";
           }elseif($value['pregunta'] == "Se observan problemas estructurales en la torre?"){
            $var_textos_pregunta .= "<p> &#8226;I. Torre </p> ";
           }

           else{
            $var_textos_pregunta .= "" . $value['pregunta']."<br> &nbsp; \r ";
           }
            $texto_pregunta = strip_tags($var_textos_pregunta);
            $texto_pregunta = str_replace("\r", '', $texto_pregunta);

            //print_r(array_values($myArray));


              //  echo 'Se ha cambiado el termino "'.$resultSearch.'" en la posición '.$buscar;
            }


            /*  if(strlen($valor) > 0) $cantidad = $arrayDevuelto[$cont]["CANTIDAD"];
                                    $cont++; */


             //echo $row[2]['pregunta'];

            // echo $value['pregunta'];
        // die();
        $myArray['PreguntasFinal'] = $texto_pregunta;

         //
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

         $var_area = '';

         foreach ($arreglotres as $key => $value) {
           $var_area .=   $value['AREA'];
         }
         //echo "<pre>"; print_r($var_textos_pregunta); echo "</pre>";
        // die();
        $arreglotres['AREAS'] = $var_area;
        $arreglotres['NOMBRES'] = utf8_decode(utf8_encode(utf8_encode($var_nombre)));
        //mysqli_real_escape_string($cnn,utf8_decode($arreglotres));



         return $arreglotres;




    }


            ?>


</html>
