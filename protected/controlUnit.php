<link rel="stylesheet" type="text/css" href="css/Styles.css">
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/main.js"></script>

<link rel="stylesheet" type="text/css" href="../css/Styles.css">
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/main.js"></script>

<?php require_once('centralUnit.php');?>

<?php
	set_time_limit (0); 
	error_reporting(0);
	session_start();
	
	header("Content-Type: text/html;charset=utf-8");
	
	$title = 'S.A.R.E. v1.0';
	$info = InfoBar();
	
	if(isset($_SESSION['useName'])){
	$nameUsu = $_SESSION['useName'];}else{$nameUsu = 'Usuario';}
	
	$ae = tbAnoEsc();
	$std = Stadisct($ae['idAnoEscolar']);
	
	if (namePages() != 'index'){ logged(); 
	}else{ 
		if(isset($_SESSION['loggedOn'])){
		if($_SESSION['loggedOn'] != false){header('Location: inicio.php');}}
	}
	
	if (isset($_POST['BSLG'])){ $dt=arrayPost(); loggedOn($dt['user'],$dt['key']);}
	
	if (isset($_POST['bt']) and $_POST[idFrom]=='S1OP2'){}
	
	if(substr(namePages(),0,5)== 'views'){
		
		$nChar = strlen (namePages());
		$pg = substr(namePages(),6,$nChar);
		
		if($pg == 'S1OP1'){ 
			$dtPlantel=tbPlantel(); 
			$idEF = $dtPlantel['idEntidaFederal'];
			$NTelf = $dtPlantel['telefonoPlant'];
			$iddtEntFed=idtfEntFed($idEF);
			$dtEntFed=tbEntFed();
			$codTelf = codTelf();
			$NumTelf= NumTelf($NTelf);
			if(isset($_POST['S1OP1Modf'])){
				$dt=arrayPost();
				$dt['telefonoPlant'] =  $dt['codTelf'].'-'.$dt['numTelf'];
				modfDtPlantel($dt);
			}
		}
		
		if($pg == 'S1OP2'){
			$listAE = listAnoEs();
			if(isset($_POST['S1OP2Reg'])){
				$dt=arrayPost();
				$dt['finAnoEscolar'] = $dt['inicioAnoEscolar'] +1;
				if(verifTbAnoEsc($dt) == 0){
					regAnoEsc($dt);
				}else{
					?><script language="Javascript" type="text/javascript">
						window.location.href='S1OP2.php';
						var msg1 = 'El Año Introducido ya esta Registrada';
						var msg2 = 'Por Favor Verifique y Intente de nuevo';
						window.alert(msg1+'\n'+msg2);</script><?php
				}
			}
		}
		
		
		if($pg== 'S1OP2MDF'){
			$dtAE=queryTbAnoEsc($_GET['idAE']);
			if(isset($_POST['S1OP2Mof'])){
				$dt=arrayPost();
				$dt['finAnoEscolar'] = $dt['inicioAnoEscolar'] +1;
				$dt['idAE'] = $_GET['idAE'];
				if(verifTbAnoEsc($dt) == 0){
					modfAnoEsc($dt);
				}else{
					?><script language="Javascript" type="text/javascript">
						window.location.href='S1OP2.php';
						var msg1 = 'El Año Introducido ya esta Registrada';
						var msg2 = 'Por Favor Verifique y Intente de nuevo';
						window.alert(msg1+'\n'+msg2);</script><?php
				}
			}
		}
		
		if($pg == 'S1OP3'){
			$PlanEst=listPlanEst();
		}
		
		if($pg== 'S1OP3MDF'){
			$dtPE=queryTbPlanEst($_GET['idPE']);
			if(isset($_POST['S1OP3Mof'])){
				$dt=arrayPost();
				$dt['idPE'] = $_GET['idPE'];
				modfPlanEst($dt);
			}
		}
		
		if($pg == 'S1OP4'){
			$Asig = listAsign();
		}
		
		if($pg == 'S1OP4MDF'){
			$dtAsig=queryTbAsign($_GET['idAsg']);
			if(isset($_POST['S1OP4Mof'])){
				$dt=arrayPost();
				$dt['idAsg']= $_GET['idAsg'];
				modfAsign($dt);
			}
		}
		
		if($pg == 'S1OP6'){
			$dtPernl = listPernl();
			$dtCargo = listCargo();
			if(isset($_POST['S1OP6Reg'])){
				$dt=arrayPost();
				$dt['ciPersonal']=$dt['Nac'].$dt['numCi'];
				regPernl($dt);
			}
		}
		
		if($pg == 'S1OP6MDF'){
			$dtPrenl = queryTbPernsl($_GET['idPers']);
			$ci = $dtPrenl['ciPersonal'];
			$nCi = strlen ($ci);
			if($ci != ''){
 				if(substr($ci,0,1) == 'V'){$Ns = 'V'; $Nn = 'E';}else{$Ns = 'E'; $Nn = 'V';}}
			else{$Ns = ''; $Nn = '';}
			if(isset($_POST['S1OP6Mof'])){
				$dt=arrayPost();
				$dt['ciPersonal']=$dt['Nac'].$dt['numCi'];
				$dt['idPersnl']= $_GET['idPers'];
				modfPersnl($dt);
			}
		}
		
		if($pg == 'S2OP1'){
			if(isset($_POST['CSLTCi'])){
				$display = 'none';
				$ci =$_POST['Nac'].$_POST['numCi'];
				if(tbRows(consultEstud($ci)) == 0)
				{ header ('Location: S2OP1RE.php?Nac='.$_POST['Nac'].'&Ci='.$_POST['numCi']); }
				else{ header ('Location: S2OP1RM.php?Ci='.$ci);}
			}
		}
		
		if($pg == 'S2OP1RE'){
			$EntFed = tbEntFed();
			$sex = sexo();
			if(isset($_POST['S2OP1RE'])){
				$dt=arrayPost();
				$dt['ciEstudiante']= $_POST['RNac'].$_POST['RnumCi'];
				regEstudiant($dt);
			}
		}
		
		if($pg == 'S2OP1RM'){
			$datEst= tbArray(consultEstud($_GET['Ci']));
			$Escldd = listEscolaridad();
			$listGrad= listGrad();
			$listSecc= listSecc();
			$consultEst=consultMatricla($ae['idAnoEscolar'],$_GET['Ci']);
			if(tbrows($consultEst) == 0){
				$idG=0;
				$idS=0;
				$idE=0;
			}else{
				$array= tbArray($consultEst);
				$idG=$array['idGrado'];
				$idS=$array['idSeccion'];
				$idE=$array['idEscolaridad'];
			}
			if(isset($_POST['S2OP1RM'])){
				$dt=arrayPost();
				$dt['idAnoEscolar'] = $ae['idAnoEscolar'];
				if($_POST['idGrado'] ==1 and $dt['idEscolaridad'] == 3){
					?><script>alert('Primer año no Registra \nla escorlaridad de materia pendiente ');</script><?php }else{
				regMatricla($dt); }
				if($_POST['idEscolaridad'] == 1){
				regTbNotaReg($dt); insst($dt);}
				if($dt['idEscolaridad'] == 2){
					header('Location: S2OP1RS.php?idGrad='.$_POST['idGrado'].
												'&idSecc='.$_POST['idSeccion'].
												'&idEscoldd='.$_POST['idEscolaridad'].
												'&ciEstdd='.$datEst['ciEstudiante']);		
				}
				if($dt['idEscolaridad'] == 3 and $_POST['idGrado'] > 1){
					header('Location: S2OP1RS.php?idGrad='.$_POST['idGrado'].
												'&idSecc='.$_POST['idSeccion'].
												'&idEscoldd='.$_POST['idEscolaridad'].
												'&ciEstdd='.$datEst['ciEstudiante']);
				}
			}
		}
		
		if($pg == 'S2OP1RS'){
			$datEst= tbArray(consultEstud($_GET['ciEstdd']));
			$dtPEA=tbPlanEstAsign($_GET['idGrad']);
			$id = $_GET['idGrad']-1;
			$listAsign=listSelectAsign($id);
			$n = 1;
			$j= 1;
			if(isset($_POST['S2OP1RSR'])){
				$idAe 	= $ae['idAnoEscolar'];
				$ciEst 	= $_GET['ciEstdd'];
				$idGrad	= $_GET['idGrad'];
				$con = dbCon();
				for($i=1;$i != $dtPEA[0]; $i++){
					if(isset($_POST['A'.$i])){
						$idAsign = $_POST['A'.$i];
						$dtAsign=queryTbAsign($_POST['A'.$i]);
						$AsignNam=$dtAsign['nombreAsignatura'];
						$sql="INSERT INTO notaestudiantes 
						(idAnoEscolar, ciEstudiante, idGrdAsig, idAsigGrd, nombAsign)
								VALUES ('".$idAe."',
										'".$ciEst."',
										'".$idGrad."',
										'".$idAsign."',
										'".$AsignNam."')";
						Query($con,$sql);
						
						$sql= "INSERT INTO insstestudiante (idAnoEscolar, idGrad, ciEstidante, idAsignatura) 
											VALUES ('".$idAe."', 
													'".$idGrad."', 
													'".$ciEst."', 
													'".$idAsign."')";
						Query($con,$sql);
						
					}
					
				}
				affected($con);
				?><script>window.location="S2OP1.php";</script><?php		
			}
			
			if(isset($_POST['S2OP1RSMP'])){
				$idAe 	= $ae['idAnoEscolar'];
				$ciEst 	= $_GET['ciEstdd'];
				$idGradA= $_GET['idGrad']-1;
				$diAsg1 = $_POST['MP1'];
				$diAsg2 = $_POST['MP2'];
				regMatPend($idAe,$ciEst,$diAsg1,$diAsg2,$idGradA);
				$dt=arrayPost();
				$dt['idAnoEscolar']=$ae['idAnoEscolar'];
				$dt['idGrado']=$_GET['idGrad'];
				$dt['ciEstdd']=$_GET['ciEstdd'];
				regTbNotaReg($dt);
			}
			
		}
		
		if($pg == 'S2OP2'){
			if(isset($_POST['CSLTCi'])){
				$display = 'none';
				$ci =$_POST['Nac'].$_POST['numCi'];
				if(tbRows(consultEstud($ci)) == 0){
					?><script>alert('El Estudiante no se encuentra Registrado');
            		window.location="S2OP2.php";</script><?php
				}else{ header('Location: S2OP2M.php?ci='.$ci); }
			}
		}
		
		if($pg == 'S2OP2M'){
			$infEst=infoEstud($_GET['ci']);
			$ci = $infEst['ciEst'];
			$nchCi = strlen ($ci);
			$EntFed = tbEntFed();
			$sex = sexo();
			$esc = tbEscldd();
			$grad=tbGrad();
			$secc=tbSecc();
			$nCi=substr($ci,1,$nchCi);
			if($ci != ''){
 				if(substr($ci,0,1) == 'V'){$Ns = 'V'; $Nn = 'E';}else{$Ns = 'E'; $Nn = 'V';}}
			else{$Ns = ''; $Nn = '';}
			
			if(isset($_POST['S2OP2Modf'])){
				$dt=arrayPost();
				$dt['ciEstudiante']= $_POST['RNac'].$_POST['RnumCi'];
				$dt['idEstudiante']=$_GET['ci'];
				$dt['idAnoEscolar'] = $ae['idAnoEscolar'];
				$modfMatr=modfMatricl($dt);
				$modfEst=modfEstud($dt);
				if($modfMatr == true or $modfEst == true){
				?><script>window.alert('El Registro se guardo Correctamente');
				window.location="S2OP2.php";</script><?php 
				}else{
				?><script>window.alert('El registro no fue insertado');
				window.location="S2OP2.php";</script><?php 
				}
			}
		}
		
		if($pg == 'S2OP3'){
			$Qsecc=tbSecc();
			$Qgrad=tbGrad();
			if(isset($_POST['sbt'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_POST['idGrado'],
						  'idSeccion'		=> $_POST['idSeccion']);
							  						
				if(mysqli_num_rows(tbMatricl($dt))!=0){
				?><script>
            	var Grad = "<?php echo $_POST['idGrado']?>";
				var Secc = "<?php echo $_POST['idSeccion']?>";
				var Laps = "<?php echo $_POST['idLapso']?>";
				var url ="S2OP3R.php?idGrad="+Grad+"&idSecc="+Secc+"&idLaps="+Laps;
				window.open(url);
            	</script><?php }else{ ?>
				<script>alert('Matricula Vacia')</script>
				<?php }
			}
		}	
		
		if($pg == 'S2OP3R'){
			if(isset($_GET['idGrad']) and isset($_GET['idSecc']) and isset($_GET['idLaps'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_GET['idGrad'],
						  'idSeccion'		=> $_GET['idSecc']);}
				$Matricl=tbMatricl($dt);
				$dtPlantel=tbPlantel(); 
			}
		
		if($pg == 'S2OP4'){
			$Qsecc=tbSecc();
			$Qgrad=tbGrad();
			if(isset($_POST['sbt'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_POST['idGrado'],
						  'idSeccion'		=> $_POST['idSeccion']);
							  						
				if(mysqli_num_rows(tbMatricl($dt))!=0){
					header('Location: S2OP4R.php?idGrad='.$_POST['idGrado'].'&idSecc='.$_POST['idSeccion'].'&idLaps='.$_POST['idLapso']);
				 }else{ ?>
				<script>alert('Matricula Vacia')</script>
				<?php }
			}
		}
		
		if($pg == 'S2OP4R'){
			if(isset($_GET['idGrad']) and isset($_GET['idSecc']) and isset($_GET['idLaps'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_GET['idGrad'],
						  'idSeccion'		=> $_GET['idSecc']);
						  
				if($_GET['idLaps']==1){$lapss = 'notaLapso1';}
					else{if($_GET['idLaps']==2){$lapss = 'notaLapso2';}
					else{$lapss = 'notaLapso3';}}
			}
				$n=1;		  
				$Matricl=tbMatricl($dt);
				$rowsA=rowsTbAsign($_GET['idGrad']);
				if(isset($_POST['S2OP4Rreg'])){
					$dt=arrayPost();
					
					if($dt['idLaps']==1){$laps = 'insstLapso1';}
					else{if($dt['idLaps']==2){$laps = 'insstLapso2';}
					else{$laps = 'insstLapso3';}}
					$con = dbCon();
					for($j=1; $j != $dt['nEst']; $j++){
						$sql = "SELECT * FROM insstestudiante WHERE idAnoEscolar = '".$ae['idAnoEscolar']."'
															  AND ciEstidante = '".$dt['Est'.$j]."'";
						$query=tbQuery($sql);
						while($array = mysqli_fetch_array($query)){
							$sql = "UPDATE insstestudiante SET ".$laps." = '".$dt[$array['id']]."' 
				WHERE id = '".$array['id']."'";
							
							Query($con,$sql);
						}
					}
					affected($con);
					?><script>window.location="S3OP4.php";</script><?php 
				}
		}
		
		if($pg == 'S2OP5'){
			$Qsecc=tbSecc();
			$Qgrad=tbGrad();
			if(isset($_POST['sbt'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_POST['idGrado'],
						  'idSeccion'		=> $_POST['idSeccion']);
							  						
				if(mysqli_num_rows(tbMatricl($dt))!=0){
				?><script>
            	var Grad = "<?php echo $_POST['idGrado']?>";
				var Secc = "<?php echo $_POST['idSeccion']?>";
				var url ="S2OP5R.php?idGrad="+Grad+"&idSecc="+Secc;
				window.open(url);
            	</script><?php }else{ ?>
				<script>alert('Matricula Vacia')</script>
				<?php }
			}
		}
		
		if($pg == 'S2OP5R'){
			if(isset($_GET['idGrad']) and isset($_GET['idSecc'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_GET['idGrad'],
						  'idSeccion'		=> $_GET['idSecc']);}
				$Matricl=tbMatricl($dt);
				$rowsA=rowsTbAsign($_GET['idGrad']);
				$dtPlantel=tbPlantel(); 
		}
		
		
		
		if($pg == 'S3OP1'){
			$Qsecc=tbSecc();
			$Qgrad=tbGrad();
			if(isset($_POST['sbt'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_POST['idGrado'],
						  'idSeccion'		=> $_POST['idSeccion']);
							  						
				if(mysqli_num_rows(tbMatricl($dt))!=0){
					header('Location: S3OP1R.php?idGrad='.$_POST['idGrado'].'&idSecc='.$_POST['idSeccion'].'&idLaps='.$_POST['idLapso']);
				}else{ ?>
				<script>alert('Matricula Vacia')</script>
				<?php }
			}
		}
		
		if($pg == 'S3OP1R'){
			if(isset($_GET['idGrad']) and isset($_GET['idSecc']) and isset($_GET['idLaps'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_GET['idGrad'],
						  'idSeccion'		=> $_GET['idSecc']);
						  
				if($_GET['idLaps']==1){$lapss = 'notaLapso1';}
					else{if($_GET['idLaps']==2){$lapss = 'notaLapso2';}
					else{$lapss = 'notaLapso3';}}
			}
				$n=1;		  
				$Matricl=tbMatricl($dt);
				$rowsA=rowsTbAsign($_GET['idGrad']);
				if(isset($_POST['S3OP1Rreg'])){
					$dt=arrayPost();
					
					if($dt['idLaps']==1){$laps = 'notaLapso1';}
					else{if($dt['idLaps']==2){$laps = 'notaLapso2';}
					else{$laps = 'notaLapso3';}}
					$con = dbCon();
					for($j=1; $j != $dt['nEst']; $j++){
						$sql = "SELECT * FROM notaestudiantes WHERE idAnoEscolar = '".$ae['idAnoEscolar']."'
															  AND ciEstudiante = '".$dt['Est'.$j]."'";
						$query=tbQuery($sql);
						while($array = mysqli_fetch_array($query)){
							$sql = "UPDATE notaestudiantes SET ".$laps." = '".$dt[$array['id']]."' 
				WHERE id = '".$array['id']."'";
							
							Query($con,$sql);
							
								$promd = ($array['notaLapso1']+$array['notaLapso2']+$dt[$array['id']])/3;
								$sql = "UPDATE notaestudiantes SET promedioNotas = '".$promd."' 
										WHERE id = '".$array['id']."'";
								Query($con,$sql);
						}
					}
					affected($con);
					?><script>window.location="S3OP1.php";</script><?php 
				}
		}
		
		if($pg == 'S3OP2'){
			$Qsecc=tbSecc();
			$Qgrad=tbGrad();
			if(isset($_POST['sbt'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_POST['idGrado'],
						  'idSeccion'		=> $_POST['idSeccion']);
							  						
				if(mysqli_num_rows(tbMatricl($dt))!=0){
				?><script>
            	var Grad = "<?php echo $_POST['idGrado']?>";
				var Secc = "<?php echo $_POST['idSeccion']?>";
				var Laps = "<?php echo $_POST['idLapso']?>";
				var url ="S3OP2R.php?idGrad="+Grad+"&idSecc="+Secc+"&idLaps="+Laps;
				window.open(url);
            	</script><?php }else{ ?>
				<script>alert('Matricula Vacia')</script>
				<?php }
			}
		}
		
		if($pg == 'S3OP2R'){
			if(isset($_GET['idGrad']) and isset($_GET['idSecc']) and isset($_GET['idLaps'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_GET['idGrad'],
						  'idSeccion'		=> $_GET['idSecc']);}
				$Matricl=tbMatricl($dt);
				$rowsA=rowsTbAsign($_GET['idGrad']);
				$dtPlantel=tbPlantel(); 
			}
		
		
		if($pg == 'S3OP3'){
			$Qsecc=tbSecc();
			$Qgrad=tbGrad();
			if(isset($_POST['sbt'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_POST['idGrado'],
						  'idSeccion'		=> $_POST['idSeccion']);
							  						
				if(mysqli_num_rows(tbMatricl($dt))!=0){
				?><script>
            	var Grad = "<?php echo $_POST['idGrado']?>";
				var Secc = "<?php echo $_POST['idSeccion']?>";
				var Laps = "<?php echo $_POST['idLapso']?>";
				var url ="S3OP3R.php?idGrad="+Grad+"&idSecc="+Secc+"&idLaps="+Laps;
				window.open(url);
            	</script><?php }else{ ?>
				<script>alert('Matricula Vacia')</script>
				<?php }
			}
		}
			
		if($pg == 'S3OP3R'){
			if(isset($_GET['idGrad']) and isset($_GET['idSecc']) and isset($_GET['idLaps'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_GET['idGrad'],
						  'idSeccion'		=> $_GET['idSecc']);}
				$Matricl=tbMatricl($dt);
				$dtPlantel=tbPlantel(); 
				$rowsA=rowsTbAsign($_GET['idGrad']);
			}
		
		
		if($pg == 'S3OP4RP'){
			$Qsecc=tbSecc();
			$Qgrad=tbGrad();
			if(isset($_POST['sbt'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_POST['idGrado']);
							  						
				if(mysqli_num_rows(tbMatriclMP($dt))!=0){
				?><script>
            	var Grad = "<?php echo $_POST['idGrado']?>";
				var url ="S3OP4RPR.php?idGrad="+Grad;
				window.open(url);
            	</script><?php }else{ ?>
				<script>alert('Matricula Vacia')</script>
				<?php }					   
			}
		}
							
		if($pg == 'S3OP4RPR'){
			/*
			if(isset($_GET['idGrad']) and isset($_GET['idSecc'])){
				$dt=array('idAnoEscolar'	=> $ae['idAnoEscolar'],
						  'idGrado' 		=> $_GET['idGrad'],
						  'idSeccion'		=> $_GET['idSecc']);}
				//$Matricl=tbMatricl($dt);
				$rowsA=rowsTbAsign($_GET['idGrad']);
				$dtPlantel=tbPlantel(); */
			}
		
		
		if($pg == 'S3OP4RN'){
			$n=1;
			$listMP=consultMP($ae['idAnoEscolar']);
			if(isset($_POST['regS3OP4RN'])){
				$dt=arrayPost();
				if($dt['idLaps']==1){$laps = 'rMPNotaLapso1';}
				else{if($dt['idLaps']==2){$laps = 'rMPNotaLapso2';}
				else{$laps = 'rMPNotaLapso3';}}
				$con = dbCon();
				for($j=1; $j != $dt['nEst']; $j++){
					$sql = "SELECT * FROM repitiente_materiapendient WHERE ciEstidante = '".$dt['Est'.$j]."'";
					$query=tbQuery($sql);
					while($array = mysqli_fetch_array($query)){
						$sql = "UPDATE repitiente_materiapendient SET ".$laps." = '".$dt[$array['id']]."' 
				WHERE id = '".$array['id']."'";
						Query($con,$sql);
						
						$promd = ($array['rMPNotaLapso1']+$array['rMPNotaLapso2']+$dt[$array['id']])/3;
						$sql = "UPDATE repitiente_materiapendient SET rMPPromedioNotas = '".$promd."' 
										WHERE id = '".$array['id']."'";
						Query($con,$sql);
						
						if($dt['idLaps'] == 3){
							//colocar para que se replance automaticamente en la tabla notas
						}
					}
				}
				affected($con);
				?><script>window.location="S3OP4.php";</script><?php 
			}
		}
		
		if($pg == 'S6OP2'){
			$n = 1;
			$con = dbCon();
			$listUsu = tbUsuario();
			if(isset($_POST['rCancl'])){ header('Location: S6OP2.php');}
			
			if(isset($_POST['S1OP2Reg'])){
				if($_POST['cUse'] == $_POST['cVerf']){
						$sql = "INSERT INTO usuario (nUsuario, cUsuario, nvlUsuario`) 
								VALUES ('".$_POST['nUsu']."', '".md5($_POST['cUse'])."', '3');";
						Query($con,$sql);
						affected($con);
						?><script>window.location="S6OP2.php";</script><?php 
					}else{
						?>
						<script>
                        alert('La Contraseña con coincide \nVerifique e Intente de nuevo');
                        window.location="S6OP2.php";</script>
                        <?php 
					}
			}
			
			if(isset($_GET['idUsMdf'])){$dtUs=consltUsuario($_GET['idUsMdf']);}
			if(isset($_GET['idUsElm'])){$dtUs=consltUsuario($_GET['idUsElm']);}
			if(isset($_POST['S6OP2modif'])){
				if($dtUs['cUsuario']==md5($_POST['cActl'])){
					if($_POST['cNuev'] == $_POST['cVerf']){
						$sql = "UPDATE usuario SET cUsuario = '".md5($_POST['cNuev'])."' 
													WHERE idusuario = '".$_GET['idUsMdf']."' ";
						Query($con,$sql);
						affected($con);
						?><script>window.location="S6OP2.php";</script><?php 
					}else{
						?>
						<script>
                        var url = "<?php echo $_GET['idUsMdf']; ?>";
                        alert('La nueva Contraseña con coincide \nVerifique e Intente de nuevo');
                        window.location="S6OP2.php?idUsMdf="+url;</script>
                        <?php 
					}
				}else{
					?>
					<script>
					var url = "<?php echo $_GET['idUsMdf']; ?>";
					alert('Error la Contraseña Actual \nVerifique e Intente de nuevo');
					window.location="S6OP2.php?idUsMdf="+url;</script>
					<?php 
				}
			}
			
			if(isset($_POST['S6OP2elim'])){
				$sql = "DELETE FROM usuario WHERE idusuario = '".$_GET['idUsElm']."'";
				Query($con,$sql);
				if (mysqli_affected_rows($con) == -1){
		    		?><script>alert('Ud. debe tener un error en su sql');</script><?php }
			
				if (mysqli_affected_rows($con) > 0){
					$subio = false; 
					?><script>alert('El Registro se elimino Correctamente');
                    window.location="S6OP2.php";</script><?php }
				else {
					$subio = false; 
					?><script>alert('El registro no fue eliminado');
                    window.location="S6OP2.php";</script><?php }
				}
		}
		
		if($pg == 'S6OP3'){
			if(isset($_POST['rCcopia'])){
				header('Location: export.php');
			}
			
			if(isset($_POST['cargArch'])){
				//header('Location: ../views/import.php');
				/*
				if ($_FILES['archivo']['name']){
					if ($_FILES['archivo']['type']=="application/octet-stream"){ 
						$destin="../protected/bd/sare.sql";
						if (is_uploaded_file($_FILES['archivo']['tmp_name'])){
							if (move_uploaded_file($_FILES['archivo']['tmp_name'], $destin))
							{ ?><script>alert('El Archivo Subir sin problemas');</script><?php $subio = true;} 
						}
					}
					else{ $subio = false;
					?><script>alert('Error al subir el Archivo \nPor favor selecione el archivo de respaldo');
                    window.location="S6OP3.php";</script><?php }
				}
				else{$subio = false;
					?><script>alert('Error Al Subir \nPor favor selecione el archivo');
                    window.location="S6OP3.php";</script><?php }
	/*				
				if($subio==true){
					$con = dbCon();
					$usuario='root';
					$passwd='';
					$mydb='sare';
					mysql_query($con,"drop database ".$mydb); 
      				//$crear = @mysql_query ("CREATE DATABASE $mydb"); 
					if (! mysql_query ("CREATE DATABASE $mydb")){?><script>alert('La base de datos se ya se encuatra creada');
                    window.location="S6OP3.php";</script><?php }else{
						$arch="../protected/bd/sare.sql";
						
						$cbz='C:\xampp\mysql\bin\mysqldump.exe ';
						$sql = "-u $usuario --password=$passwd --opt $mydb < $arch";
						
						$executa=$cbz.$sql;
						system($executa, $resultado); 
						if ($resultado==0) { 
						?><script>alert('La base de datos se restauro correctamente');
                    window.location="S6OP3.php";</script><?php
						}else{
							mysql_query("drop database ".$mydb, $con);
					?><script>alert('La base de datos no se restauro correctamente');
                    window.location="S6OP3.php";</script><?php						}
						
					}
				} */
			}
		}
		
	}	
?>