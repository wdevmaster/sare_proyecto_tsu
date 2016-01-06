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
            	
                <div class="PGO MC" style=" margin-left: 22%; width: 650px;">
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
                                <label for="textfield" style="font-weight:800;">Cedula de Identidad:</label>
                                    <samp><?php echo $datEst['ciEstudiante']; ?></samp><br>
                                <input name="ciEstudiante" type="hidden" id="ciEstudiante" 
                                        value="<?php echo $datEst['ciEstudiante']; ?>">
                                <label for="textfield" style="font-weight:800;">Apellidos: </label>
                                    <samp><?php echo $datEst['apellidosEst']; ?></samp><br>
                                <label for="textfield" style="font-weight:800;">Nombres: </label>
                                    <samp><?php echo $datEst['nombresEst']; ?></samp><br>
                                <label for="textfield" style="font-weight:800;">Sexo:</label>
                                    <samp><?php sex($datEst['sexoEst']); ?></samp><br>
                                <label for="textfield" style="font-weight:800;">Fecha de  Nacimiento:</label>
                                    <samp><?php echo fech($datEst['fechNacimientoEst']); ?></samp><br>
                                <label for="textfield" style="font-weight:800;">Lugar de Nacimiento:</label>
                                    <samp><?php echo $datEst['lugarNacimientoEst']; ?></samp><br>
                                <label for="textfield" style="font-weight:800;">Entidad Federal:</label>
                                    <samp><?php echo  EntFed($datEst['idEntidaFederal']); ?></samp><br>
                                <label for="textfield" style="font-weight:800;">Grado:</label>
                                    <samp><?php grad($_GET['idGrad']); ?> AÑO</samp><br>
                                <label for="textfield" style="font-weight:800;">Seccion:</label>
                                    <samp><?php seccn($_GET['idSecc']); ?></samp><br>
                                <label for="textfield" style="font-weight:800;">Escolaridad:</label>
                                    <samp><?php esclrdd($_GET['idEscoldd']); ?></samp><br>
                            </div>
                            <?php if($_GET['idEscoldd']==2){ ?>
                            <div>
                            	<div style="overflow:hidden;"><br>
                                	<p>SELECIONE LAS MATERIAS A REPETIR</p>
									<?php while($array=mysqli_fetch_array($dtPEA[1])){ 
                                        $infoAsign=queryTbAsign($array['idAsignatura']);?>
                                    <div style="width: 250px; display: inline-block; padding: 3px 0px;">
                                        <label>
                                        <input type="checkbox" name="<?php echo 'A'.$n; ?>" 
                                        value="<?php echo $array['idAsignatura']; ?>">
                                        <?php echo $infoAsign['nombreAsignatura']; ?>
                                        </label>
                                    </div>
                                    <?php
                                        if($j != 4){$j++;}else{$j=1; echo'<br>';}
                                     $n++;}?>
  								</div>
                                <input name="S2OP1RSR" type="submit" class="sbt" id="S2OP1RSR" value="Guardar"> 
								<input name="Cancelar" type="reset" class=" BTMDF sbt" id="Cancelar">
                            </div>
                            <?php }else{ if($_GET['idEscoldd']==3){?>
                            <div>
                            	<div id="RMPDI">
                                    <label for="textfield" style="font-weight:800;">Asignaturas:</label>
                                    <div>
                                    <select name="MP1" id="MP1">
                                     	<option value="0">Selecione</option>
                                     	<?php foreach($listAsign as $valeu){echo $valeu;} ?>
                                    </select><br><br>
                                    <select name="MP2" id="MP2">
                                     	<option value="0">Selecione</option>
                                    	<?php foreach($listAsign as $valeu){echo $valeu;} ?>
                                    </select></div>
								</div>
                            	<input name="S2OP1RSMP" type="submit" class="sbt" id="S2OP1RSMP" value="Guardar">
                                <script>
                                	$("#S2OP1RSMP").on("click",function(){
										var MP1 = $("#MP1").val();
										var MP2 = $("#MP2").val();
										
										if(MP1 == 0 || MP2 == 0){
											event.preventDefault();
											
											
											if(MP1 == 0){$("#MP1").css("border-color","#FF0004");}
											else{$("#MP1").css("border-color","rgb(204, 216, 219)");}
											
											if(MP2 == 0){$("#MP2").css("border-color","#FF0004");}
											else{$("#MP2").css("border-color","rgb(204, 216, 219)");}
											
											alert('Por favor Selecione las dos materias');
										}
										
									});
                                </script>
								<input name="Cancelar" type="reset" class=" BTMDF sbt" id="Cancelar">
                            </div>
                            <?php }}?>
                            
                        </form>
                  </div>
                </div>
                
            </div>	
    </body>
</html>
