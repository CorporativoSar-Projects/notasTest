<?php
	error_reporting(0);
	$dir="Cuauhtémoc, Ciudad de México";
	$correo="contacto@corporativosaarme.com";
	$pagina="https://corporativosaarme.com/";
	//si no funciona POST cambiar a GET y en insertar nota linea 173
	$ign = $_GET['firma'];
$nomCliente = $_GET['nomCliente'];
$domCliente = $_GET['domCliente'];
$idservicio = $_GET['idservicio'];
$idservicio2 = $_GET['idservicio2'];
$idservicio3 = $_GET['idservicio3'];
$idservicio4 = $_GET['idservicio4'];
$cantidad = intval($_GET['cantidad']);
$cantidad2 = intval($_GET['cantidad2']);
$cantidad3 = intval($_GET['cantidad3']);
$cantidad4 = intval($_GET['cantidad4']);
$descripcion = $_GET['descripcion'];
$descripcion2 = $_GET['descripcion2'];
$descripcion3 = $_GET['descripcion3'];
$descripcion4 = $_GET['descripcion4'];
$precio = $_GET['precio'];
$precio2 = $_GET['precio2'];
$precio3 = $_GET['precio3'];
$precio4 = $_GET['precio4'];
$importe = $_GET['importe'];
$importe2 = $_GET['importe2'];
$importe3 = $_GET['importe3'];
$importe4 = $_GET['importe4'];
$tipoNota = $_GET['tipoNota'];
$folio = $_GET['folio'];
$fecha = $_GET['fecha'];
$subtotal = $_GET['subtotal'];
$iva = $_GET['iva'];
$riva = $_GET['retiva'];
$risr = $_GET['isr'];
$total = $_GET['total'];

	/*$total=number_format($total,2);*/
	/*Crer pdf*/
	require ('fpdf183/fpdf.php');
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',18);
	$pdf->Image('img/1.png',10,8,33);
	$pdf->Cell(200,5,'CORPORATIVO SAR',0,0,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(200,0,utf8_decode('NOTA DE REMISIÓN'),0,2,'C');
	$pdf->Ln(1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(200,10,utf8_decode($dir),0,0,'C');
	$pdf->Ln(1);
	$pdf->Cell(200,16,'(+52) 55 4686 3772',0,0,'C');
	$pdf->Ln(12);
	$pdf->Cell(200,0,utf8_decode($correo),0,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(200,0,utf8_decode($pagina),0,0,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,30,'FECHA: '.$fecha,0,0,'R');
	$pdf->Ln(0);
	$pdf->Cell(0,30,'FOLIO: '.$folio,0,0,'L');
	$pdf->Ln(20);
	$pdf->Cell(0,30,'CLIENTE: '.utf8_decode($nomCliente),0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(0,25,'DOMICILIO: '.utf8_decode($domCliente),0,0,'L');
	$pdf->Ln(30);
	$cabecera = array('ID SERVICIO','CANTIDAD','DESCRIPCIÓN','PRECIO','IMPORTE');
	$datos = array(
            array('ids' => $idservicio, 'cant' => $cantidad, 'desc' => $descripcion, 'prec' => $precio, 'imp' => $importe),
            array('ids' => $idservicio2, 'cant' => $cantidad2, 'desc' =>  $descripcion2, 'prec' => $precio2, 'imp' => $importe2),
            array('ids' => $idservicio3, 'cant' => $cantidad3, 'desc' =>  $descripcion3, 'prec' => $precio3, 'imp' => $importe3),
            array('ids' => $idservicio4, 'cant' => $cantidad4, 'desc' => $descripcion4, 'prec' => $precio4, 'imp' => $importe4)
            );
	$pdf->SetFont('Arial','B',10);
	foreach ($cabecera as $fila) {
		$pdf->Cell(38,7, utf8_decode($fila),1,'', 'C' );
	}
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',10);
	foreach ($datos as $fila) {
		$pdf->Cell(38,7, utf8_decode($fila['ids']),1,'', 'C' );
		$pdf->Cell(38,7, utf8_decode($fila['cant']),1,'', 'C' );
		$pdf->Cell(38,7, utf8_decode($fila['desc']),1,'', 'C' );
		$pdf->Cell(38,7, utf8_decode($fila['prec']),1,'', 'C' );
		$pdf->Cell(38,7, utf8_decode($fila['imp']),1,'', 'C' );
		$pdf->Ln();
	}
	$pdf->Ln(30);
	$pdf->SetXY(130, 170);
	$pdf->Cell(70,7,'SUBTOTAL: $'.$subtotal.' MXN',1,'', 'C' );
	$pdf->Ln();
	$pdf->SetXY(130, 180);
	$pdf->Cell(70,7,'(+) IVA: $'.$iva.' MXN',1,'', 'C' );
	$pdf->Ln();
	$pdf->SetXY(130, 190);
	$pdf->Cell(70,7,utf8_decode('(-) RETENCIÓN IVA: $').$riva.' MXN',1,'', 'C' );
	$pdf->Ln();
	$pdf->SetXY(130, 200);
	$pdf->Cell(70,7,utf8_decode('(-) RETENCIÓN ISR: $').$risr.' MXN',1,'', 'C' );
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(60,7,'TOTAL: $'.$total.' MXN',1,'', 'C' );
	$pdf->Ln(20);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,10,'FIRMA DE CONFORMIDAD:',0,'', 'L' );
	$pdf->Ln();
	$pdf->SetFont('Arial','',10);
	$pdf->Multicell(190,4,$ign,1);
	$pdf->Output('D','Nota_'.$nomCliente.'_'.$fecha.'.pdf');
?>