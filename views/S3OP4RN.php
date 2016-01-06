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
            	
                <div class="PGO MC" style=" margin-left: 16%; width:800px;">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/S3OP4.png">
                        <div id="TTTXT">Materia Pendiente - Registro de Calificaciones</div>
                        <div id="BTRGRS">
                            <a href="S3OP4.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                    <form method="post">
						<?php if(isset($_POST['sbtS3OP4RN'])){?>
                        <?php if(tbrows($listMP)!=0){ ?>
                        <div class="Table" >
                            <div class="Heading" >
                                <div class="Cell" style="">Nº</div>
                                <div class="Cell" style=" width: 100px;">Cédula</div>
                                <div class="Cell" style=" width: 200px;">Identificación</div>
                                <div class="Cell" style="">C/S</div>
                                <div class="Cell" style="">Asignatura</div>
                                <div class="Cell" style=" text-align:center">
								<?php echo $_POST['idLapso'].'L';?></div>
                            </div>
                            <?php while($aMP = mysqli_fetch_array($listMP)){  
								$dtEst=mysqli_fetch_array(consultEstud($aMP['ciEstidante']));
								$dtMat=mysqli_fetch_array(consultMatricla(
															$ae['idAnoEscolar'],$aMP['ciEstidante']));
							?>
                            <div class="Row" >
                                <div class="Cell" style=""><?php echo $n;?></div>
                                <div class="Cell" style="">
								<?php echo $aMP['ciEstidante'];?>
                                <input name="Est<?php echo $n; ?>" type="hidden" id="est" 
                                	value="<?php echo $aMP['ciEstidante'];?>">
                                </div>
                                <div class="Cell" style="">
									<?php echo $dtEst['apellidosEst'].' '.$dtEst['nombresEst'];?></div>
                                <div class="Cell" style="">
								<?php echo $dtMat['idGrado'].'/'; seccn($dtMat['idSeccion']); ?></div>
                                <div class="Cell" style=""><?php nAsign($aMP['idAsignatura']);?></div>
                                <div class="Cell" style="">
                                	<input name="<?php echo $aMP['id'];?>" type="text" class="not" 
                                    	value=""></div>
                            </div>
                            <?php $n++;} ?>
                        </div>
                        <div><br>
                        	<input name="idLaps" type="hidden" value="<?php echo $_POST['idLapso'];?>" >
                            <input name="nEst" type="hidden" value="<?php echo $n;?>" >
                            <input class="BTMDF sbt " name="regS3OP4RN" type="submit" id="submit" value="Guardar">
                        </div>
                        
                        <?php }else{?><script>alert('Matricula Vacia');
                          window.location="S3OP4.php";
                          </script><?php  }?>
                          
                        <?php }else{?>
                        <div style="text-align:center;">
                        Lapso:
                        	<select name="idLapso">
                              <option value="1">PRIMERO</option>
                              <option value="2">SEGUNDO</option>
                              <option value="3">TERCERO</option>
                            </select>
                        	<input class="BTMDF sbt " name="sbtS3OP4RN" type="submit" id="submit" value="Buscar"><br>
                        </div>
						<?php }?>
                    </form>   
                  
                </div>
                
            </div>	
    </body>
</html>
