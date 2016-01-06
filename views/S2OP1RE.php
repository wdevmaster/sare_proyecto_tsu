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
            	
                <div class="PGO MC" style=" margin-left: 30%; width:500;">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/S2OP1.png">
                        <div id="TTTXT">Registros de Alumnos</div>
                        <div id="BTRGRS">
                            <a href="../views/S2OP1.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                            <div>
                            	<label for="textfield">Cedula de Identidad:</label><br>
                           	  <select name="RNac" class="CDTL" style="width:60px;">
                                <?php if($_GET['Nac'] == 'V'){$op1 = 'V'; $op2 = 'E';}
									else{$op1 = 'E'; $op2 = 'V';} ?>
                                	<option value="<?php echo $op1; ?>"><?php echo $op1; ?></option>
                                	<option value="<?php echo $op2; ?>"><?php echo $op2; ?></option>
                              	</select>
                              <input name="RnumCi" type="text" required class="NMTL" id="textfield" pattern="[0-9]{8,15}" 
                              value="<?php echo $_GET['Ci']; ?>"><br>
                              <label for="textfield" style="font-weight:800;">Apellidos:</label><br>
                              <input name="apellidosEst" type="text" required class="IPTxT" pattern="[A-Za-z ]{0,45}"><br>
                              <label for="textfield" style="font-weight:800;">Nombres:</label><br>
                              <input name="nombresEst" type="text" required class="IPTxT" pattern="[A-Za-z ]{0,45}"><br>
                              <label for="textfield" style="font-weight:800;">Sexo:</label><br>
                              <select class="IPTxT" required name="sexoEst">
                              <option>Selecione</option>
                              <?php for($i= 1; $i != 3; $i++){ ?>
                                <option value="<?php echo $sex[$i]; ?>">
									<?php sex($sex[$i]);?></option>
                              <?php }?>
                              </select><br>
                              <label for="textfield" style="font-weight:800;">Fecha de  Nacimiento:</label><br>
                              <input class="IPTxT" required name="fechNacimientoEst" type="date"><br>
                              <label for="textfield" style="font-weight:800;">Lugar de Nacimiento:</label><br>
                              <input class="IPTxT" required name="lugarNacimientoEst" type="text" pattern="[A-Za-z ]+"><br>
                              <label for="textfield" style="font-weight:800;">Entidad Federal:</label><br>
                              <select class="IPTxT" required name="idEntidaFederal">
                              	 <option>Selecione</option>
                                <?php while($array = mysqli_fetch_array($EntFed)){ ?>
                                <option value="<?php echo $array['idEntidadFederal']; ?>">
									<?php echo $array['entidadFederal']; ?></option>
                                <?php } ?>
                              </select><br>
<input name="S2OP1RE" type="submit" class="sbt" id="S1OP2Reg" value="Guardar"> 
<input name="Cancelar" type="reset" class=" BTMDF sbt" id="Cancelar">
                            </div>
                        </form>
                  </div>
                </div>
                
            </div>	
    </body>
</html>
