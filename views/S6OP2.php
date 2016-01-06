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
            	
                <div class="PGO MC" style=" margin-left: 24%; width:700px;">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/<?php echo $pg; ?>.png">
                        <div id="TTTXT">Usuarios del Sistema</div>
                        <div id="BTRGRS">
                            <a href="../inicio.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                        <?php if(isset($_GET['idUsMdf']) or isset($_GET['idUsElm'])){?>
						<?php if(isset($_GET['idUsMdf'])){?>
                        	Modificar Registro<br>
                          <div class="tableMost" >
                                <div class="rows">
                                    <div class="column" style="width:125px">Nombre de Usuario:</div>
                                    <div class="column" style="width:125px; margin-left: 15px;">
                                    	<?php echo $dtUs['nUsuario']; ?>
                                  </div>
                                </div>
                                <div class="rows">
                                    <div class="column" style="width:125px">Contraseña</div>
                                </div>
                                <hr>
                            <div class="rows">
                                    <div class="column" style="width:130px">Actual:</div>
                                    <div class="column" style="width:125px">
                                  <input class="IPTxT" name="cActl" type="password" id="cActl"></div>
                                </div>
                                <div class="rows">
                                    <div class="column" style="width:130px">Nueva:</div>
                                    <div class="column" style="width:125px">
                                    <input class="IPTxT" name="cNuev" type="password"></div>
                                </div>
                                <div class="rows">
                                    <div class="column" style="width:130px">
                                    	Vuelve a escribir <br>la contraseña nueva:</div>
                                    <div class="column" style="width:125px">
                                    <input class="IPTxT" name="cVerf" type="password"></div>
                                </div>
                            </div>
                        	<input name="S6OP2modif" type="submit" class="sbt" id="S6OP2modif" value="Guardar">
                            <input name="rCancl" type="submit" class="sbt" id="rCancl" value="Cancelar">
						<?php }?>
                        
                        <?php if(isset($_GET['idUsElm'])){?>
                        Desear Eliminar Registro del siguiente Usuario<br>
                        <div class="tableMost" >
                                <div class="rows">
                                    <div class="column" style="width:125px">Nombre de Usuario:</div>
                                    <div class="column" style="width:125px; margin-left: 15px;">
                                    	<?php echo $dtUs['nUsuario']; ?>
                                  </div>
                                </div>
                        </div>
                        <input name="S6OP2elim" type="submit" class="sbt" id="S6OP2modif" value="Eliminar">
                        <input name="rCancl" type="submit" class="sbt" id="rCancl" value="Cancelar">
                        <?php }?>
                        	
						<?php }else{ ?>
                        	<input id="button" class="sbt" type="button" value="Nuevo Uusuario"><br><br>
                            <div class="IPTMDF" style="display:none">
							<div class="titleTable">Nuevo Usuario</div><br>
                            	<div class="tableMost" >
                                <div class="rows">
                                    <div class="column" style="width:130px">Nombre de Usuario:</div>
                                    <div class="column" style="width:125px;">
                                    <input name="nUsu" class="IPTxT" type="text">
                                  </div>
                                </div>
                                <div class="rows">
                                    <div class="column" style="width:130px">Contraseña:</div>
                                    <div class="column" style="width:125px">
                                    <input class="IPTxT" name="cUse" type="password"></div>
                                </div>
                                <div class="rows">
                                    <div class="column" style="width:130px">
                                    	Vuelve a escribir <br>la contraseña nueva:</div>
                                    <div class="column" style="width:125px">
                                    <input class="IPTxT" name="cVerf" type="password"></div>
                                </div>
                            </div>
							<input name="S1OP2Reg" type="submit" class="sbt" id="S6OP2Reg" value="Guardar"> 
							<input name="Cancelar" type="reset" class=" BTMDF sbt" id="Cancelar">
                            <br><br>
							</div><br>
                        	<div class="titleTable">Listado de Usuarios</div>
                       	  <div class="tableMost" style="width:100%">
                                <div class="rows header">
                                	<div class="column" style="width:5%">Nº</div>
                                    <div class="column" style="width:35%">Nombre</div>
                                    <div class="column" style="width:10%">Nivel</div>
                                    <div class="column" style="width:35%; margin-left: 15px;">Aciones</div>
                                </div>
                                <?php while($aUsu = mysqli_fetch_array($listUsu)){ ?>
                            <div class="rows">
                                	<div class="column" style="width:5%"><?php echo $n; ?></div>
                                    <div class="column" style="width:35%"><?php echo $aUsu['nUsuario']; ?></div>
                                    <div class="column" style="width:10%; text-align:center">
							  <?php echo $aUsu['nvlUsuario']; ?></div>
                                    <div class="column" style="width:35%; margin-left: 15px;">
                                    	<div class="rows" >
                                            <a href="S6OP2.php?idUsMdf=<?php echo $aUsu['idusuario']; ?>">
                                            <div class="column" style=" margin-right: 20px">Modificar</div></a>
                                          <a href="S6OP2.php?idUsElm=<?php echo $aUsu['idusuario']; ?>">
                                            <div class="column" >Eliminar</div></a>
                                        </div>
                                    </div>
                                </div>
                                <?php $n++;}?>
                            </div>
                      </form>
                        <?php }?>
                  </div>
                </div>
                
            </div>	
    </body>
</html>
