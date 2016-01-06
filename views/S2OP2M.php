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
            	
                <div class="PGO MC" style=" margin-left: 28%; width:500px;">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/S2OP2.png">
                        <div id="TTTXT">Consulta de Alumnos</div>
                        <div id="BTRGRS">
                            <a href="S2OP2.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                        <input id="button" class="sbt" type="button" value="Modificar">
                        <br class="TXTCTs">
                        <input name="idEstud" type="hidden" id="idEstud" value="<?php echo $_GET['ci']; ?>">
                        <samp style="font-weight:800;">Informacion Personal</samp><br>
                            <label for="textfield">Cedula de Identidad:</label>
                          <samp class="TXTCTs"><?php echo $infEst['ciEst']; ?></samp><br>
                          
                          <select name="RNac" class="CDTL Modf" style="width:60px;">
								<option value="<?php echo $Ns; ?>"><?php echo $Ns; ?></option>
  								<option value="<?php echo $Nn; ?>"><?php echo $Nn; ?></option>
                          </select>
                          <input class="NMTL Modf" type="text" name="RnumCi" id="textfield"
                              	value="<?php echo $nCi; ?>"><br class="Modf">   
                                  
                            <label for="textfield">Apellidos: </label>
                          <samp class="TXTCTs"><?php echo $infEst['apeEst']; ?></samp><br>
                          <input name="apellidosEst" type="text" class="IPTMDF IPTxT" id="apellidosEst" value="<?php echo $infEst['apeEst']; ?>"> 
                            <label for="textfield">Nombres: </label>
                          <samp class="TXTCTs"><?php echo $infEst['nomEst']; ?></samp><br>
                          <input name="nombresEst" type="text" class="IPTMDF IPTxT" id="nombresEst" value="<?php echo $infEst['nomEst']; ?>"> 
                            <label for="textfield">Sexo:</label>
                          <samp class="TXTCTs"><?php sex($infEst['sexEst']); ?></samp><br>
                          <select name="sexoEst" class="IPTMDF IPTxT" id="sexoEst">
                          		<option value="<?php echo $infEst['sexEst']; ?>">
								<?php sex($infEst['sexEst']); ?></option>
                                
                          	<?php for($i= 1; $i != 3; $i++){ if($sex[$i] != $infEst['sexEst']){?>
                                <option value="<?php echo $sex[$i]; ?>">
								<?php sex($sex[$i]);?></option>
                            <?php }}?>
                          </select>
                            <label for="textfield">Fecha de  Nacimiento:</label>
                          <samp class="TXTCTs"><?php fech($infEst['fecEst']); ?></samp><br>
                          <input name="fechNacimientoEst" type="date" class="IPTMDF IPTxT" id="fechNacimientoEst" value="<?php echo $infEst['fecEst']; ?>">
                            <label for="textfield">Lugar de Nacimiento:</label>
                          <samp class="TXTCTs"><?php echo $infEst['lugEst']; ?></samp><br>
                          <input name="lugarNacimientoEst" type="text" class="IPTMDF IPTxT" id="lugarNacimientoEst" value="<?php echo $infEst['lugEst']; ?>"> 
                            <label for="textfield">Entidad Federal:</label>
                          <samp class="TXTCTs"><?php EntFed($infEst['efEst']); ?></samp><br>
                          <select name="idEntidaFederal" class="IPTMDF IPTxT" id="idEntidaFederal">
                          	<option value="<?php echo $infEst['efEst']; ?>">
							<?php EntFed($infEst['efEst']); ?></option>
                            
                          		<?php while($array = mysqli_fetch_array($EntFed)){ 
								if($array['idEntidadFederal'] !=$infEst['efEst']){?>
                                <option value="<?php echo $array['idEntidadFederal']; ?>">
								<?php echo $array['entidadFederal']; ?></option>
                                <?php }} ?>
                          </select>
                            <?php 
                            if($infEst['gradEst'] != '' and $infEst['seccEst']!='' and $infEst['esclEst']!=''){ 
                            ?>
                            <samp style="font-weight:800;">Informacion Academica</samp><br>
                            <label for="textfield">Grado:</label>
                          <samp class="TXTCTs"><?php grad($infEst['gradEst']); ?></samp><br>
                          <select name="idGrado" class="IPTMDF IPTxT" id="idGrado">
                          	<option value="<?php echo $infEst['gradEst']; ?>">
								<?php grad($infEst['gradEst']); ?></option>
                            <?php while($array = mysqli_fetch_array($grad)){ 
								if($array['idGrado'] != $infEst['gradEst']){
							?>
                            <option value="<?php echo $array['idGrado']; ?>">
								<?php echo $array['gradoLetras']; ?></option>
                            <?php  }}?>
                          </select>
                            <label for="textfield">Seccion:</label>
                          <samp class="TXTCTs"><?php seccn($infEst['seccEst']); ?></samp><br>
                          <select name="idSeccion" class="IPTMDF IPTxT" id="idSeccion">
                          	<option value="<?php echo $infEst['seccEst']; ?>">
								<?php seccn($infEst['seccEst']); ?></option>
                            <?php while($array = mysqli_fetch_array($secc)){ 
								if($array['idSeccion'] != $infEst['seccEst']){
							?>
                            <option value="<?php echo $array['idSeccion']; ?>">
								<?php echo $array['seccion']; ?></option>
                            <?php  }}?>
                          </select>
                            <label for="textfield">Escolaridad:</label>
                          <samp class="TXTCTs"><?php esclrdd($infEst['esclEst']); ?></samp><br>
                            <?php }?>
                       	  <div>
                            <input name="S2OP2Modf" type="submit" 
                          			class="BTMDF sbt IPTMDF" id="S2OP2Modf" value="Guardar">
                          		<input class="BTMDF sbt IPTMDF" type="button" value="Cancelar">
                            </div>
                        </form>
                  </div>
                </div>
                
            </div>	
    </body>
</html>
