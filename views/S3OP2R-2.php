<?php

require('fpdf/fpdf.php');
require_once('../protected/controlUnit.php');

logged();

$pdf=new FPDF('L','mm','Letter');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 3, utf8_decode("República Bolivariana de Venezuela"), 0,0,'L');
$pdf->Ln(4);
$pdf->Cell(0, 3, utf8_decode('Ministerio del Poder Popular para la Educación'), 0,0,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial','I', 11);
$pdf->Cell(0, 3, $dtPlantel['nombrePlant'], 0,0,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 3, utf8_decode("Ejido. Estado Mérida"), 0,0,'L');
$pdf->SetFont('Arial','b', 14);
$pdf->Cell(0, 3,'Listado de Calificaciones', 0,0,'R');
$pdf->Ln(4);
$pdf->SetFont('Arial','',10);
$pdf->Cell(25, 3, utf8_decode("Código Plantel: "), 0,0,'L');
$pdf->Cell(25, 3,$dtPlantel['codigoDEA'], 0,0);
$pdf->SetFont('Arial','b', 14);
$pdf->Cell(0, 3,utf8_decode('Consejo de Sección'), 0,0,'R');
$pdf->Ln(4);
$pdf->SetFont('Arial','I', 10);
$pdf->Cell(35, 3,utf8_decode('Año Escolar'), 0,0);
$pdf->Cell(45, 3,utf8_decode('Grado o Año'), 0,0);
$pdf->Cell(20, 3,utf8_decode('Sección'), 0,0);
$pdf->Cell(40, 3,utf8_decode('Mención'), 0,0);
$pdf->Cell(35, 3,utf8_decode('Cód./Plan'), 0,0);
$pdf->Cell(45, 3,'Lapso', 0,0);
$pdf->Ln(4);
$pdf->SetFont('Arial','b', 10);
$pdf->Cell(35, 3,anoEscpdf($ae['idAnoEscolar']), 0,0);
$pdf->Cell(45, 3,'"'.gradpdf($_GET['idGrad']).'"', 0,0);
$pdf->Cell(20, 3,'"'.seccnpdf($_GET['idSecc']).'"', 0,0);
$pdf->Cell(40, 3, mencpdf($_GET['idGrad']), 0,0);
$pdf->Cell(35, 3,codPlanpdf($_GET['idGrad']), 0,0);
$pdf->Cell(45, 3,'', 0,0);
//Inicio de lista
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(5, 5, 'N', 1);
$pdf->Cell(20, 5, utf8_decode('Cédula'), 1);
$pdf->Cell(70, 5, utf8_decode('Identificación'), 1);

for($i=1; $i != $rowsA[0]; $i++){
	$dtAsign=queryTbAsign($rowsA[$i]);
	$pdf->Cell(10, 5, $dtAsign['nombreAbreviadoAsignatura'], 1,0,'C'); 
	$asig=$asig+1;
}
for($i=0; $i !=( (15-$rowsA[0])+1) ; $i++){
	$pdf->Cell(10, 5, '', 1,0,'C');
}
$pdf->Cell(15, 5, 'Prom', 1,0,'C');
$pdf->Ln(5);

//Prueba listado
$pdf->SetFont('Arial', '', 9);
$num=0;

if($_GET['idLaps']==1){$lapss = 'notaLapso1';}
else{if($_GET['idLaps']==2){$lapss = 'notaLapso2';}
else{$lapss = 'notaLapso3';}}

$st = array(array());

$tprom=0;
	while($dtMatricl = mysqli_fetch_array($Matricl)){
  		$dtEst=tbArray(consultEstud($dtMatricl['ciEstudiante']));
		$num ++;
		$pdf->Cell(5, 5, $num, 1);
		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(20, 5,$dtMatricl['ciEstudiante'], 1);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(70, 5,$dtEst['apellidosEst'].' '.$dtEst['nombresEst'], 1);
		$a=0;
		$prom=0;
		for($i=1; $i != $rowsA[0]; $i++){
			$query=cursAsig($ae['idAnoEscolar'],$dtMatricl['ciEstudiante'],$rowsA[$i]);
			$array =mysqli_fetch_array($query);
			if($array[$lapss] !=''){$nt = $array[$lapss]; 
			$a=$a+1;
			$prom=$prom+$nt;
			}else{$nt = 'N';}
			$pdf->Cell(5, 5, $nt, 1,0,'C');
			$pdf->Cell(5, 5, '', 1,0,'C');  
		}
		
		for($i=0; $i !=( (15-$rowsA[0])+1) ; $i++){
			$pdf->Cell(5, 5, '', 1,0,'C');
			$pdf->Cell(5, 5, '', 1,0,'C');
		}
		
		$pdf->Cell(15, 5,  round(($prom/$a),1), 1,0,'C');
		$pdf->Ln(5);
		
		$tprom=$tprom+($prom/$a);
	}
	
$st = array(array());
for($i=1; $i != $rowsA[0]; $i++){
	$sql = "SELECT * FROM notaestudiantes WHERE idAnoEscolar = '".$ae['idAnoEscolar']."' 
										  AND idGrdAsig = '".$_GET['idGrad']."' 
										  AND idAsigGrd = '".$rowsA[$i]."'";
	$query=tbQuery($sql);
	$apro=0;
	$apls=0;
	$not=0;
	while($array=mysqli_fetch_array($query)){
		
		
		/*
		if($array[$lapss]>10){
			$apro++;
		}else{
			$apls++;
		}
		$not=$not+$array[$lapss]; */
	}
	/*
	$st[$rowsA[$i]]['ins']=tbRows($query);
	$st[$rowsA[$i]]['apo']=$apro;
	$st[$rowsA[$i]]['apl']=$apls;
	$st[$rowsA[$i]]['prm']=$not/tbRows($query); */
}



$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(35, 4, '', 0);
$pdf->Cell(60, 4, 'Inscritos', 0,0,'R');
for($i=1; $i != $rowsA[0]; $i++){
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(5, 4, $st[$rowsA[$i]]['ins'], 1,0,'C');
$pdf->Cell(5, 4, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1) ; $i++){
$pdf->Cell(5, 4, '', 1);
$pdf->Cell(5, 4, '', 0);
}

$pdf->Cell(5, 4, '', 0);$pdf->Ln(4);
$pdf->Cell(35, 4, '', 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(60, 4, 'No presentaron', 0,0,'R');
for($i=1; $i != $rowsA[0]; $i++){
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(5, 4, $num, 1,0,'C');
$pdf->Cell(5, 4, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1) ; $i++){
$pdf->Cell(5, 4, '', 1);
$pdf->Cell(5, 4, '', 0);
}

$pdf->Ln(4);
$pdf->Cell(35, 4, '', 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(60, 4, 'Aprobados', 0,0,'R');
for($i=1; $i != $rowsA[0]; $i++){
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(5, 4, $st[$rowsA[$i]]['apo'], 1,0,'C');
$pdf->Cell(5, 4, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1) ; $i++){
$pdf->Cell(5, 4, '', 1);
$pdf->Cell(5, 4, '', 0);
}

$pdf->Ln(4);
$pdf->Cell(35, 4, '', 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(60, 4, 'Aplazados', 0,0,'R');
for($i=1; $i != $rowsA[0]; $i++){
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(5, 4, $st[$rowsA[$i]]['apl'], 1,0,'C');
$pdf->Cell(5, 4, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1) ; $i++){
$pdf->Cell(5, 4, '', 1);
$pdf->Cell(5, 4, '', 0);
}

$pdf->Ln(4);
$pdf->Cell(35, 4, '', 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(60, 4, 'Promedios', 0,0,'R');
for($i=1; $i != $rowsA[0]; $i++){
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(5, 4, '', 1,0,'C');
$pdf->Cell(5, 4, '', 0);}
for($i=0; $i !=( (15-$rowsA[0])+1); $i++){
$pdf->Cell(5, 4, '', 1);
$pdf->Cell(5, 4, '', 0);
}
$pdf->Cell(15, 4,  round(($tprom/$num),1), 1,0,'C');
$pdf->Ln(5);
$pdf->SetY(-28);
$pdf->Cell(30, 5, utf8_decode('Fecha de Emisión: '), 0);
$pdf->Cell(50, 5, datepdf(), 0);

ob_end_clean();
$pdf->Output('Listado de Calificaciones','I');
?>