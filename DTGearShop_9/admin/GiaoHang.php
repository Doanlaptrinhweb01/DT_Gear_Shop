<?php 
	include('../lib/pdf/fpdf.php');


	class myPDF extends FPDF{
		function header(){
			$this->SetFont('Arial', 'B',14);
			$this->Cell(200,5,'HOA DON DAT HANG', 0, 0,'C');
		}
	}

	$pdf = new myPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','A5',0);
	$pdf->Output();

 ?>