<?php

require('fpdf/fpdf.php');
require_once('../protected/controlUnit.php');

logged();


$w=.5;
$h=.43;


$pdf=new FPDF('L','cm','Letter');
$pdf->AddPage();
$pdf->SetMargins(1, 1 , 0.6);
$pdf->SetAutoPageBreak(true,0.5); 
$pdf->AliasNbPages();
$pdf->Ln($h);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell($w*33, $h, utf8_decode('República Bolivariana de Venezuela'), 0);
$pdf->Ln($h);
$pdf->Cell($w*33, $h, utf8_decode('Ministerio del Poder Popular para la Educación'), 0);
$pdf->Ln($h);
$pdf->SetFont('Arial','BI', 10);
$pdf->Cell($w*33, $h, $dtPlantel['nombrePlant'], 0);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, $h,'Listado de Calificaciones', 0,0,'R');
$pdf->Ln($h);
$pdf->SetFont('Arial','',10);
$pdf->Cell($w*33, $h, utf8_decode("Código Plantel: ".$dtPlantel['codigoDEA']), 0,0,'L');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, $h+.3,utf8_decode('Consejo de Sección'), 0,0,'R');
$pdf->Ln($h);
$pdf->SetFont('Arial','',10);
$pdf->Cell($w*33, $h, utf8_decode("Ejido. Estado".idtfEntFedpdf($dtPlantel['idEntidaFederal'])), 0);
$pdf->Ln($h);
$pdf->SetFont('Arial','I', 10);
$pdf->Cell($w*5, $h,utf8_decode('Año Escolar'), 0,0);
$pdf->Cell($w*8, $h,utf8_decode('Grado o Año'), 0,0);
$pdf->Cell($w*3, $h,utf8_decode('Sección'), 0,0);
$pdf->Cell($w*8, $h,utf8_decode('Mención'), 0,0);
$pdf->Cell($w*5, $h,utf8_decode('Cód./Plan'), 0,0);
$pdf->Cell($w*4, $h,'Lapso', 0,0);
$pdf->Ln($h);
$pdf->SetFont('Arial','b', 10.5);
$pdf->Cell($w*5, $h,anoEscpdf($ae['idAnoEscolar']), 0,0);
$pdf->Cell($w*8, $h,'"'.gradpdf($_GET['idGrad']).'"', 0,0);
$pdf->Cell($w*3, $h,'"'.seccnpdf($_GET['idSecc']).'"', 0,0);
$pdf->Cell($w*8, $h, mencpdf($_GET['idGrad']), 0,0);
$pdf->Cell($w*5, $h,codPlanpdf($_GET['idGrad']), 0,0);
$pdf->Cell($w*4, $h,lapspdf($_GET['idLaps']), 0,0);
//Inicio de lista

if($_GET['idLaps']==1){$lapss = 'notaLapso1';}
else{if($_GET['idLaps']==2){$lapss = 'notaLapso2';}
else{$lapss = 'notaLapso3';}}

