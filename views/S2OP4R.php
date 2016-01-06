<?php require_once("../protected/controlUnit.php"); ?>
<!doctype html>
<html>
	<head>
    	<link rel="stylesheet" type="text/css" href="../css/Styles.css">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title>
        <style type="text/css">
			.Table{display: table;}
			.Table > div{ font-family:Arial}
			.Title{display: table-caption;text-align: center;font-weight: bold;font-size: larger;}
			.Heading{display: table-row;font-weight: bold;text-align: left;}
			.Heading > div {font-weight: bold;}
			.Row{display: table-row;}
			.Cell{display: table-cell;border: solid;border-width: thin; padding: 2px 5px; text-align:left;}
		</style>
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
            	
                <div class="PGO MC" style=" margin-left: 4%;">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/S2OP4.png">
                        <div id="TTTXT">Registro de Inasistenacias</div>
                        <div id="BTRGRS">
                            <a href="../views/S2OP4.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                            <div>Lista de Calificaciones</div>
                            <div class="Table" style="border:none;">   
                              <div class="Heading" style="border:none;">
                                    <div class="Cell" style="border:none; font-style:italic; width: 100px;">
                                    	Año Escolar:</div>
                                    <div class="Cell" style="border:none; font-style:italic; width: 230px;">
                                    	Grado o Año:</div>
                                    <div class="Cell" style="border:none; font-style:italic; width: 55px;">
                                    	Sección:</div>
                                    <div class="Cell" style="border:none; font-style:italic; width: 150px;">
                                    	Mención:</div>
                                    <div class="Cell" style="border:none; font-style:italic;">
                                    	Cód/Plan:</div>
                                    <div class="Cell" style="border:none; font-style:italic;">
                                    	Lapso:</div>
                                </div>
                              <div class="Row" style="border:none;">
                                    <div class="Cell" style="border:none;">
										<?php anoEsc($ae['idAnoEscolar']);?></div>
                                    <div class="Cell" style="border:none;">
										<?php grad($_GET['idGrad']); 
										echo' AÑO DE '; mencPlan($_GET['idGrad']);?></div>
                                    <div class="Cell" style="border:none; text-align:center">
										<?php seccn($_GET['idSecc']);?></div>
                                    <div class="Cell" style="border:none;">
										<?php mencPlan($_GET['idGrad']);?></div>
                                    <div class="Cell" style="border:none;">
										<?php codPlan($_GET['idGrad']);?></div>
                                    <div class="Cell" style="border:none;">
										<?php laps($_GET['idLaps']);?></div>
                                </div>
                            </div>
                            <div class="Table">
                              <div class="Heading">
                                    <div class="Cell">Nª</div>
                                    <div class="Cell" style="width: 100px; border-left:none">Cédula</div>
                                    <div class="Cell" style="width: 250px; border-left:none">Identificación</div>
                                    <?php for($i=1; $i != $rowsA[0]; $i++){
											$dtAsign=queryTbAsign($rowsA[$i]); ?>
                                    <div style="text-align:center; border-left:none " class="Cell" 
                                         title="<?php echo $dtAsign['nombreAsignatura']; ?>">
                                        <?php echo $dtAsign['nombreAbreviadoAsignatura']; ?>
                                    </div>
                                    <?php }?>
                                </div>
                              <?php while($dtM = mysqli_fetch_array($Matricl)){ 
							  			  $dtEst=tbArray(consultEstud($dtM['ciEstudiante']));	
							  ?>
                              <div class="Row">
                                    <div class="Cell" style="border-top:none;">
										<?php echo $n; ?></div>
                                    <div class="Cell" style="border-left:none; border-top:none;">
										<?php echo $dtM['ciEstudiante'];?>
                                        <input name="Est<?php echo $n;?>" type="hidden" 
                    	  				 value="<?php echo $dtM['ciEstudiante']?>" >
                                        </div>
                                    <div class="Cell" style="border-left:none; border-top:none; width:30px;">
                                    	<?php echo $dtEst['apellidosEst'].', '. $dtEst['nombresEst']?></div>
                                    <?php for($i=1; $i != $rowsA[0]; $i++){
										$query=cursAsig($ae['idAnoEscolar'],$dtM['ciEstudiante'],$rowsA[$i]);
										$array =mysqli_fetch_array($query);
									?>
                                    <div class="Cell" style="border-left:none; 
                                    border-top:none; text-align:center">
                                    	<?php if($array['id'] != ''){ ?>
                                    	<input name="<?php echo $array['id']; ?>" type="text" class="not" 
                                        value="<?php 
											if($array[$lapss] !=''){echo $array[$lapss];}else{echo'';}
										?>">
                                        <?php }else{?>
                                        <samp title="NO CURSA">NC</samp>
                                        <?php }?>
                                    </div>
                                    <?php }?>
                              </div>
                              <?php $n++;}?>
                            </div>
                            <div><br>
                            	<input name="idLaps" type="hidden" value="<?php echo $_GET['idLaps'];?>" >
                            	<input name="nEst" type="hidden" value="<?php echo $n;?>" >
                            	<input name="S2OP4Rreg" type="submit" 
                          class="BTMDF sbt " value="Guardar">
 
                          </div>
  					</form>
               	  </div>
                </div>
                
            </div>	
    </body>
</html>
