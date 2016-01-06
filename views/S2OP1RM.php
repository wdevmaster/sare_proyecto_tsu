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
            	
                <div class="PGO MC" style=" margin-left: 26%;">
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
							<?php if($idG != 0 and $idS != 0 and $idE != 0){echo 'MODICIAR REGISTRO DEL AÑO ESOLAR  '; anoEsc($ae['idAnoEscolar']);}?>
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
                              </div>
                            	<label for="textfield" style="font-weight:800;">Grado:</label>
                                <select name="idGrado" id="idGrado" required>
                                <option value="<?php echo $idG?>">
								<?php if($idG == 0){echo 'SELECIONE';}else{grad($idG); echo ' AÑO';}?></option>
                                <?php while($aGrad = mysqli_fetch_array($listGrad)){ 
									if($aGrad['idGrado']!=$idG){
								?>
                                	<option value="<?php echo $aGrad['idGrado'];?>">
                                    	<?php  grad($aGrad['idGrado']);?> AÑO</option>
                                <?php }}?>
                                </select><br>
                                <label for="textfield" style="font-weight:800;">Seccion:</label>
                                <select name="idSeccion" id="idSeccion" required>
                                <option value="<?php echo $idS?>">
								<?php if($idS == 0){echo 'SELECIONE';}else{seccn($idS);}?></option>
                                 <?php while($aSecc = mysqli_fetch_array($listSecc)){ 
								 	if($aSecc['idSeccion']!=$idS){
								 ?>
                                	<option value="<?php echo $aSecc['idSeccion'];?>">
                                    	<?php  seccn($aSecc['idSeccion']);?></option>
                                <?php }}?>
                              </select><br>
                                <label for="textfield" style="font-weight:800;">Escolaridad:</label>
                                <select name="idEscolaridad" required id="Escrdd">
                                <option value="<?php echo $idE?>">
								<?php if($idE == 0){echo 'SELECIONE';}else{esclrdd($idE);}?></option>
                               	<?php while($array = mysqli_fetch_array($Escldd)){ 
								  	if($array['idEscolaridad'] !=4 and $array['idEscolaridad'] != $idE){
								 ?>
                                 	<option value="<?php echo $array['idEscolaridad']; ?>">
										<?php echo $array['escolaridad']; ?></option>
                                 <?php }}?>
                                </select><br>
                                <input name="S2OP1RM" type="submit" class="sbt" id="S2OP1RM" value="Guardar"> 
								<input name="Cancelar" type="reset" class=" BTMDF sbt" id="Cancelar">
<script>
	$("#S2OP1RM").on("click",function(event){
		var Escrdd = $("#Escrdd").val();
		var idSeccion = $("#idSeccion").val();
		var idGrado = $("#idGrado").val();
		var msj='';
		if(Escrdd == 0 || idSeccion== 0 || idGrado== 0){
			event.preventDefault();
			
			if(Escrdd == 0){$("#Escrdd").css("border-color","#FF0004");}
			else{$("#Escrdd").css("border-color","rgb(204, 216, 219)");}
			
			if(idSeccion== 0){$("#idSeccion").css("border-color","#FF0004");}
			else{$("#idSeccion").css("border-color","rgb(204, 216, 219)");}
			
			if(idGrado== 0){$("#idGrado").css("border-color","#FF0004");}
			else{$("#idGrado").css("border-color","rgb(204, 216, 219)");}
			
			alert('Por favor Selecione algunas de la opciones');
		}	
	});
</script>
                            </div>
                        </form>
                  </div>
                </div>
                
            </div>	
    </body>
</html>
