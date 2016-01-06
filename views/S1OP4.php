<?php require_once("../protected/controlUnit.php"); ?>
<!doctype html>
<html>
	<head>
    	<link rel="stylesheet" type="text/css" href="../css/Styles.css">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title>
    </head>
    <body>
            <div id="HE">
                <div id="CHE" class="CS">
                    <div id="LGYOPS">
                    	<div><img src="../img/BL.png"></div>
                        <div id="BRROPS">
                            <table border="0"><tbody><tr>
                            <!--
                            <td valign="middle">
                                <img id="IMOINI" src="img/BL-1.png"/>
                            </td>
                            -->
                            <td width="22px">&nbsp;</td>
                            <td>
                                <img id="IMOPAY" src="../img/BL-2.png"/>
                            </td>
                            <td width="22px">&nbsp;</td>
                            <td>
                                <img id="IMOSAL" src="../img/BL-3.png" onclick="location.href='../salir.php';"/>
                            </td></tr></tbody></table>
                        </div>
                    </div>
                    <div id="NUSER">
                    	<div><img src="../img/05.png"><?php echo $nameUsu; ?></div>
                    </div>
                </div>
            </div>
            <div id="SE">
            	<div class="CS" id="CTS">
                    <div class="IF" id="PLT">
                    	Plantel: 
                        <div><?php echo $info[1]; ?></div>
                    </div>
                    <div class="IF" id="ANES">
                    	Año Escolar: 
                        <div><?php echo $info[2];?></div>
                    </div>
                    <div class="IF" id="LPS">
                    	<!--Lapso: 
                        <div><?php// echo $info[3]; ?></div>-->
                    </div>
                    <div class="IF" id="HS">
                    	Hora de Sistema: 
                        <div><?php echo $info[4]; ?></div>
                    </div>
                </div>
            </div>
            <div class="CS" id="COT">
            	
                <div class="PGO MC" style=" margin-left: 19%; width:800px;">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/<?php echo $pg; ?>.png">
                        <div id="TTTXT">Asignaturas</div>
                        <div id="BTRGRS">
                            <a href="../inicio.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                           <div class="titleTable">Listado de Asignatura</div>
                        <div class="tableMost" style=" width:100%">
                            <div class="rows header">
                                <div class="column" style="width:5%">Nª</div>
                                <div class="column" style="width:7%">Cod.</div>
                                <div class="column" style="width:50%">Asignatura</div>
                                <div class="column" style="width:15%">Educ.Trabajo</div>
                                <div class="column" style="width:10%">Aciones</div>
                            </div>
                            <?php 
							$n = 1;
							while($array = mysqli_fetch_array($Asig)) {?>
                          <div class="rows">
                                <div class="column" style="width:5%">
									<?php echo $n; ?></div>
                                <div class="column" style="width:7%">
									<?php echo $array['nombreAbreviadoAsignatura']; ?></div>
                            	<div class="column" style="width:50%">
									<?php echo $array['nombreAsignatura']; ?></div>
                                <div class="column" style="width:15%" align="center">
                                	<?php if($array['educT']== 0){ echo 'No';}else{ echo 'Si';} ?></div>
                                <div class="column" style="width:10%">
                                    <a href="S1OP4MDF.php?idAsg=<?php echo $array['idAsignatura']; ?>">
                                        Modificar</a></div>
                            </div>
                            <?php $n++;}?>
                        </div>                     
               	  </div>
                </div>
                
            </div>	
    </body>
</html>
