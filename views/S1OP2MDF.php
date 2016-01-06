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
                        <img id="IPPP" src="../img/S1OP2.png">
                        <div id="TTTXT">Modificar Año Escolar</div>
                        <div id="BTRGRS">
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                        
                       	  <div>
                          	<input name="idAE" type="hidden" id="idAE">
                            <label for="textfield">Año de Inicio:</label>
                            <input name="inicioAnoEscolar" type="text" class="IPTxT" id="IAE" 
                            value="<?php echo $dtAE['inicioAnoEscolar']; ?>" ><br><br>
                            <label for="textfield">Año de Fin:</label>
                           	<input type="text" disabled class="IPTxT" id="FAE"><br><br>
<script>
$( "#IAE" ).keyup(function(){
    var value = $( this ).val();
	var fAE = 1+ parseInt(value);
	if((parseInt(value) >= 1000) && (parseInt(value) < 10000)){
    	$("#FAE").val(fAE);}else
	{ $("#FAE").val('0000');}
  }).keyup();
 
var value = $( "#IAE" ).val();
var fAE = 1+ parseInt(value);
if((parseInt(value) >= 1000) && (parseInt(value) < 10000)){
    	$("#FAE").val(fAE);}else
	{ $("#FAE").val('0000');}
</script>
                                <input name="S1OP2Mof" type="submit" class="sbt" id="S1OP2Mof" value="Guardar">
                                <input id="cancel" class="sbt" type="button" value="Cancelar"> 	
                            </div><br><br>
                        </form>
               	  </div>
                </div>
                
            </div>	
    </body>
</html>