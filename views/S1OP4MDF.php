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
            	
                <div class="PGO MC" style=" margin-left: 30%;">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/S1OP3.png">
                        <div id="TTTXT">Modificar Asignaturas</div>
                        <div id="BTRGRS">
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                       	  <p>
                       	    <label for="textfield">Cod:</label>
                       	    <input name="nombreAbreviadoAsignatura" type="text" required class="IPTxT" pattern="[A-Za-z]{2}" 
                            value="<?php echo $dtAsig['nombreAbreviadoAsignatura']; ?>">
                   	      </p><br>
                       	  <p>
                       	    <label for="textfield2">Asignatura:</label>
                       	    <input name="nombreAsignatura" type="text" required class="IPTxT"
                            value="<?php echo $dtAsig['nombreAsignatura']; ?>">
                   	      </p><br>
                       	  <p>
                       	    <label for="textfield3">Educ. Trabajo:</label>
                            <?php if ($dtAsig['educT']==0)
								{ $value = 0; $opcion ='No';  $value2 = 1; $opcion2 ='Si';}else
								{ $value = 1; $opcion ='Si';  $value2 = 0; $opcion2 ='No';} ?>
                            <select name="educT">
                              <option value="<?php echo $value; ?>"><?php echo $opcion; ?></option>
                              <option value="<?php echo $value2; ?>"><?php echo $opcion2; ?></option>
                            </select>
                          </p><br>
                          	<input name="S1OP4Mof" type="submit" class="sbt" value="Guardar">
							<input id="cancel" class="sbt" type="button" value="Cancelar"> 
                        </form>
               	  </div>
                </div>
                
            </div>	
    </body>
</html>