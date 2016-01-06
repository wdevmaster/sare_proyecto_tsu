<?php 
	$a = date('Y');
	$m = date('m');
	$d = date('d');
	$Date = $d.'-'.$m.'-'.$a;
	
	$filename = "backup_$Date.sql";

	//Datos BD
	$usuario='root';
	$passwd='';
	$mydb='sare';
	
	//Cabeceras para generar el archivo y activar el guardado del archivo (NO BORRAR)
	header("Pragma: no-cache");
	header("Expires: 0");
	header("Content-Transfer-Encoding: binary");
	header("Content-type: application/force-download");
	header("Content-Disposition: attachment; filename=$filename");
	
	
	//Ejecutar el Mysqldump	
	$cbz='D:\xampp\mysql\bin\mysqldump.exe ';
	$sql = "-u $usuario --password=$passwd --opt $mydb";
	$executa=$cbz.$sql;
	system($executa, $resultado);

?>