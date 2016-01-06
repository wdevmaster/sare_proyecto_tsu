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
            	
                <div class="PGO MC" style=" margin-left: 23%; width: 600px;">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/<?php echo $pg; ?>.png">
                        <div id="TTTXT">Datos Plantel</div>
                        <div id="BTRGRS">
                            <a href="../inicio.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                        <input id="button" class="sbt" type="button" value="Modificar"><br>
                        <br class="TXTCTs">
                        <input name="idDt" type="hidden" id="idDt" value="<?php echo $dtPlantel['codigoDEA']?>">
                       	  <p>
                       	    <label for="textfield">Cod. DEA:</label>
                            <samp class="TXTCTs"><?php echo $dtPlantel['codigoDEA']?></samp>
                       	    <input class="IPTMDF IPTxT" name="codigoDEA" type="text" 
                            	   value="<?php echo $dtPlantel['codigoDEA']?>">
                   	      </p><br>
                       	  <p>
                       	    <label for="textfield2">Nombre:</label>
                            <samp class="TXTCTs"><?php echo $dtPlantel['nombrePlant']?></samp>
                       	    <input class="IPTMDF IPTxT" name="nombrePlant" type="text" 
                            	   value="<?php echo $dtPlantel['nombrePlant']?>">
                       	  </p><br>
                       	  <p>
                       	    <label for="textfield3">Dtt.Esc:</label>
                            <samp class="TXTCTs"><?php echo $dtPlantel['distritoEscolarPlant']?></samp>
                       	    <input class="IPTMDF IPTxT" name="distritoEscolarPlant" type="text" 
                            	   value="<?php echo $dtPlantel['distritoEscolarPlant']?>">
                       	  </p><br>
                       	  <p>
                       	    <label for="textfield4">Dirección:</label>
                            <samp class="TXTCTs"><?php echo $dtPlantel['direccPlantel']?></samp>
                       	    <input class="IPTMDF IPTxT" name="direccPlantel" type="text" 
                            	   value="<?php echo $dtPlantel['direccPlantel']?>">
                       	  </p><br>
                       	  <p>
                       	    <label for="textfield5">Telefono:</label>
                            <samp class="TXTCTs"><?php echo $NTelf?></samp>
                           	
                            <select class="CDTL IPTMDF IPTxT" name="codTelf">
                              <option value="<?php echo $NumTelf['cod']; ?>">
						  	  <?php echo $NumTelf['cod']; ?></option>
                              <?php for($i=1; $i != 7; $i++){ 
							  	if($NumTelf['cod'] != $codTelf[$i]){
							  ?>
							  <option value="<?php echo $codTelf[$i]; ?>"><?php echo $codTelf[$i]; ?></option>
							 <?php  }}?>
                            </select>
                            <input name="numTelf" type="text" class="NMTL IPTMDF IPTxT" id="numTelf" value="<?php echo $NumTelf['num']; ?>"> 
                       	  </p><br>
                       	  <p>
                       	    <label for="textfield6">Municipio:</label>
                            <samp class="TXTCTs"><?php echo $dtPlantel['municipioPlant']?></samp>
                       	    <input class="IPTMDF IPTxT IPTxT" name="municipioPlant" type="text" 
                            	   value="<?php echo $dtPlantel['municipioPlant']?>">
                       	  </p><br>
                       	  <p>
                       	    <label for="textfield7">Ent. Federal:</label>
                            <samp class="TXTCTs">
							<?php echo $iddtEntFed['entidadFederal']; ?></samp>
                       	    <select class="IPTMDF IPTxT" name="idEntidaFederal">
                            	<option value="<?php echo $idEF;?>">
                                <?php echo $iddtEntFed['entidadFederal'];?></option>
                            	<?php 
								while($SelectEF = mysqli_fetch_array($dtEntFed)){
									if($SelectEF['idEntidadFederal'] != $idEF){
								?>	
                       	      	<option value="<?php echo $SelectEF['idEntidadFederal'];?>">
									<?php echo $SelectEF['entidadFederal'];?></option>
                              	<?php }
								} ?>
                       	    </select>
                       	  </p><br>
                       	  <p>
                       	    <label for="textfield8">Zona Educativa:</label>
                            <samp class="TXTCTs"><?php echo $dtPlantel['zonaEducativaPlant']?></samp>
                       	    <input class="IPTMDF IPTxT" name="zonaEducativaPlant" type="text" 
                            	   value="<?php echo $dtPlantel['zonaEducativaPlant']?>">
                       	  </p><br><br>
                          <input name="S1OP1Modf" type="submit" 
                          class="BTMDF sbt IPTMDF" id="S1OP1Modf" value="Guardar">
                          <input class="BTMDF sbt IPTMDF" type="button" value="Cancelar">
                    	</form>
                  </div>
                </div>
                
            </div>	
    </body>
</html>
