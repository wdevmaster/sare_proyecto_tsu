<?php 
	
	function arrayPost(){ $dtFrom = array(); foreach($_POST as $nc => $value){ $dtFrom[$nc] = $value;}
	return $dtFrom;}

//FUNCIONES DE LA BASE DE DATOS	
//---------------------------------------------------------------------------------------------------------------
	function dbCon(){
		$serv = 'localhost'; $user = 'root'; $pass = ''; $db = 'sare';
		$con=mysqli_connect($serv, $user,$pass,$db);
		if(!$con){/*FUNCION DE ERROR*/}else{mysql_query("SET NAMES utf8");return $con;}}
	
	function Query($con,$sql){
	return mysqli_query($con,$sql);}
	
	function tbQuery($sql){ 
	return mysqli_query(dbCon(),$sql);}
	
	function tbRows($query){ 
	return mysqli_num_rows($query);}  
	
	function tbArray($query){ 
	return mysqli_fetch_array($query);}
	
	function affected($con){
		if (mysqli_affected_rows($con) == -1){
		    ?><script>alert('Ud. debe tener un error en su sql');</script><?php }
			
		if (mysqli_affected_rows($con) > 0){
			?><script>alert('El Registro se guardo Correctamente');</script><?php }
		else {
			?><script>alert('El registro no fue insertado');</script><?php }
	} 
	

//---------------------------------------------------------------------------------------------------------------
	
	function loggedOn($user,$key){
		$sql = "SELECT * FROM usuario WHERE nUsuario = '".$user."' AND cUsuario = '".md5($key)."'";
		if (tbRows(tbQuery($sql))==1){ $array=tbArray(tbQuery($sql)); 
		$_SESSION['loggedOn'] = true; 
		$_SESSION['useName'] =$array['nUsuario'];
		header('Location: inicio.php');
		}else{?><script language="Javascript" type="text/javascript">
					window.location.href='index.php';
					window.alert('Usuario o Contraseña Incorrectas \n Verifique y Intente de Nuevo');
            	</script><?php }
	}
	
	function logged(){
		if($_SESSION['loggedOn'] == false){
			if(substr(namePages(),0,5)== 'views'){
				?><script language="Javascript" type="text/javascript">
					window.location.href='../index.php';
					window.alert('Error por favor Iniciar Session');</script><?php
			}else{
				?><script language="Javascript" type="text/javascript">
					window.location.href='index.php';
					window.alert('Error por favor Iniciar Session');</script><?php
			}
		}}
			
	function loggedOff(){
		$_SESSION['loggedOn'] = ''; $_SESSION['useName'] =''; header('Location: index.php');}

//FUNCIONES DE CONSULTA DE TABLAS INFORMACION GENRAL
//---------------------------------------------------------------------------------------------------------------	
	function tbPlantel(){
		$sql = "SELECT * FROM datosplantel";
	return tbArray(tbQuery($sql));}
	
	function tbAnoEsc(){
		$sql = "SELECT * FROM anoescolar ORDER BY idAnoEscolar DESC";
	return tbArray(tbQuery($sql));}
	
	function queryTbAnoEsc($id){
		$sql = "SELECT * FROM anoescolar WHERE idAnoEscolar = '".$id."'";
	return tbArray(tbQuery($sql));}
	
	function queryTbPlanEst($id){
		$sql = "SELECT * FROM planestudio WHERE idPlanEstudio = '".$id."'";
	return tbArray(tbQuery($sql));}
	
	function queryTbPernsl($id){
		$sql = "SELECT * FROM personaldocente WHERE ciPersonal = '".$id."'";
	return tbArray(tbQuery($sql));}
	
	function queryTbAsign($id){
		$sql = "SELECT * FROM asignatura WHERE idAsignatura = '".$id."'";
	return tbArray(tbQuery($sql));}
	
	function verifTbAnoEsc($dat){
		$sql = "SELECT * FROM anoescolar 
						 WHERE inicioAnoEscolar = 	'".$dat['inicioAnoEscolar']."' 
						 AND finAnoEscolar = 		'".$dat['finAnoEscolar']."'";
	return tbRows(tbQuery($sql));}
	
	function tbEntFed(){
		$sql = "SELECT * FROM entidadfederal";
	return tbQuery($sql);}
	
	function tbGrad(){
		$sql = "SELECT * FROM grados";
	return tbQuery($sql);}
	
	function tbSecc(){
		$sql = "SELECT * FROM secciones";
	return tbQuery($sql);}
	
	function tbEscldd(){
		$sql = "SELECT * FROM escolaridad";
	return tbQuery($sql);}
	
	function idtfEntFed($id){
		$sql = "SELECT * FROM entidadfederal WHERE idEntidadFederal = '".$id."'";
	return tbArray(tbQuery($sql));}
	
	function idtfCargo($id){
		$sql = "SELECT * FROM cargopersonal WHERE idCargoPersonal = '".$id."'";
	return tbArray(tbQuery($sql));}
	
	function tbMatricl($dat){
		$sql = "SELECT * FROM matricula WHERE 		idAnoEscolar 	= '".$dat['idAnoEscolar']."' 
										AND 		idGrado 		= '".$dat['idGrado']."' 
										AND 		idSeccion 		= '".$dat['idSeccion']."' 
										ORDER BY 	ciEstudiante 	ASC";
	return tbQuery($sql);}
	
	function tbMatriclMP($dat){
		$sql = "SELECT * FROM repitiente_materiapendient WHERE 		idAnoEscolar 	= '".$dat['idAnoEscolar']."' 
														 AND 		idGrad 	= '".$dat['idGrado']."' ";
	return tbQuery($sql);}
	
	function tbPlanEstAsign($id){
		$sql= "SELECT * FROM planestudio_asignatura WHERE idGrado = '".$id."' ORDER BY OrdAsigPlan ASC";
		$query = tbQuery($sql);
		$rows = tbRows($query)+1;
	return array('0' => $rows, '1' => $query);}
	
	function tbUsuario(){
		$sql = "SELECT * FROM usuario";
		return tbQuery($sql);}
	
	function consltUsuario($id){
		$sql = "SELECT * FROM usuario WHERE idusuario = '".$id."'";
	return tbArray(tbQuery($sql));} 
	
	