$pdf->Ln($h+.2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell($w+($w/2), $h, utf8_decode('Nº'), 'TBL');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell($w*5, $h, utf8_decode('Cédula'), 'TBL');
$pdf->Cell($w*13-$w/2, $h, utf8_decode('Identificación'), 'TBL');
for($i=1; $i != $rowsA[0]; $i++){
	$dtAsign=queryTbAsign($rowsA[$i]);
	$pdf->Cell(($w+.03)*2, $h, $dtAsign['nombreAbreviadoAsignatura'], 'TBL',0,'C'); 
	$asig=$asig+1;
}

for($i=0; $i !=( (15-$rowsA[0])+1) ; $i++){
	$pdf->Cell(($w+.03)*2, $h, '', 'TBL',0,'C');
}

$pdf->Cell($w*2, $h, 'Prom', 1,0,'C');
$pdf->Ln($h);
$pdf->SetFont('Arial', '', 10);
$num=0;
$tprom=0;
$st = array(array());
	$ins = 0; $npr = 0;

	while($dtMatricl = mysqli_fetch_array($Matricl)){
  		$dtEst=tbArray(consultEstud($dtMatricl['ciEstudiante']));
		$num ++;
		$pdf->Cell($w+($w/2), $h, $num, 'LB');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell($w*5, $h,$dtMatricl['ciEstudiante'], 'LB');
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell($w*13-$w/2, $h,$dtEst['apellidosEst'].' '.$dtEst['nombresEst'], 'LB');
		$pdf->SetFont('Arial', '', 9);
		$prom = 0;
		$a=0;
		
		
		for($i=1; $i != $rowsA[0]; $i++){
			$query=cursAsig($ae['idAnoEscolar'],$dtMatricl['ciEstudiante'],$rowsA[$i]);
			$array =mysqli_fetch_array($query);
			if($array[$lapss] !=''){
				$nt = $array[$lapss]; 
				$a=$a+1;
				$prom=$prom+$nt;
				$st[$rowsA[$i]]['ins']++;
				
				if($array[$lapss]>=10){
					$st[$rowsA[$i]]['apo']++;
				}else{
					$st[$rowsA[$i]]['apl']++;
				}
				
				$st[$rowsA[$i]]['prm']= $st[$rowsA[$i]]['prm'] + $array[$lapss];
				
			}else{
				$nt = 'N';
				$st[$rowsA[$i]]['npr']++;
			}
		
			$pdf->Cell($w+.03, $h, $nt, 'LB',0,'C');
			$pdf->Cell($w+.03, $h, '', 'LB',0,'C');

		}
		for($i=0; $i !=( (15-$rowsA[0])+1) ; $i++){
			$pdf->Cell($w+.03, $h, '', 'LB',0,'C');
			$pdf->Cell($w+.03, $h, '', 'LB',0,'C');
		}
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell($w*2, $h, round(($prom/$a),1), 'LBR',0,'C');
		$pdf->Ln($h);
		
	$tprom=$tprom+($prom/$a);
	}

$pdf->Ln(.2);
$pdf->SetFont('Arial', '', 10);

$pdf->Cell($w*19, $h, 'Inscritos', 0,0,'R');
for($i=1; $i != $rowsA[0]; $i++){
if($st[$rowsA[$i]]['ins']==0){$ins=0;}else{$ins=$st[$rowsA[$i]]['ins'];}
$pdf->Cell($w+0.03, $h, $ins, 'TLR',0,'C');
$pdf->Cell($w+0.03, $h, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1); $i++){
$pdf->Cell($w+0.03, $h, '', 0);
$pdf->Cell($w+0.03, $h, '', 0);
}
$pdf->Ln($h);

$pdf->Cell($w*19, $h, 'No presentaron', 0,0,'R');
for($i=1; $i != $rowsA[0]; $i++){
if($st[$rowsA[$i]]['npr']==0){$npr=0;}else{$npr=$st[$rowsA[$i]]['npr'];}
$pdf->Cell($w+0.03, $h, $npr, 'TLR',0,'C');
$pdf->Cell($w+0.03, $h, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1); $i++){
$pdf->Cell($w+0.03, $h, '', 0);
$pdf->Cell($w+0.03, $h, '', 0);
}
$pdf->Ln($h);
	
$pdf->Cell($w*19, $h, 'Aprobados', 0,0,'R');
for($i=1; $i != $rowsA[0]; $i++){
if($st[$rowsA[$i]]['apo']==0){$apo=0;}else{$apo=$st[$rowsA[$i]]['apo'];}
$pdf->Cell($w+0.03, $h, $apo, 'TLR',0,'C');
$pdf->Cell($w+0.03, $h, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1); $i++){
$pdf->Cell($w+0.03, $h, '', 0);
$pdf->Cell($w+0.03, $h, '', 0);
}
$pdf->Ln($h);
	
	
$pdf->Cell($w*19, $h, 'Aplazados', 0,0,'R');
for($i=1; $i != $rowsA[0]; $i++){
if($st[$rowsA[$i]]['apl']==0){$apl=0;}else{$apl=$st[$rowsA[$i]]['apl'];}
$pdf->Cell($w+0.03, $h, $apl, 'TLR',0,'C');
$pdf->Cell($w+0.03, $h, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1); $i++){
$pdf->Cell($w+0.03, $h, '', 0);
$pdf->Cell($w+0.03, $h, '', 0);
}
$pdf->Ln($h);
	

$pdf->Cell($w*19, $h, 'Promedios', 0,0,'R');
$pdf->SetFont('Arial', 'B', 8);
for($i=1; $i != $rowsA[0]; $i++){
$pdf->SetFont('Arial', 'B', 7);
if($st[$rowsA[$i]]['prm']==0){$prm=0;}else{$prm=$st[$rowsA[$i]]['prm'];}
$pdf->Cell($w+0.03, $h, round(($prm/$ins),1), 'TBLR',0,'C');
$pdf->Cell($w+0.03, $h, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1); $i++){
$pdf->Cell($w+0.03, $h, '', 0);
$pdf->Cell($w+0.03, $h, '', 0);
}
		
$pdf->Cell(($w+0.03)*2, $h, round(($tprom/$num),1), 1,0,'C');


$pdf->SetY(-1.5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w*6, $h, utf8_decode('Fecha de Emisión: '), 0);
$pdf->Cell($w*12, $h, datepdf(), 0);

ob_end_clean();
$pdf->Output('Listado de Calificaciones -'.$_GET['idGrad'].'-'.$_GET['idSecc'].'-'.$_GET['idLaps'].'.php','I');
?>