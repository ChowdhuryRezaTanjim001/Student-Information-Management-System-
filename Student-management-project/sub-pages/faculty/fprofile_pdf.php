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
	//$this->SetFont('Arial','B',33);
	//$this->SetTextColor(255,192,203);
	//$this->RotatedText(65,190,'A p p r o v e d',65);
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
		$pdf-> Cell(65);
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
		$pdf->Write(4,'Phone: 01738865597, 01910323293 , Email: abdullah001rti@gmail.com , FB: https://www.facebook.com/abd1rti');
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',8);
		$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf-> Cell(77);
		$pdf->SetFont('Times','U',15);
		$pdf->Write(5, 'Faculty Information');
		$pdf->Ln();

		$pdf->Ln(2);			
		$pdf->Ln(2);			
		$id='15103029';
		$qry = $obj->get($_GET['id']);
		$rec = $qry->fetch_assoc();
			
			$pdf->Cell(85);
			if(empty($rec['fpic_id'])){
				$image1='../../images/profile/logo.png';
			}
				
			else{
				$image1='../../images/fprofile/'.$rec['fpic_id'];
			
			}
			
			$pdf->Cell( 30, 30, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(),30, 30), 1);
			$pdf->Ln(35);
			
			$pdf-> Cell(65);
			
			$pdf->SetFont('Times','B',12);
			$pdf->Cell(33,8,'Faculty ID');
			$pdf->Cell(33,8,' : '.$rec['id']);
			$pdf->Ln();
			
			$pdf->SetFont('Times','',12);
			$pdf-> Cell(65);
			$pdf->Cell(33,8,'Faculty Name');
			$pdf->Cell(33,8,' :  '.$rec['name']);
			$pdf->Ln();
			
			$pdf-> Cell(65);
			$pdf->Cell(33,8,'Department ' );
			$pdf->Cell(33,8,' :  '.$rec['department']);
			$pdf->Ln();
			
			$pdf-> Cell(65);
			$pdf->Cell(33,8,'Contact ');
			$pdf->Cell(33,8,' :  '.$rec['p_number']);
			$pdf->Ln();
			
			$pdf-> Cell(65);
			$pdf->Cell(33,8,'Email ');
			$pdf->Cell(33,8,' :  '.$rec['email']);
			$pdf->Ln();
			
			$pdf-> Cell(65);
			$pdf->Cell(33,8,'Gender ');
			$pdf->Cell(33,8,' :  '.$rec['gender']);
			$pdf->Ln();
			
			$pdf-> Cell(65);
			$pdf->Cell(33,8,'Blood Group ');
			$pdf->Cell(33,8,' :  '.$rec['bg']);
			$pdf->Ln();
			
			$pdf-> Cell(65);
			$pdf->Cell(33,8,'Date of Birth ');
			$pdf->Cell(33,8,' :  '.$rec['dob']);
			$pdf->Ln();
			
			$pdf-> Cell(65);
			$pdf->Cell(33,8,'Present Address ');
			$pdf->Cell(33,8,' :  '.$rec['prt_address']);
			$pdf->Ln();
			
			$pdf-> Cell(65);
			$pdf->Cell(33,8,'Parmanent Address ');
			$pdf->Cell(33,8,' :  '.$rec['pmt_address']);
			$pdf->Ln();

			$pdf-> Cell(55);
			$pdf->SetFont('Times','',8);
			
			
			$pdf->Ln();
 
                

		
		$pdf->Ln();
		$pdf->Ln();	
		
		$pdf->Output();



?>

