<?php

require('fpdf/fpdf.php');
require_once('../protected/controlUnit.php');

logged();

$h=0.42; 
$w=0.53;

//$tmH = ($h*50)+($h*mysqli_num_rows($Matricl));

$pdf=new FPDF('P','cm','Letter');
$pdf->SetMargins(1, 1 , 3);
$pdf->SetAutoPageBreak(true,1); 
$pdf->AliasNbPages();

while($dtMatricl = mysqli_fetch_array($Matricl)){
	$dtEst=tbArray(consultEstud($dtMatricl['ciEstudiante']));
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(3, $h,'', 0);
	$pdf->Cell(0, $h, utf8_decode("República Bolivariana de Venezuela"), 0);
	$pdf->Ln($h);
	$pdf->Cell(3, $h,'', 0);
	$pdf->Cell(5, $h, utf8_decode('Ministerio de Educación del Poder Popular para la Educación'), 0);
	$pdf->Ln($h);
	$pdf->Cell(3, $h,'', 0);
	$pdf->Cell(0, $h, 'DEPENDENCIA', 0);
	$pdf->Ln($h);
	$pdf->Cell(3, $h,'', 0);
	$pdf->SetFont('Arial', 'BI', 12);
	$pdf->Cell(10, $h, $dtPlantel['nombrePlant'], 0);
	$pdf->SetFont('Arial', 'BI', 16);
	$pdf->Ln($h);
	$pdf->Cell(3, $h,'', 0);
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0, $h, utf8_decode('Ejido. Estado '.idtfEntFedpdf($dtPlantel['idEntidaFederal'])), 0);
	$pdf->Ln($h);
	$pdf->Cell(3, $h,'', 0);
	$pdf->Cell(2.2, $h, utf8_decode('Cód. Plantel:'), 0);
	$pdf->Cell(2, $h,$dtPlantel['codigoDEA'], 0);
	$pdf->Ln($h+0.5);
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Cell(0, $h,'BOLETIN INFORMATIVO', 0,0,'C');
	$pdf->Ln($h+0.5);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(0, $h,utf8_decode('Identificación del Alumno'), 0);
	$pdf->Ln($h);
	$pdf->Cell($w*3,$h, 'Apellidos:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell($w*11, $h, $dtEst['apellidosEst'], 'B');
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell($w*3,$h, 'Nombres :', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell($w*11, $h, $dtEst['nombresEst'], 'B');
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell($w*3,$h, utf8_decode('Cédula:'), 0,0,'R');
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell($w*5, $h, $dtMatricl['ciEstudiante'], 'B');
	$pdf->Ln($h+0.1);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell($w*4, $h, utf8_decode('Año Escolar:'), 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell($w*5, $h,anoEscpdf($ae['idAnoEscolar']), 'B');
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell($w*5, $h, utf8_decode('Grado o Año:'), 0,0,'R');
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell($w*11, $h,utf8_decode(gradpdf($_GET['idGrad'])), 'B');
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell($w*3, $h, utf8_decode('Sección:'), 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell($w, $h,'"'.seccnpdf($_GET['idSecc']).'"', 'B');
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell($w*3, $h, utf8_decode('Período'), 0,0,'R');
	$pdf->SetFont('Arial', '', 6);
	$pdf->Cell($w*4, $h, lapspdf($_GET['idLaps']), 'B');
	$pdf->Ln($h+0.5);

	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(0, $h,'Calificaciones', 0);

	$pdf->Ln($h);
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell($w*18, $h*2, 'Asignaturas', 1,0,'C');
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell($w*4, $h, '1er Lapso', 'TBR',0,'C');
	$pdf->Cell($w*4, $h, '2do Lapso', 'TBR',0,'C');
	$pdf->Cell($w*4, $h, '3ro Lapso', 'TBR',0,'C');
	$pdf->Cell($w*2, $h,'Def.' ,'TR',0,'C');
	$pdf->Cell($w*4, $h, 'Inasistencia', 'TBR',0,'C');
	$pdf->Ln($h);
	$pdf->Cell($w*18, $h, '', 0,0,'C');
	for($i=0;$i!=3;$i++){
		$pdf->Cell($w*2, $h, 'Cal.', 'BR',0,'C');
		$pdf->Cell($w*2, $h, 'Inas.', 'BR',0,'C');}
	$pdf->Cell($w*2, $h,'Anual' ,'BR',0,'C');
	$pdf->Cell($w*2, $h, 'Acum', 'BR',0,'C');
	$pdf->Cell($w*2, $h, '25%', 'BR',0,'C');
	$pdf->Ln($h);
	
	$tprom1 = 0;
	$tprom2 = 0;
	$tprom3 = 0;
	$aprom = 0;
	$npromt=0;
	$pdf->SetFont('Arial', '', 8);
	for($i=1; $i != $rowsA[0]; $i++){
		$prom=0;
		$sql = "SELECT * FROM notaestudiantes WHERE idAnoEscolar = '".$ae['idAnoEscolar']."'
													AND ciEstudiante = '".$dtMatricl['ciEstudiante']."' 
													AND idGrdAsig = '".$_GET['idGrad']."'
													AND idAsigGrd = '".$rowsA[$i]."'";
		$query = tbQuery($sql);
		$array =mysqli_fetch_array($query);
		
		if($array['notaLapso1']==''){$nLap1='**';}else{$nLap1=$array['notaLapso1']; $nLap=1;}
		if($array['notaLapso2']==''){$nLap2='**';}else{$nLap2=$array['notaLapso2']; $nLap=2;}
		if($array['notaLapso3']==''){$nLap3='**';}else{$nLap2=$array['notaLapso3']; $nLap=3;}
		
		$prom= $array['notaLapso1'] + $array['notaLapso2'] + $array['notaLapso3'];
		
		$sqlNa= "SELECT * FROM asignatura WHERE idAsignatura = '".$rowsA[$i]."'";
		$queryNA = tbQuery($sqlNa);
		$arrayNA =mysqli_fetch_array($queryNA);
		$pdf->SetFont('Arial', '', 10);
		if($arrayNA['educT']!=1){
			$pdf->Cell($w*18, $h, $arrayNA['nombreAsignatura'], 'LBR',0,'L');
			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell($w*2, $h, $nLap1, 'BR',0,'C');
			$pdf->Cell($w*2, $h, '', 'BR',0,'C');
			$pdf->Cell($w*2, $h, $nLap2, 'BR',0,'C');
			$pdf->Cell($w*2, $h, '', 'BR',0,'C');
			$pdf->Cell($w*2, $h, $nLap3, 'BR',0,'C');
			$pdf->Cell($w*2, $h, '', 'BR',0,'C');
			$pdf->Cell($w*2, $h, round(($prom/$nLap),1), 'BR',0,'C');
			$pdf->Cell($w*2, $h, '', 'BR',0,'C');
			$pdf->Cell($w*2, $h, '', 'BR',0,'C');
			$pdf->Ln($h);
			$npromt++;
		$tprom1 = $tprom1 + $nLap1;
		$tprom2 = $tprom2 + $nLap2;
		$tprom3 = $tprom3 + $nLap3;
		$aprom = $aprom + round(($prom/$nLap),1);
		}
	
	}
	
	

	$pdf->SetFont('Arial', '', 8);

	$pdf->Ln($h/2);
	$pdf->Cell($w*18, $h, 'Promedios / Totales', 0,0,'R');
	$pdf->Cell($w*2, $h, round(($tprom1/$npromt),1), 1,0,'C');
	$pdf->Cell($w*2, $h, '', 'TBR',0,'C');
	$pdf->Cell($w*2, $h, round(($tprom2/$npromt),1), 'TBR',0,'C');
	$pdf->Cell($w*2, $h, '', 'TBR',0,'C');
	$pdf->Cell($w*2, $h, round(($tprom3/$npromt),1), 'TBR',0,'C');
	$pdf->Cell($w*2, $h, '', 'TBR',0,'C');
	$pdf->Cell($w*2, $h, round(($aprom/$npromt),1),'TBR',0,'C');
	$pdf->Cell($w*2, $h, '', 'TBR',0,'C');



	$pdf->Ln($h*2);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(0, $h,utf8_decode('Programas de Educación para el Trabajo'), 0);
	$pdf->Ln($h);
	$pdf->SetFont('Arial', '', 8);
	for($i=1; $i != $rowsA[0]; $i++){
		$sql = "SELECT * FROM notaestudiantes WHERE idAnoEscolar = '".$ae['idAnoEscolar']."'
													AND ciEstudiante = '".$dtMatricl['ciEstudiante']."' 
													AND idGrdAsig = '".$_GET['idGrad']."'
													AND idAsigGrd = '".$rowsA[$i]."'";
		$query = tbQuery($sql);
		$array =mysqli_fetch_array($query);
		
		$sqlNa= "SELECT * FROM asignatura WHERE idAsignatura = '".$rowsA[$i]."'";
		$queryNA = tbQuery($sqlNa);
		$arrayNA =mysqli_fetch_array($queryNA);
	
	if($arrayNA['educT']==1){
		
		if($array['notaLapso1']==''){$nLap1='**';}else{$nLap1=$array['notaLapso1']; $nLap=1;}
		if($array['notaLapso2']==''){$nLap2='**';}else{$nLap2=$array['notaLapso2']; $nLap=2;}
		if($array['notaLapso3']==''){$nLap3='**';}else{$nLap2=$array['notaLapso3']; $nLap=3;}
		
		$prom= $array['notaLapso1'] + $array['notaLapso2'] + $array['notaLapso3'];
		
		$pdf->Cell($w*18, $h, $arrayNA['nombreAsignatura'], 1,0,'L');
		$pdf->Cell($w*4, $h, $nLap1, 'TBR',0,'C');
		$pdf->Cell($w*4, $h, $nLap2, 'TBR',0,'C');
		$pdf->Cell($w*4, $h, $nLap3, 'TBR',0,'C');
		$pdf->Cell($w*2, $h, $prom,'TBR',0,'C');
	$pdf->Ln($h);}}


	$pdf->Ln($h+.2);
	$pdf->SetFont('Arial', 'B', 8);

	$pdf->Cell($w*18, $h, 'Asignatura Pendiente / quedada', 1,0,'C');
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell($w*4, $h, '1er Mom', 'TBR',0,'C');
	$pdf->Cell($w*4, $h, '2do Mom', 'TBR',0,'C');
	$pdf->Cell($w*4, $h, '3er Mom', 'TBR',0,'C');
	$pdf->Cell($w*4, $h,'4to Mom' ,'TBR',0,'C');
	$pdf->Ln($h);
	$pdf->Cell($w*18, $h, '', 1,0,'C');
	$pdf->Cell($w*4, $h, '', 'BR',0,'C');
	$pdf->Cell($w*4, $h, '', 'BR',0,'C');
	$pdf->Cell($w*4, $h, '', 'BR',0,'C');
	$pdf->Cell($w*4, $h, '' ,'BR',0,'C');
	



	$pdf->Ln($h+.3);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(0, $h,'Observaciones', 0);
	$pdf->Ln($h);
	$pdf->Cell($w*36, $h, '', 'TLR');
	$pdf->Ln($h);
	$pdf->MultiCell($w*36, $h, '', 'LR');
	$pdf->Ln(0);
	$pdf->Cell($w*36, $h, '', 'BLR');

	$pdf->SetY(-2.8);
	$pdf->Cell($w*6, $h, utf8_decode('Fecha de Emisión: '), 0);
	$pdf->Cell($w*7, $h, datepdf(), 0);
	$pdf->Cell($w*12, $h, utf8_decode('Código de Validación:'), 0,0,'R');
	$pdf->Cell(0, $h, '', 'B');
	$pdf->Ln($h);
	$pdf->Cell($w*36, $h, utf8_decode('Sello de la Institución'), 0,0,'C');

}
	ob_end_clean();
	$pdf->Output('Matricula Inicial','I');
?>