//FUNCIONES DE REGISTRO EN TABLAS 
//---------------------------------------------------------------------------------------------------------------	
	function regAnoEsc($dat){
		$sql = "INSERT INTO anoescolar (inicioAnoEscolar, 
										finAnoEscolar) 
						VALUES 
										('".$dat['inicioAnoEscolar']."', 
										 '".$dat['finAnoEscolar']."')";
		$con = dbCon();
		Query($con,$sql);
		affected($con);
		?><script>window.location="S1OP2.php";</script><?php
	}
	
	function regPernl($dat){
		$sql = "INSERT INTO personaldocente (ciPersonal, 
											 apellidosPersonal, 
											 nombresPersonal, 
											 idCargoPersona) 		
						VALUES 				
											('".$dat['ciPersonal']."', 
											'".$dat['apellidosPersonal']."', 
											'".$dat['nombresPersonal']."', 
											'".$dat['idCargoPersona']."')";
		$con = dbCon();
		Query($con,$sql);
		affected($con);
		?><script>window.location="S1OP6.php";</script><?php
	}
	
	function regEstudiant($dat){
		$sql = "INSERT INTO estudiantes (ciEstudiante, 
										 apellidosEst, 
										 nombresEst, 
										 sexoEst, 
										 fechNacimientoEst, 
										 lugarNacimientoEst, 
										 idEntidaFederal) 
						VALUES 
										('".$dat['ciEstudiante']."', 
										 '".$dat['apellidosEst']."', 
										 '".$dat['nombresEst']."', 
										 '".$dat['sexoEst']."', 
										 '".$dat['fechNacimientoEst']."', 
										 '".$dat['lugarNacimientoEst']."', 
										 '".$dat['idEntidaFederal']."')";
		$con = dbCon();
		Query($con,$sql);
		header ('Location: S2OP1RM.php?Ci='.$dat['ciEstudiante']);
	}
	
	function regMatricla($dat){
		$con = dbCon();
		$sql = "SELECT * FROM matricula WHERE ciEstudiante = '".$dat['ciEstudiante']."'";
		$query = tbQuery($sql);
		if(tbRows($query)==0){
		$sql = "INSERT INTO matricula (idAnoEscolar, 
									   idGrado, 
									   idSeccion, 
									   ciEstudiante, 
									   idEscolaridad) 
						VALUES 
									 ('".$dat['idAnoEscolar']."', 
									  '".$dat['idGrado']."', 
									  '".$dat['idSeccion']."', 
									  '".$dat['ciEstudiante']."', 
									  '".$dat['idEscolaridad']."');";
		
		Query($con,$sql);
		}else{
			$array=mysqli_fetch_array($query);
			$sql = "UPDATE matricula SET 	idAnoEscolar='".$dat['idAnoEscolar']."', 
									 	 	idGrado = '".$dat['idGrado']."',
										 	idSeccion = '".$dat['idSeccion']."',
										 	idEscolaridad = '".$dat['idEscolaridad']."'  
								 	 WHERE 	id = '".$array['id']."'";
								 						 
			Query($con,$sql);
			if($dat['idAnoEscolar']==$array['idAnoEscolar'] 
				and $dat['idEscolaridad'] != $array['idEscolaridad']){
				$qDelte=tbQuery("SELECT * FROM notaestudiantes WHERE idAnoEscolar = '".$dat['idAnoEscolar']."'
									AND ciEstudiante = '".$dat['ciEstudiante']."'");
					if(tbrows($qDelte)!=0){				
					while($aDelte = mysqli_fetch_array($qDelte)){
						tbQuery("DELETE FROM notaestudiantes WHERE id = '".$aDelte['id']."'");
					}}
				$qDelteMP=tbQuery("SELECT * FROM repitiente_materiapendient WHERE idAnoEscolar 
								= '".$dat['idAnoEscolar']."' AND ciEstidante = '".$dat['ciEstudiante']."'");
					if(tbrows($qDelteMP)!=0){	
					while($aDelteMP = mysqli_fetch_array($qDelteMP)){
						tbQuery("DELETE FROM repitiente_materiapendient WHERE id = '".$aDelteMP['id']."'");
					}}
			}
		}
		
		if($dat['idEscolaridad']==1){
		affected($con);
		?><script>window.location="S2OP1.php";</script><?php }
	}
	
	function regMatPend($idAe,$ciEst,$diAsg1,$diAsg2,$idGrad){
		$sql="INSERT INTO repitiente_materiapendient (idAnoEscolar, 
													  idGrad,
													  ciEstidante,
													  idAsignatura)
												VALUES
													  ('".$idAe."','".$idGrad."','".$ciEst."','".$diAsg1."'),
													  ('".$idAe."','".$idGrad."','".$ciEst."','".$diAsg2."')";
												
		$con = dbCon();		
		Query($con,$sql);
		affected($con);
		?><script>window.location="S2OP1.php";</script><?php
	}
	
	function insst($dat){
		$sql = "SELECT * FROM insstestudiante WHERE idAnoEscolar = '".$dat['idAnoEscolar']."' 
											  AND idGrad = '".$dat['idGrado']."' 
											  AND ciEstidante = '".$dat['ciEstudiante']."'";
				
		if(tbRows(tbQuery($sql))==0){
			$sql = "SELECT * FROM planestudio_asignatura WHERE 	idGrado = '".$dat['idGrado']."' 
														 ORDER BY 	OrdAsigPlan ASC";
			$query = tbQuery($sql);											 
			while($dtA = mysqli_fetch_array($query)){
				$sql= "INSERT INTO insstestudiante (idAnoEscolar, idGrad, ciEstidante, idAsignatura) 
											VALUES ('".$dat['idAnoEscolar']."', 
													'".$dat['idGrado']."', 
													'".$dat['ciEstudiante']."', 
													'".$dtA['idAsignatura']."')";
				tbQuery($sql);
			}
		}

	}
	
	function regTbNotaReg($dat){
		$sql= "SELECT * FROM notaestudiantes WHERE 	idAnoEscolar 	= '".$dat['idAnoEscolar']."'	 
											 AND 	ciEstudiante 	= '".$dat['ciEstudiante']."'	
											 AND 	idGrdAsig 		= '".$dat['idGrado']."' ";
											 
		if(tbRows(tbQuery($sql))==0){
			$sql = "SELECT * FROM planestudio_asignatura WHERE 		idGrado = '".$dat['idGrado']."' 
														 ORDER BY 	OrdAsigPlan ASC";
			$queryA=tbQuery($sql);
			while($dtA = mysqli_fetch_array($queryA)){
				$dtAsign=queryTbAsign($dtA['idAsignatura']);
				$sql ="INSERT INTO notaestudiantes (idAnoEscolar, 
													ciEstudiante, 
													idGrdAsig, 
													idAsigGrd, 
													nombAsign) 
											VALUES 
													('".$dat['idAnoEscolar']."', 
													 '".$dat['ciEstudiante']."',
													 '".$dat['idGrado']."',
													 '".$dtA['idAsignatura']."',
													 '".$dtAsign['nombreAsignatura']."')";
				tbQuery($sql);
			}
		}
		
	}
	/*
	function regTbNotaRep($idAe,$ciEst,$idGrad,$idAsign,$AsignNam){
		$sql="INSERT INTO notaestudiantes (idAnoEscolar, ciEstudiante, idGrdAsig, idAsigGrd, nombAsign)
				VALUES ('".$idAe."',
						'".$ciEst."',
						'".$idGrad."',
						'".$idAsign."',
						'".$AsignNam."')";
						
		echo $sql.'<br>';				
		$con = dbCon();
		Query($con,$sql);
		affected($con);
		?><script>//window.location="S2OP1.php";</script><?php
	}*/

	function modfDtPlantel($dat){
		$sql="UPDATE datosplantel SET 	codigoDEA				= '".$dat['codigoDEA']."', 
										nombrePlant				= '".$dat['nombrePlant']."', 
										distritoEscolarPlant	= '".$dat['distritoEscolarPlant']."', 
										direccPlantel			= '".$dat['direccPlantel']."', 
										telefonoPlant			= '".$dat['telefonoPlant']."', 
										municipioPlant			= '".$dat['municipioPlant']."', 
										idEntidaFederal			= '".$dat['idEntidaFederal']."', 
										zonaEducativaPlant		= '".$dat['zonaEducativaPlant']."' 
								  WHERE 
								  		codigoDEA 				= '".$dat['idDt']."'";
		$con = dbCon();		
		Query($con,$sql);
		affected($con);
		?><script>window.location="S1OP1.php";</script><?php
	}
	
	function modfAnoEsc($dat){
		$sql= "UPDATE anoescolar SET 	inicioAnoEscolar= 	'".$dat['inicioAnoEscolar']."', 
										finAnoEscolar= 		'".$dat['finAnoEscolar']."' 
								 WHERE 	
								 		idAnoEscolar= 		'".$dat['idAE']."'";
		$con = dbCon();
		Query($con,$sql);
		affected($con);
		?><script>window.location="S1OP2.php";</script><?php 
	}
	
	function modfPlanEst($dat){
		$sql = "UPDATE planestudio SET 	idPlanEstudio = 		'".$dat['idPlanEstudio']."', 
										nombrePlanEstudio = 	'".$dat['nombrePlanEstudio']."', 
										mencionPlanEstudio = 	'".$dat['mencionPlanEstudio']."', 
										tituloPlanEstudio = 	'".$dat['tituloPlanEstudio']."' 
								   WHERE 
								   		idPlanEstudio = 		'".$dat['idPE']."' "; 
		$con = dbCon();
		Query($con,$sql);
		affected($con);
		?><script>window.location="S1OP3.php";</script><?php 
	}
	
	function modfAsign($dat){
		$sql = "UPDATE asignatura SET 	nombreAsignatura = 				'".$dat['nombreAsignatura']."',
					 					nombreAbreviadoAsignatura = 	'".$dat['nombreAbreviadoAsignatura']."', 
										educT = 						'".$dat['educT']."' 
								  WHERE 
								  		idAsignatura = 					'".$dat['idAsg']."' ";
		$con = dbCon();
		Query($con,$sql);
		affected($con);
		?><script>window.location="S1OP4.php";</script><?php 
	}
	
	function modfPersnl($dat){
		$sql = "UPDATE personaldocente SET	ciPersonal = 			'".$dat['ciPersonal']."', 
											apellidosPersonal = 	'".$dat['apellidosPersonal']."', 
											nombresPersonal = 		'".$dat['nombresPersonal']."' 
									WHERE 
											ciPersonal = 			'".$dat['idPersnl']."' ";
		$con = dbCon();
		Query($con,$sql);
		affected($con);
		?><script>window.location="S1OP6.php";</script><?php 
	}
	
	function modfEstud($dat){
		$sql = "UPDATE estudiantes SET ciEstudiante= 		'".$dat['ciEstudiante']."',
									   apellidosEst= 		'".$dat['apellidosEst']."',
									   nombresEst = 		'".$dat['nombresEst']."',
									   sexoEst = 			'".$dat['sexoEst']."',
									   fechNacimientoEst = 	'".$dat['fechNacimientoEst']."',
									   lugarNacimientoEst= 	'".$dat['lugarNacimientoEst']."',
									   idEntidaFederal= 	'".$dat['idEntidaFederal']."'
								WHERE
									   ciEstudiante= 		'".$dat['idEstudiante']."' ";
		$con = dbCon();
		Query($con,$sql);
		if(mysqli_affected_rows($con) > 0){ return true;}else{ return false;}
	}
	
	function modfMatricl($dat){
		$sql="SELECT * FROM matricula WHERE ciEstudiante = '".$dat['idEstudiante']."'";
		$query=tbQuery($sql);
		$array=tbArray($query);
		$sql = "UPDATE matricula SET idAnoEscolar= 		'".$dat['idAnoEscolar']."',
									 idGrado= 			'".$dat['idGrado']."',
									 idSeccion = 		'".$dat['idSeccion']."',
									 ciEstudiante = 	'".$dat['ciEstudiante']."'
								WHERE
									  id= 				'".$array['id']."';";
		$con = dbCon();
		Query($con,$sql);
		if(mysqli_affected_rows($con) > 0){ return true;}else{ return false;}
	}
		
	function listAnoEs(){
		$sql = "SELECT * FROM anoescolar ORDER BY idAnoEscolar DESC";
		$list = array();
		$n = 1;
		$query=tbQuery($sql);
		while(($array=mysqli_fetch_array($query)) && ($n != 6)){
			
			$numRows = numRowsMatricula($array['idAnoEscolar']);
			
			$list[$n] = array( 	'0' => $array['idAnoEscolar'], 
								'1' => $array['inicioAnoEscolar'], 
								'2' => $array['finAnoEscolar'], 
								'3' => $numRows,);
		$n++; }
		$list[0] = $n;
		return $list;}
	
	function listPlanEst(){
		$sql = "SELECT * FROM planestudio ORDER BY idPlanEstudio DESC";
		return tbQuery($sql);}
		
	function listAsign(){
		$sql = "SELECT * FROM asignatura ORDER BY idAsignatura ASC";
		return tbQuery($sql);}
	
	function listPernl(){
		$sql = "SELECT * FROM personaldocente ORDER BY idCargoPersona ASC";
		return tbQuery($sql);}
		
	function listCargo(){
		$sql = "SELECT * FROM cargopersonal ORDER BY idCargoPersonal ASC";
		return tbQuery($sql);}
	
	function listEscolaridad(){
		$sql = "SELECT * FROM escolaridad";
		return tbQuery($sql);}
	
	function listSelectAsign($id){
		$i=1; $list = array();
		$query = tbQuery("SELECT * FROM planestudio_asignatura WHERE idGrado = '".$id."'");
		while($array = mysqli_fetch_array($query)){
			$aAsig = tbArray(tbQuery("SELECT * FROM asignatura WHERE idAsignatura = '".$array['idAsignatura']."'"));
			$list[$i]= '<option value="'.$array['idAsignatura'].'">'.$aAsig['nombreAsignatura'].'</option>';
			$i++;}
		$list[0]=$i;
		return $list;}
		
	function listGrad(){
		$sql = "SELECT * FROM grados";
		return tbQuery($sql);}
		
	function listSecc(){
		$sql = "SELECT * FROM secciones";
		return tbQuery($sql);}
	
	function listAsigGrad($id){
		$sql = "SELECT * FROM planestudio_asignatura 
						 WHERE idGrado = '$id' 
						 ORDER BY OrdAsigPlan ASC";
		$query=tbQuery($sql);
		$i=1; $list = array();
		while($array = mysqli_fetch_array($query)){
			$qTbAsidn=queryTbAsign($array['idAsignatura']);
			$list[$i]= array ('1' => $array['idAsignatura'], '2' => $qTbAsidn['nombreAsignatura']);
			$i++;}

		$list[0]=$i;
		return $list;}
			
	function verifCargo($id){
		$sql="SELECT * FROM personaldocente WHERE idCargoPersona = '$id'";
		return tbRows(tbQuery($sql));}
		
	function verifMatricla($id){
		$sql="SELECT * FROM matricula WHERE ciEstudiante = '$id'";
		return tbRows(tbQuery($sql));}
	
	function consultMatricla($idAe,$ci){
		$sql="SELECT * FROM matricula WHERE idAnoEscolar = '".$idAe."' AND ciEstudiante = '".$ci."' ";
		return tbQuery($sql);}
		
	function consultEstud($id){
		$sql = "SELECT * FROM estudiantes  WHERE ciEstudiante = '$id'";
		return tbQuery($sql);}
	
	function consultMP($id){
		$sql = "SELECT * FROM repitiente_materiapendient WHERE idAnoEscolar = '".$id."' ORDER BY ciEstidante ASC";
		return tbQuery($sql);}
	
	function infoEstud($id){
		$dat = array();
		$sql = "SELECT * FROM estudiantes  WHERE ciEstudiante = '$id'";
		$arrayE=tbArray(tbQuery($sql));
		$dat['ciEst']	=$arrayE['ciEstudiante'];
		$dat['apeEst']	=$arrayE['apellidosEst'];
		$dat['nomEst']	=$arrayE['nombresEst'];
		$dat['sexEst']	=$arrayE['sexoEst'];
		$dat['fecEst']	=$arrayE['fechNacimientoEst'];
		$dat['lugEst']	=$arrayE['lugarNacimientoEst'];
		$dat['efEst']	=$arrayE['idEntidaFederal'];
		
		$sql= "SELECT * FROM `matricula` WHERE `ciEstudiante` = '$id'";
		if(tbRows(tbQuery($sql)) != 0){
			$arrayM=tbArray(tbQuery($sql));
			$dat['gradEst']	= $arrayM['idGrado'];
			$dat['seccEst']	= $arrayM['idSeccion'];
			$dat['esclEst']	= $arrayM['idEscolaridad'];
		} else{$dat['gradEst']=''; $dat['seccEst']=''; $dat['esclEst']=''; }
		return $dat;}
	
	
	
