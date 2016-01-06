<?php require_once("../protected/controlUnit.php"); 

?>
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
            	
                <div class="PGO MC" style=" margin-left: 20%; width:700px;">
                    <div id="TTPGOPC">
                        <img id="IPPP" src="../img/<?php echo $pg; ?>.png">
                        <div id="TTTXT">Copia de Seguridad</div>
                        <div id="BTRGRS">
                            <a href="../inicio.php" id="CRRPPP">Regresar</a>
                        </div>
                    </div>              	
                    <div id="CTPG">
                    	<form method="post">
                        	<div>
                            Una copia de seguridad completa crea un archivo de todos los datos y la configuración del sistema. Puede usar este archivo para restaurar el sistema si presenta algun fallo.
                            <br><input class="sbt" name="rCcopia" type="submit" id="rCcopia" value="Realizar Copia"></div></form>
                            <br>
                          <form action="import.php" method="post" enctype="multipart/form-data">
                          <div>
                          Restaure una copia de seguridad
                          <br><input name="archivo" type="file" required class="sbt" id="archivo"><input name="cargArch" type="submit" class="sbt" id="cargArch" value="Cargar"></div>
                        </form>
                  </div>
                </div>
                
            </div>	
    </body>
</html>
