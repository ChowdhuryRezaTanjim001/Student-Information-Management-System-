<?php
	require_once('function.php');
			
	$obj = new dbms();
	require('../../pdf/fpdf.php');
	require('../../pdf/rotation.php');


class PDF extends PDF_Rotate
{
function Header()
{
	//Put the watermark
	//$this->SetFont('Arial','B',50);
	//$this->SetTextColor(255,192,203);
	//$this->RotatedText(65,190,'A p p r o v e d',45);
}
function RotatedText($x, $y, $txt, $angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}
}

//$pdf = new FPDF();
$pdf=new PDF();
$pdf->AddPage();



$iubat='University Management System' ;				

		$pdf->Ln();
		$pdf-> Cell(68);
		$pdf->SetFont('Times','',14);
		$pdf->Write(5, $iubat);
		$pdf->Ln();
		$pdf-> Cell(77);
        $pdf->SetFont('Times','',10);
        $pdf->Write(5, 'Developed By Md. Abdullah');
		$pdf->Ln();
		$pdf-> Cell(58);
		$pdf->SetFont('Times','',8);
		$pdf->Write(4, 'Student - Department of Computer Science and Engineering at IUBAT');
				$pdf->Ln();
		$pdf-> Cell(35);
		$pdf->SetFont('Times','',8);
		$pdf->Write(4,'Phone: 01738868597, 01910323293 , Email: abdullah001rti@gmail.com , FB: https://www.facebook.com/abd1rti');
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',8);
		$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf-> Cell(85);
		$pdf->SetFont('Times','U',10);
		$pdf->Write(5, 'Faculty List');
		$pdf->Ln();

		$pdf->Ln(2);			
		
		$pdf-> Cell(5);
		$pdf->SetFont('Times','B',8);
		$pdf->Cell(8,6,'SL',1);
		$pdf->Cell(25,6,'Faculty ID',1);
		$pdf->Cell(32,6,'Faculty Name',1);
		$pdf->Cell(20,6,'Department ',1);
		$pdf->Cell(35,6,'Contact',1);
		$pdf->Cell(40,6,'Email',1);
		$pdf->Cell(20,6,'Picture',1);
		$pdf->Ln();

		$qry = $obj->view_faculty();
		

		$sl=1;
		while($rec = $qry->fetch_assoc())
		 {
			$pdf-> Cell(5);
			$pdf->SetFont('Times','',8);
			$pdf->Cell(8,20,$sl,1);
			$pdf->Cell(25,20,$rec['id'],1);
			$pdf->Cell(32,20,$rec['name'],1);
			$pdf->Cell(20,20,$rec['department'],1);
			$pdf->Cell(35,20,$rec['p_number'],1);
			$pdf->Cell(40,20,$rec['email'],1);
			if(empty($rec['fpic_id'])){
				$image1='../../images/profile/logo.png';
			}
				
			else{
				$image1='../../images/fprofile/'.$rec['fpic_id'];
			
			}
			$pdf->Cell( 20, 20, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(),20, 20), 1);

			$sl++;
			$pdf->Ln();
		}      

		$pdf->Ln();
		$pdf->Ln();	
		
		$pdf->Output();

?>

