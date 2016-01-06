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
                        <div><?php //echo $info[3]; ?></div>-->
                    </div>
                    <div class="IF" id="HS">
                    	Hora de Sistema: 
                        <div><?php echo $info[4]; ?></div>
                    </div>
                </div>
            </div>
            <div class="CS" id="COT">
            	
                <div class="PGO MC" style=" margin-left: 16%; width:850px">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/<?php echo $pg; ?>.png">
                        <div id="TTTXT">Personal</div>
                        <div id="BTRGRS">
                            <a href="../inicio.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                        <input id="button" class="sbt" type="button" value="Agregar Personal"><br><br>
                            <div class="IPTMDF" style="display:none">
                              <label for="textfield">Cedula de Identidad:</label><br>
                              <select name="Nac" class="CDTL" style="width:60px;">
                                <option value="V">V</option>
                                <option value="E">E</option>
                              </select>
                              <input class="NMTL" type="text" required name="numCi" id="textfield"><br>
                              <label for="textfield2">Nombre:</label>
                              <input name="nombresPersonal" type="text" required class="IPTxT" id="textfield2">
                              <label for="textfield3">Apellido:</label>
                              <input class="IPTxT" type="text" required name="apellidosPersonal" id="textfield3">
                              <label for="select">Cargo:</label><br>
                              <select name="idCargoPersona" id="select">
                              <?php while($array = mysqli_fetch_array($dtCargo)){
								  	if($array['idCargoPersonal'] != 4){
										if(verifCargo($array['idCargoPersonal']) != 1){
								  ?>
                                  <option value="<?php echo $array['idCargoPersonal']; ?>">
									<?php echo $array['cargoPersonal']; ?></option>
                              <?php } }else{?>
							 	 <option value="<?php echo $array['idCargoPersonal']; ?>">
									<?php echo $array['cargoPersonal']; ?></option>
							  <?php }} ?>
                              </select><br><br>
<input name="S1OP6Reg" type="submit" class="sbt" id="S1OP2Reg" value="Guardar"> 
<input name="Cancelar" type="reset" class=" BTMDF sbt" id="Cancelar">
                            </div>
                        </form><br>
                           <div class="titleTable">Listado del personal</div>
                        <div class="tableMost">
                            <div class="rows header">
                                <div class="column" style="width:3%">Nª</div>
                                <div class="column" style="width:30%">Cargo</div>
                                <div class="column" style="width:12%">Cedula</div>
                                <div class="column" style="width:33%">Nombre y Apellido</div>
                                <div class="column" style="width:10%">Aciones</div>
                            </div>
                            <?php $n=1;
								while($array = mysqli_fetch_array($dtPernl)){
							?>
                            <div class="rows ">
                              <div class="column" style="width:3%"><?php echo $n; ?></div>
                              <div class="column" style="width:30%">
                           	  <?php  $cargo=idtfCargo($array['idCargoPersona']); 
							  		echo $cargo['cargoPersonal']
							  ?></div>
                              <div class="column" style="width:12%">
                           	  <?php echo $array['ciPersonal']; ?></div>
                              <div class="column" style="width:33%">
                           	  <?php echo $array['apellidosPersonal'].' '.$array['nombresPersonal']; ?></div>
                                <div class="column" style="width:10%">
                                  <a href="S1OP6MDF.php?idPers=<?php echo $array['ciPersonal']; ?>">
                                    	Modificar</a>
                                  </div>
                            </div>
                           <?php $n++;}?>
                      </div>                     
               	  </div>
                </div>
                
            </div>	
    </body>
</html>
