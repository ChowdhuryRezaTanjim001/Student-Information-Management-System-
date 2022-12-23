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
		$pdf->Write(5, 'Semester Final Result');
		$pdf->Ln();

		$pdf->Ln(2);			
		$pdf->Ln(2);			
		$qry = $obj->get($_GET['id']);
		$rec = $qry->fetch_assoc();
			
			
			$pdf-> Cell(1);
			$pdf->SetFont('Times','B',12);
			$pdf->Cell(33,8,'Student ID');
			$pdf->Cell(33,8,' : '.$rec['ID']);
			$pdf->Ln();
			
			$pdf->SetFont('Times','',12);
			$pdf-> Cell(1);
			$pdf->Cell(33,8,'Student Name');
			$pdf->Cell(33,8,' :  '.$rec['Name']);
			$pdf->Ln();
			
			$pdf-> Cell(1);
			$pdf->Cell(33,8,'Department ' );
			$pdf->Cell(33,8,' :  '.$rec['Program']);
			$pdf->Ln();
				
			$pdf->Ln(2);			
			$pdf->Ln(2);			
		
			$pdf-> Cell(3);
			$pdf->SetFont('Times','B',8);
			$pdf->Cell(45,6,'Subject',1,0,'C');
			$pdf->Cell(45,6,'Credit hour',1,0,'C');
			$pdf->Cell(45,6,'Marks',1,0,'C');
			$pdf->Cell(45,6,'Grade ',1,0,'C');
			$pdf->Ln();
			
			$qry = $obj->result($_GET['id']);
			$i=1;
			$n1=0;
			$j=0;
			while($grade = $qry -> fetch_assoc()){
				$qryy = $obj->view_subject_id($grade['sub_id']);
				$credit = $qryy -> fetch_assoc();
				$total = ($grade['f_t']*(0.2)) + ($grade['m_t']*(0.2)) + ($grade['final']*(0.35)) + ($grade['attendance']*(0.1)) + ($grade['presentation']*(0.05)) + ($grade['quize']*(0.05)) + ($grade['extra']*(0.05));
				
				if($total>=90) {$CGPA='A'; $n1+=4*$credit['credit_h']; $j+=$credit['credit_h'];}
				else if($total>=80) {$CGPA='B'; $n1+=3*$credit['credit_h'];$j+=$credit['credit_h'];}
				else if($total>=70) {$CGPA='C';	$n1+=2*$credit['credit_h'];$j+=$credit['credit_h'];}
				else if($total>=60) {$CGPA='D';	$n1+=1*$credit['credit_h'];$j+=$credit['credit_h'];}
				else if($total<60) {$CGPA='F';	$n1+=0*$credit['credit_h'];$j+=$credit['credit_h'];}
				
					
				$pdf-> Cell(3);
				$pdf->SetFont('Times','',8);
				$pdf->Cell(45,6,$grade['sub_id'],1,0,'C');
				$pdf->Cell(45,6,$credit['credit_h'],1,0,'C');
				$pdf->Cell(45,6,$total,1,0,'C');
				$pdf->Cell(45,6,$CGPA,1,0,'C');
				
				$i++;
				$pdf->Ln();
			}
			$pdf-> Cell(5);
			$pdf->SetFont('Times','',16);
			if($j<=1){
				$pdf->Cell(20,20,'SGPA: '.number_format($n1/1,2),0);
			}
			else{
				$pdf->Cell(20,20,'SGPA: '.number_format($n1/$j,2),0);
			}
			$pdf->Ln();
							
							
			$pdf-> Cell(55);
			$pdf->SetFont('Times','',8);
			
			
			$pdf->Ln();
 
                

		
		$pdf->Ln();
		$pdf->Ln();	
		
		$pdf->Output();



?>

