<?php

require_once('../protected/controlUnit.php');
require('fpdf/fpdf.php');

logged();

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
$pdf->Ln($h);
$pdf->SetFont('Arial', 'BI', 14);
$pdf->Cell(10, $h, $dtPlantel['nombrePlant'], 0);
$pdf->SetFont('Arial', 'BI', 16);
$pdf->Cell(0, $h, 'Listado de Alumnos', 0,0,'R');
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
$pdf->Cell(3, $h,'"'.seccnpdf($_GET['idSecc']).'"', 0);
$pdf->Cell(2, $h, mencpdf($_GET['idGrad']), 0);
$pdf->Cell(2, $h, '', 0);
$pdf->Cell(3, $h, codPlanpdf($_GET['idGrad']),0);
$pdf->Cell(2, $h, $_GET['idLaps'], 0);
$pdf->Ln($h);
$pdf->Ln($h-0,06);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w*18, $h, 'Responsable', 0);
$pdf->Cell($w, $h, '', 0);
$pdf->Cell($w+0.20, $h, '', 'TLR');
for($i=0;$i!=14;$i++)
$pdf->Cell($w+0.20, $h, '', 'TR');
$pdf->Ln($h);
$pdf->Cell($w*18, $h, '', 'B');
$pdf->Cell($w, $h, '', 0);
$pdf->Cell($w+0.20, $h, '', 'LR');
for($i=0;$i!=14;$i++)
$pdf->Cell($w+0.20, $h, '', 'R');
$pdf->Ln($h);
$pdf->Cell($w*18, $h, '', 0);
$pdf->Cell($w, $h, '', 0);
$pdf->Cell($w+0.20, $h, '', 'LR');
for($i=0;$i!=14;$i++)
$pdf->Cell($w+0.20, $h, '', 'R');
$pdf->Ln($h);
$pdf->Cell($w*18, $h, 'Actividad', 0);
$pdf->Cell($w, $h, '', 0);
$pdf->Cell($w+0.20, $h, '', 'LR');
for($i=0;$i!=14;$i++)
$pdf->Cell($w+0.20, $h, '', 'R');
$pdf->Ln($h);
$pdf->Cell($w*18, $h, '', 'B');
$pdf->Cell($w, $h, '', 0);
$pdf->Cell($w+0.20, $h, '', 'LR');
for($i=0;$i!=14;$i++)
$pdf->Cell($w+0.20, $h, '', 'R');
$pdf->Ln($h);
$pdf->Cell($w*18, $h, '', 0);
$pdf->Cell($w, $h, '', 0);
$pdf->Cell($w+0.20, $h, '', 'LRB');
for($i=0;$i!=14;$i++)
$pdf->Cell($w+0.20, $h, '', 'RB');
$pdf->Ln($h);

$pdf->SetFont('Arial', 'b', 11);
$pdf->Cell($w, $h, utf8_decode('Nº'), 1,0,'C');
$pdf->Cell($w*5, $h, 'Cedula', 'TBR',0,'C');
$pdf->Cell($w*13, $h, utf8_decode('Identificación'), 'TBR',0,'C');
for($i=0;$i!=15;$i++)
$pdf->Cell($w+0.20, $h, '', 'RB');
$pdf->Ln($h);	
	
	$pdf->SetFont('Arial', '', 9);
	$num=0;
	while($dtMatricl = mysqli_fetch_array($Matricl)){
  		$dtEst=tbArray(consultEstud($dtMatricl['ciEstudiante']));
		$num ++;
		$pdf->Cell($w, $h, $num, 'BLR');
		$pdf->Cell($w*5, $h,$dtMatricl['ciEstudiante'], 'BR');
		$pdf->Cell($w*13, $h,$dtEst['apellidosEst'].' '.$dtEst['nombresEst'], 'BR');
			for($i=0;$i!=15;$i++)
				$pdf->Cell($w+0.20, $h, '', 'RB');
	$pdf->Ln($h);
	}
	
$pdf->Ln($h);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, $h, ' Observaciones', 0);
$pdf->Ln($h);
$pdf->SetFont('Arial', '', 11);
for($i=0;$i!=8;$i++){
	$pdf->Cell(($w*19)+($w+0.20)*15, $h, '', 1);
	$pdf->Ln($h);
}

$pdf->SetY(-2.8);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(3.2, $h, utf8_decode('Fecha de Emisión: '), 0);
$pdf->Cell(3, $h, datepdf(), 0);
$pdf->Cell(0, $h, $title.' 2015 (UESJ)', 0,0,'R');

ob_end_clean();
$pdf->Output('Matricula Inicial','I');
?>