//FUNCIONES VARIADAS DE CONTROL O MUESTRA DE INFORMACION SIMPLE	
//---------------------------------------------------------------------------------------------------------------		
	function tblapso(){
		$sql = "SELECT * FROM notaestudiantes WHERE notaLapso1 >= 0";
		if(tbRows(tbQuery($sql)) == 0){ return 1;}else{
			$sql = "SELECT * FROM notaestudiantes WHERE notaLapso2 >= 0";
			if(tbRows(tbQuery($sql)) == 0){ return 2;}else{
				$sql = "SELECT * FROM notaestudiantes WHERE notaLapso3 >= 0";
				if(tbRows(tbQuery($sql)) == 0){ return 3;}}}
	}
	
	function dateHourSystem(){
		date_default_timezone_set("America/caracas");
		$hora= date ("h:i"); $d= date ("d"); $m = date ("n");
		if($m ==1){$m= 'Ene';}else{
		if($m ==2){$m= 'Feb';}else{
		if($m ==3){$m= 'Mar';}else{
		if($m ==4){$m= 'Abr';}else{
		if($m ==5){$m= 'May ';}else{
		if($m ==6){$m= 'Jun ';}else{
		if($m ==7){$m= 'Jul ';}else{
		if($m ==8){$m= 'Ago ';}else{
		if($m ==9){$m= 'Sep';}else{
		if($m ==10){$m= 'Oct ';}else{
		if($m ==11){$m= 'Nov ';}else{
		if($m ==12){$m= 'Dic';}}}}}}}}}}}}
		$fecha = $d.' '.$m; 
	return $hora.' '.$fecha;}
		
	function InfoBar(){
		$dtPL = tbPlantel(); $dtAE = tbAnoEsc();
		$dtInfoBar[0] = $dtAE['idAnoEscolar'];
		$dtInfoBar[1] = $dtPL['nombrePlant'];
		$dtInfoBar[2] = $dtAE['inicioAnoEscolar'].' - '.$dtAE['finAnoEscolar'];
		$dtInfoBar[3] = tblapso();
		$dtInfoBar[4] = dateHourSystem();
	return $dtInfoBar;}
	
	function NumTelf($tel){
		$nTel = array('cod' =>substr($tel,0,4), 'num' => substr($tel,5,12));
	return $nTel;}
	
	function codTelf(){
		return  array('1' => '0274', 
					  '2' => '0426', 
					  '3' => '0416', 
					  '4' => '0412', 
					  '5' => '0414', 
					  '6' => '0424');}
	
	function Stadisct($id){
		$s = array();
		$sql ="SELECT * FROM matricula WHERE idAnoEscolar = '".$id."'";
		$query = tbQuery($sql);
		while($array=mysqli_fetch_array($query)){
			if($array['idEscolaridad']==1){$s['rg'] =$s['rg']+1;}
			if($array['idEscolaridad']==2){$s['rp'] =$s['rp']+1;}
			if($array['idEscolaridad']==3){$s['mp'] =$s['mp']+1;}
			
			if($array['idGrado']==1){$s['p'] =$s['p']+1;}
			if($array['idGrado']==2){$s['s'] =$s['s']+1;}
			if($array['idGrado']==3){$s['t'] =$s['t']+1;}
			if($array['idGrado']==4){$s['c'] =$s['c']+1;}
			if($array['idGrado']==5){$s['q'] =$s['q']+1;}
		}
	return 	$s;
	}				  
		
	function numRowsMatricula($id){
		$sql ="SELECT * FROM matricula WHERE idAnoEscolar = '".$id."'";
		return tbRows(tbQuery($sql));}
		
	function num($num){
		if($num==0){ echo '000';}
		else{if($num < 10){echo '00'.$num;}
		else{if($num < 100){echo '0'.$num;}
		else{echo $num;}}}}
	
	function numMatricul($rows){
		if(numRowsMatricula($rows) < 10){ echo '00'.numRowsMatricula($rows);}else{ 
		if(numRowsMatricula($rows) < 100){ echo '0'.numRowsMatricula($rows);}
		else{ echo numRowsMatricula($rows);}}}
	
	function sexo(){
		return array('1' => 'M', 
					 '2' => 'H');}
					 
	function fech($dat){
		$a=substr($dat,0,4); $m=substr($dat,5,2); $d=substr($dat,8,10);
		echo $d.'-'.$m.'-'.$a;}
	
	function EntFed($id){
		$sql = "SELECT * FROM entidadfederal WHERE idEntidadFederal = '".$id."' ";
		$array = tbArray(tbQuery($sql));
		echo $array['entidadFederal'];}
	
	function sex($dat){
		if($dat == 'M'){ echo 'Mujer';}else{ echo 'Hombre';}}
	
	function seccn($id){
		$sql = "SELECT * FROM secciones WHERE idSeccion = '".$id."' ";
		$array = tbArray(tbQuery($sql));
		echo '"'.$array['seccion'].'"';}
		
	function grad($id){
		$sql = "SELECT * FROM grados WHERE idGrado = '".$id."' ";
		$array = tbArray(tbQuery($sql));
		echo $array['gradoLetras'];}
		
	function esclrdd($id){
		$sql = "SELECT * FROM escolaridad WHERE idEscolaridad = '".$id."' ";
		$array = tbArray(tbQuery($sql));
		echo $array['escolaridad'];}
	
	function rowsTbAsign($id){
		$dat=array(); $i=1;
		$sql = "SELECT * FROM planestudio_asignatura WHERE idGrado = '".$id."' ORDER BY OrdAsigPlan ASC ";
		$query=tbQuery($sql);
		while($array=mysqli_fetch_array($query)){ $dat[$i]= $array['idAsignatura']; $i++;}
		$dat[0]=tbRows(tbQuery($sql))+1;
		return $dat;}
		
	function anoEsc($id){
		$sql = "SELECT * FROM anoescolar WHERE idAnoEscolar = '".$id."' ";
		$array = tbArray(tbQuery($sql));
		echo $array['inicioAnoEscolar'].' - '.$array['finAnoEscolar'];}
		
	function laps($id){
		if($id == 1){echo '1 - PRIMER LAPSO';}
		else{if($id == 2){echo '2 - SEGUNDO LAPSO';}
		else{if($id == 3){echo '3 - TERCER LAPSO';}}}}
		
	function codPlan($id){
		$sql="SELECT * FROM planestudio_asignatura WHERE idGrado = '".$id."'";
		$array = tbArray(tbQuery($sql));
		echo $array['idPlanEstudio'];}
		
	function mencPlan($id){
		$sql="SELECT * FROM planestudio_asignatura WHERE idGrado = '".$id."'";
		$array = tbArray(tbQuery($sql));
		$sql="SELECT * FROM planestudio WHERE idPlanEstudio = '".$array['idPlanEstudio']."'";
		$array = tbArray(tbQuery($sql));
		if($array['mencionPlanEstudio']!=''){$menc=$array['mencionPlanEstudio'];}else{$menc='**';}
		echo $menc;}
		
	function cursAsig($idAe,$ciEst,$idAsig){
		$sql = "SELECT * FROM notaestudiantes WHERE idAnoEscolar = '".$idAe."'
													AND ciEstudiante = '".$ciEst."' 
													AND idAsigGrd = '".$idAsig."'";
		return tbQuery($sql);}
	
	function cursAsigMP(){
	}
	
	function nAsign($id){
		$sql="SELECT * FROM asignatura WHERE idAsignatura = '".$id."'";
		$array = tbArray(tbQuery($sql));
		echo $array['nombreAsignatura'];}
		
	function Observ($dat){
		$Matricl=tbMatricl($dat);
		while($aM = mysqli_fetch_array($Matricl)){
			if($aM['idEscolaridad']==2){
				$msj .= $aM['ciEstudiante'].':';				
				$sql = "SELECT * FROM notaestudiantes WHERE idAnoEscolar = '".$dat['idAnoEscolar']."'
													  AND ciEstudiante = '".$aM['ciEstudiante']."'
													  AND idGrdAsig = '".$dat['idGrado']."'";
													  
				$query = tbQuery($sql);
				$rows = tbRows($query);
				$n = 1;
				while($array = mysqli_fetch_array($query)){
					$naAsig=queryTbAsign($array['idAsigGrd']);
					$msj .= $naAsig['nombreAbreviadoAsignatura'];
					if($rows != $n ){$msj .= ',';}
				$n++;
				}
				$msj .= '; ';
			}else{
				if($aM['idEscolaridad']==3){
					$msj .= $aM['ciEstudiante'].':';
					$sql = "SELECT * FROM repitiente_materiapendient WHERE idAnoEscolar = '".$dat['idAnoEscolar']."'
																 	 AND ciEstidante = '".$aM['ciEstudiante']."'";
					$query = tbQuery($sql);
					$rows = tbRows($query);
					$n = 1;
				while($array = mysqli_fetch_array($query)){
					$naAsig=queryTbAsign($array['idAsignatura']);
					$msj .= $naAsig['nombreAbreviadoAsignatura'];
					if($rows != $n ){$msj .= ',';}
				$n++;
				}
					$msj .= '; ';
			} 
		}
		}
	return $msj;
	}
		

