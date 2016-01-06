<?php

require('fpdf/fpdf.php');
require_once('../protected/controlUnit.php');

$h=0.44; 
$f=8;
$w=0.5;

//$tmH = ($h*50)+($h*mysqli_num_rows($Matricl));

$pdf=new FPDF('P','cm','Letter');
$pdf->SetMargins(0.5, 0.5 , 0.5);
$pdf->SetAutoPageBreak(true,0.5); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, $h, utf8_decode("República Bolivariana de Venezuela"), 0);
$pdf->Ln($h);
$pdf->Cell(5, $h, utf8_decode('Ministerio de Educación del Poder Popular para la Educación'), 0);
$pdf->Ln($h);
$pdf->Cell(0, $h, 'DEPENDENCIA', 0);
$pdf->SetFont('Arial', 'BI', 16);
$pdf->Cell(0, $h, 'Listado de Calificaciones', 0,0,'R');
$pdf->Ln($h);
$pdf->SetFont('Arial', 'BI', 14);
$pdf->Cell(10, $h, $dtPlantel['nombrePlant'], 0);
$pdf->SetFont('Arial', 'BI', 16);
$pdf->Cell(0, $h, 'Materia Pendiente', 0,0,'R');
$pdf->Ln($h);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, $h, utf8_decode('Ejido. Estado '.idtfEntFedpdf($dtPlantel['idEntidaFederal'])), 0);
$pdf->Ln($h);
$pdf->Cell(2.7, $h, utf8_decode('Cód. Plantel:'), 0);
$pdf->Cell(2, $h,$dtPlantel['codigoDEA'], 0);
$pdf->Ln($h);
$pdf->SetFont('Arial', 'i', 10);
$pdf->Cell(2, $h, utf8_decode('Año Escolar:'), 0);
$pdf->Cell(2, $h, '', 0);
$pdf->Cell(3, $h, utf8_decode('Grado o Año:'), 0);
$pdf->Cell(3, $h, utf8_decode('Sección:'), 0);
$pdf->Cell(2, $h, utf8_decode('Mención:'), 0);
$pdf->Cell(2, $h, '', 0);
$pdf->Cell(3, $h, utf8_decode('Cód / Plan:'), 0);
$pdf->Cell(2, $h, utf8_decode('Lapso / Tipo Eval.'), 0);


$pdf->Ln($h);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, $h,anoEscpdf($ae['idAnoEscolar']), 0);
$pdf->Cell(2, $h, '', 0);
$pdf->Cell(3, $h,utf8_decode($_GET['idGrad'].'º'), 0);
$pdf->Cell(3, $h, /*seccnpdf($_GET['idSecc'])*/'', 0);
$pdf->Cell(2, $h, /*mencpdf($_GET['idGrad'])*/'', 0);
$pdf->Cell(2, $h, '', 0);
$pdf->Cell(3, $h, /*codPlanpdf($_GET['idGrad'])*/'',0);
$pdf->Cell(2, $h, $_GET['idLaps'], 0);
$pdf->Ln($h);
$pdf->Ln($h-0,06);



$pdf->SetFont('Arial', 'b', 8);
$pdf->Cell($w, $h, utf8_decode('Nº'), 1,0,'C');
$pdf->Cell($w*8, $h, 'Cedula', 'TBR',0,'L');
$pdf->Cell($w*11, $h, utf8_decode('Identificación'), 'TBR',0,'L');
$pdf->Cell($w*2, $h, 'C/S', 'TBR',0,'C');
$pdf->Cell($w*10, $h, 'Asignaturas', 'TBR',0,'L');
$pdf->Cell($w*2, $h, '1L', 'TBR',0,'C');
$pdf->Cell($w*2, $h, '2L', 'TBR',0,'C');
$pdf->Cell($w*2, $h, '3L', 'TBR',0,'C');
$pdf->Cell($w*2, $h, 'DA', 'TBR',0,'C');
$pdf->Ln($h);

$num=0;

