<?php require_once("protected/controlUnit.php"); 
loggedOff(); ?>
<!doctype html>
<html>
	<head>
    	<!--<link rel="stylesheet" type="text/css" href="css/Styles.css">-->
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title>
    </head>
    <body>
            <div id="HE">
                <div id="CHE" class="CS">
                    <div id="LGYOPS">
                    	<div><img src="img/BL.png"></div>
                        <div id="BRROPS">
                            <table border="0"><tbody><tr>
                            <!--
                            <td valign="middle">
                                <img id="IMOINI" src="img/BL-1.png"/>
                            </td>
                            -->
                            <td width="22px">&nbsp;</td>
                            <td>
                                <img id="IMOPAY" src="img/BL-2.png"/>
                            </td>
                            <td width="22px">&nbsp;</td>
                            <td>
                                <img id="IMOSAL" src="img/BL-3.png" onClick=""/>
                            </td></tr></tbody></table>
                        </div>
                    </div>
                    <div id="NUSER">
                    	<div><img src="img/05.png"><?php echo $nameUsu; ?></div>
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
                <div id="CL">
                    <div id="EST">
                        <div id="TTEST">
                            <img src="img/S8.png">
                            <div>Estadisticas</div>
                        </div>
                        <div id="MATR">
                            <div class="TTES">Matricula</div>
                            <div class="CANTES">
                                <div id="CTDD"><?php numMatricul($info[0]);?></div>
                                <div>Alumnos</div>
                            </div>
                        </div>
                        <div class="SEST">
                        	<?php require_once("protected/views/ESTPE.php"); ?>
                        </div>
                         <div class="SEST">
                        	<?php require_once("protected/views/ESTPG.php"); ?>
                        </div>
                    </div>
                </div>
                <div id="CR">
                	<?php require_once("protected/views/CROP.php"); ?>
                </div>
            </div>	
    </body>
</html>