//FUNCIONES REPORTES (PDF)----------------------------------------------------

		function seccnpdf($id){
		$sql = "SELECT * FROM secciones WHERE idSeccion = '".$id."' ";
		$array = tbArray(tbQuery($sql));
		return $array['seccion'];}
		
		function gradpdf($id){
		$sql = "SELECT * FROM grados WHERE idGrado = '".$id."' ";
		$array = tbArray(tbQuery($sql));
		return $array['gradoLetras'];}
	
		function anoEscpdf($id){
		$sql = "SELECT * FROM anoescolar WHERE idAnoEscolar = '".$id."' ";
		$array = tbArray(tbQuery($sql));
		return $array['inicioAnoEscolar'].' - '.$array['finAnoEscolar'];}
		
		function codPlanpdf($id){
		$sql="SELECT * FROM planestudio_asignatura WHERE idGrado = '".$id."'";
		$array = tbArray(tbQuery($sql));
		return $array['idPlanEstudio'];}
	
		function Planpdf($id){
		$sql="SELECT * FROM planestudio_asignatura WHERE idGrado = '".$id."'";
		$array = tbArray(tbQuery($sql));
		$sql="SELECT * FROM planestudio WHERE idPlanEstudio = '".$array['idPlanEstudio']."'";
		$array = tbArray(tbQuery($sql));
		return $array['nombrePlanEstudio'];}
		
		function mencpdf($id){
		$sql="SELECT * FROM planestudio_asignatura WHERE idGrado = '".$id."'";
		$array = tbArray(tbQuery($sql));
		$sql="SELECT * FROM planestudio WHERE idPlanEstudio = '".$array['idPlanEstudio']."'";
		$array = tbArray(tbQuery($sql));
		return $array['mencionPlanEstudio'];}
		
		function sexpdf($id){
		$sql="SELECT * FROM estudiantes WHERE ciEstudiante = '".$id."'";
		$array = tbArray(tbQuery($sql));
		return $array['sexoEst'];
		}
		
		function diapdf($id){
		$sql="SELECT * FROM estudiantes WHERE ciEstudiante = '".$id."'";
		$array = tbArray(tbQuery($sql));
		$d=substr($array['fechNacimientoEst'],8,10);
		return $d;}
		
		function mespdf($id){
		$sql="SELECT * FROM estudiantes WHERE ciEstudiante = '".$id."'";
		$array = tbArray(tbQuery($sql));
		$m=substr($array['fechNacimientoEst'],5,2);
		return $m;}
		
		function anopdf($id){
		$sql="SELECT * FROM estudiantes WHERE ciEstudiante = '".$id."'";
		$array = tbArray(tbQuery($sql));
		$a=substr($array['fechNacimientoEst'],0,4);
		return $a;}
		
		function idtfEntFedpdf($id){
		$sql = "SELECT * FROM entidadfederal WHERE idEntidadFederal = '".$id."'";
		$array = tbArray(tbQuery($sql));
		return $array['entidadFederal'];}
		
		function lapspdf($id){
		if($id == 1){return '1 - PRIMER LAPSO';}
		else{if($id == 2){return '2 - SEGUNDO LAPSO';}
		else{if($id == 3){return '3 - TERCER LAPSO';}}}}
		
		function datepdf(){
		$d= date ("d"); $m = date ("n"); $a = date ("Y");
		if($m ==1){$m= 'Enero';}else{
		if($m ==2){$m= 'Febrero';}else{
		if($m ==3){$m= 'Marzo';}else{
		if($m ==4){$m= 'Abril';}else{
		if($m ==5){$m= 'Mayo';}else{
		if($m ==6){$m= 'Junio';}else{
		if($m ==7){$m= 'Julio';}else{
		if($m ==8){$m= 'Agosto';}else{
		if($m ==9){$m= 'Septiempre';}else{
		if($m ==10){$m= 'Octubre';}else{
		if($m ==11){$m= 'Noviembre';}else{
		if($m ==12){$m= 'Diciembre';}}}}}}}}}}}}
		$fecha = $d.' de '.$m. ' de '.$a; 
		return $fecha;}

	
	
?>