$sql="SELECT * FROM matricula WHERE idAnoEscolar = '".$ae['idAnoEscolar']."' AND idEscolaridad = 3 ORDER BY ciEstudiante ASC";
$query = tbQuery($sql);
$nList = mysqli_num_rows($query);
while($list=mysqli_fetch_array($query)){
	$sqlEst="SELECT * FROM estudiantes WHERE ciEstudiante = '".$list['ciEstudiante']."'";
	$queryEst = tbQuery($sqlEst);
	$dtEst = mysqli_fetch_array($queryEst);
$sqlMP ="SELECT * FROM repitiente_materiapendient WHERE idAnoEscolar = '".$ae['idAnoEscolar']."' AND idGrad = '".$_GET['idGrad']."' AND ciEstidante = '".$list['ciEstudiante']."'";
$queryMP = tbQuery($sqlMP);
while($listMP=mysqli_fetch_array($queryMP)){
	$Asign = queryTbAsign($listMP['idAsignatura']);
	
	if($listMP['rMPNotaLapso1']!=''){$nt1=$listMP['rMPNotaLapso1'];}else{$nt1='**';}
	if($listMP['rMPNotaLapso2']!=''){$nt2=$listMP['rMPNotaLapso2'];}else{$nt2='**';}
	if($listMP['rMPNotaLapso3']!=''){$nt3=$listMP['rMPNotaLapso3'];}else{$nt3='**';}
	if($listMP['rMPNotaLapso1']!='' and $listMP['rMPNotaLapso2']!='' and $listMP['rMPNotaLapso3']!='')
	{$prom=($listMP['rMPNotaLapso1']+$listMP['rMPNotaLapso2']+$listMP['rMPNotaLapso3'])/3;}
	else{$prom='**';}
	
	
$num++;	
$pdf->Cell($w, $h, $num, 1,0,'C');
$pdf->Cell($w*8, $h, $list['ciEstudiante'], 'TBR',0,'L');
$pdf->Cell($w*11, $h, utf8_decode($dtEst['apellidosEst'].', '.$dtEst['nombresEst']), 'TBR',0,'L');
$pdf->Cell($w*2, $h,  $list['idGrado'].'/'.seccnpdf($list['idSeccion']), 'TBR',0,'C');
$pdf->Cell($w*10, $h, $Asign['nombreAsignatura'], 'TBR',0,'L');
$pdf->Cell($w*2, $h, $nt1, 'TBR',0,'C');
$pdf->Cell($w*2, $h, $nt2, 'TBR',0,'C');
$pdf->Cell($w*2, $h, $nt3, 'TBR',0,'C');
$pdf->Cell($w*2, $h, $prom, 'TBR',0,'C');
$pdf->Ln($h);
}}


for($i=0;$i!=(44-$nList);$i++){
$num++;
$pdf->SetFont('Arial', 'b', 8);
$pdf->Cell($w, $h, $num, 1,0,'C');
$pdf->Cell($w*8, $h, '', 'TBR',0,'L');
$pdf->Cell($w*11, $h, utf8_decode(''), 'TBR',0,'L');
$pdf->Cell($w*2, $h, '', 'TBR',0,'C');
$pdf->Cell($w*10, $h, '', 'TBR',0,'L');
$pdf->Cell($w*2, $h, '', 'TBR',0,'C');
$pdf->Cell($w*2, $h, '', 'TBR',0,'C');
$pdf->Cell($w*2, $h, '', 'TBR',0,'C');
$pdf->Cell($w*2, $h, '', 'TBR',0,'C');
$pdf->Ln($h);

}




$pdf->SetY(-2.8);
$pdf->Cell(3.2, $h, utf8_decode('Fecha de Emisión: '), 0);
$pdf->Cell(3, $h, datepdf(), 0);
$pdf->Cell(0, $h, $title.' 2015 (UESJ)', 0,0,'R');

ob_end_clean();
$pdf->Output('Materia Pendiente'.$_GET['idGrad'].'-'.$_GET['idSecc'].'-'.$_GET['idLaps'],'I');
?>