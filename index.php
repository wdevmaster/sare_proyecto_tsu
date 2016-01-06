<?php require_once("protected/controlUnit.php"); ?>
<!doctype html>
<html>
	<head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title>
    </head>
    <body>
    	<div class="CS">
        	<form method="post">
                <div class="Fr" id="CLG">
                    <div id="HLG">
                        <div id="IMHLG1">
                            <img src="img/01.png">
                        </div>
                        <div id="IMHLG2">
                            <img src="img/02.png">
                        </div>
                    </div>
                    <div id="FLG">
                        <div id="S1FLG">
                            <div class="TXTFLG">Nombre de usuario</div>
                            <input class="IPTxT" required name="user" type="text" 
                               id="USER" placeholder="Escriba su nombre de usuario."
                               maxlength="15">
                        </div>
                        <div id="S2FLG">
                            <div class="TXTFLG">Contraseña</div>
                            <input name="key" type="password" required class="IPTxT" 
                               id="KEY" placeholder="Escriba la contraseña de su cuenta." 
                               maxlength="15" >
                        </div>
                    </div>
                    <div id="BLG">
                        <input name="BSLG" class="sbt" type="submit" value="Inicio de sesión">
                    </div>
                </div>
        	</form>
        </div>
	</body>
</html>