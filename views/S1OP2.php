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
            	
                <div class="PGO MC" style=" margin-left: 16%; width:800px">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/<?php echo $pg; ?>.png">
                        <div id="TTTXT">Año Escolar</div>
                        <div id="BTRGRS">
                            <a href="../inicio.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                        	<input id="button" class="sbt" type="button" value="Nuevo Año Escolar"><br><br>
                            <div class="IPTMDF" style="display:none">
<div class="titleTable">Nuevo año escolar</div><br>
<div>
<label for="textfield">Año de Inicio:</label>
<input name="inicioAnoEscolar" type="text" required class="IPTxT" id="IAE" pattern="[0-9]{4}" maxlength="4" ><br><br>
<label for="textfield">Año de Fin:</label>
<input type="text" disabled class="IPTxT" id="FAE"><br><br>
<script>
    $( "#IAE" ).keyup(function(){
        var value = $( this ).val();
        var fAE = 1+ parseInt(value);
        if((parseInt(value) >= 1000) && (parseInt(value) < 10000)){
            $("#FAE").val(fAE);}else
        { $("#FAE").val(' ');}
      }).keyup();
</script>
<input name="S1OP2Reg" type="submit" class="sbt" id="S1OP2Reg" value="Guardar"> 
<input name="Cancelar" type="reset" class=" BTMDF sbt" id="Cancelar">
</div><br><br>
                            </div>
                        	<div class="titleTable">Listado de años escolares</div>
                        	<div class="tableMost" style="width:100%">
                                <div class="rows header">
                                	<div class="column" style="width:5%">Nº</div>
                                    <div class="column" style="width:25%">Inicio Año Escolar</div>
                                    <div class="column" style="width:25%">Fin Año Escolar</div>
                                    <div class="column" style="width:25%">Matricula</div>
                                    <div class="column" style="width:10%">Acciones</div>
                                </div>
                                <?php for($i=1; $i < $listAE[0]; $i++){ ?>
                                <div class="rows">
                                	<div class="column" style="width:5%;"><?php echo $i; ?></div>
                                    <?php for($j=1;$j < 4;$j++){ 
									if($j==3){$etqut=' Alumnos';}else{$etqut='';}
									?>
                                    <div class="column" style="width:25%">
									<?php echo $listAE[$i][$j],$etqut; ?></div>
                                    <?php } ?>
                                    <div class="column" style="width:10%">
                                    	<div class="column" style="width:48%; text-align: center;">
                                       	<a href="S1OP2MDF.php?idAE=<?php echo $listAE[$i][0];?>">
                                            Modificar</a></div>
                                  </div>
                                </div>
                                <?php } ?>
                            </div>
                            
                        </form>
               	  </div>
                </div>
                
            </div>	
    </body>
</html>
