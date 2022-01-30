<?php
 require('assets/fpdf/fpdf.php');

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',12);
	//$pdf->cell(10,20,'Hello world '.$company.' '.$product.' '.$cnt);
	//$pdf->output('test1.pdf','F');
	//$pdf->output();
					$pdf->Ln(15);
					
					$pdf->SetFont('Times','B',16);
					$pdf->SetTextColor(0, 0, 0);
					$pdf->Cell(0,10,'FORM I',0,1,'C');
					$pdf->Ln(6);
					
					$pdf->SetFont('Times','B',14);
					$pdf->SetTextColor(0, 0, 0);
					$pdf->Cell(0,5,'(SEE SECTION 4(2) AND RULE 3) ',0,1,'C');
					$pdf->Ln(4);
 					
					$pdf->SetFont('Times','B',12);
					$pdf->SetTextColor(0, 0, 0);
					$pdf->Cell(0,5,'(Form of Application to be used by a foreman for obtaining prior
sanction to commence or conduct a chit)',0,1,'C');
					$pdf->Ln(6);
					//$pdf->Line(10, 30, 200, 30); // 50mm from each edge
					
					$pdf->SetFont('Times','',12);
					$pdf->Cell(145);
					$pdf->Cell(10,20,'Place:- Pune',0,'R');
					$pdf->Ln(4);
					
					$pdf->SetFont('Times','',12);
					$pdf->Cell(145);
					$pdf->Cell(10,20,'Date:- ');
					$pdf->Ln(8);
					
					$pdf->SetFillColor(255,255,0);
					$pdf->SetFont('Times','',12);
					$pdf->Cell(158);
					$pdf->Cell(22,4,''.$byelaw_date,0,0,'',TRUE);
					$pdf->Ln(10);
					
					$pdf->SetFont('Times','',12);
					$pdf->Cell(10,20,'To, ');
					$pdf->Ln(8);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(10,20,'THE JOINT REGISTER OF CHITS,');
					$pdf->Ln(4);
					
					$pdf->SetFont('Times','',12);
					$pdf->Cell(10,20,'Dy. Comm. Of Sales Tax,');
					$pdf->Ln(4);
					
					$pdf->SetFont('Times','',12);
					$pdf->Cell(10,20,'(L.T.U.)E-001, Yerawada,');
					$pdf->Ln(4);
					
					$pdf->SetFont('Times','',12);					
					$pdf->Cell(10,20,'Pune: - 411006.');
					$pdf->Ln(15);
					
					$pdf->SetFont('Times','',12);
					$pdf->Cell(10,20,'Sir,');
					$pdf->Ln(14);
					
					$pdf->SetFont('Times','',12);
					$pdf->MultiCell(185,5,'We Suvarnakalash Chits Fund Pvt.Ltd., situated at Pune having the registered office at 21 Harmony, CTC No.759/21,Office no. 306 ,Deccan Gymkhana, Off Bhandarkar road, Pune:- 411004, desire to conduct a chit of Rs. ');
					$pdf->Ln(-5);
					
					$pdf->SetFillColor(255,255,0);
					$pdf->SetFont('Times','',12);
					//$pdf->Cell(133);
					$pdf->Cell(19);
					$pdf->Cell(35,4,''.$chit_amount.'/- '.$group_type,0,0,'',TRUE);
					$pdf->Ln(9);
					
					$pdf->SetFont('Times','',12);
					$pdf->MultiCell(185,5,'We remit herewith the sum of rupees ');
					$pdf->Ln(-5);
					
					$pdf->SetFillColor(255,255,0);
					$pdf->SetFont('Times','',12);
					$pdf->Cell(65);
					$pdf->Cell(10,5,'100/-',0,0,'',TRUE);
					//$pdf->Ln(8);
					
					$pdf->SetFont('Times','',12);
					$pdf->MultiCell(185,5,'being the registration of chit and its bye-laws.');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','',11);
					$pdf->MultiCell(185,5,'We hereby certify that the aggregate chit amount of the chits run by the company is Rs. ');
					$pdf->Ln(-5);
					
					$pdf->SetFillColor(255,255,0);
					$pdf->SetFont('Times','',11);
					$pdf->Cell(137);
					$pdf->Cell(50,4,'24,00,000/- (Twenty four lakh)',0,0,'',TRUE);
					$pdf->Ln(4);
					
					$pdf->SetFont('Times','',11);
					$pdf->MultiCell(185,5,'on the date of this application and does not exceed the aggregate chit amount prescribed by section 13 of chit fund act, 1982.');
					$pdf->Ln(5);
					
					
					/* $pdf->SetFont('Times','',12);
					$pdf->MultiCell(185,5,'We hereby certify that the aggregate chit amount of the chits run by the company is Rs.24,00,000/- (Twenty four lakh) on the date of this application and does not exceed the aggregate chit amount prescribed by section 13 of chit fund act, 1982.');
					$pdf->Ln(4); */
					
					$pdf->SetFont('Times','',12);
					$pdf->MultiCell(185,5,'We request you to accord your sanction for commencing and conducting the chit on receipt of such sanction further steps for registration; etc of the shall be taken.');
					$pdf->Ln(12);
					
					$pdf->SetFont('Times','',12);
					$pdf->Cell(185,5,'Yours Faithfully,');
					$pdf->Ln(7);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(185,5,'For Suvarnakalash Chits Fund Pvt.Ltd.');
					$pdf->Ln(6);
					
					
					$pdf->SetFont('Times','B',12);
					$pdf->SetFillColor(255,255,0);
					$pdf->Cell(60,5,'Group:- '.$group_name,1,1,'',TRUE);
					//$pdf->Ln(6);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(60,5,'Chit Value:- Rs. '.$chit_amount.'/-',1,1,'',TRUE);
					//$pdf->Ln(6);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(60,5,'Deno.:- Rs.'.$sub.'/- X '.$duration.' DAYS',1,1,'',TRUE);
					$pdf->Ln(4);
					
					$pdf->SetFont('Times','',12);
					$pdf->Cell(185,5,'Foreman');
					$pdf->Ln(4);
					
					
					
					/* $pdf->SetFont('Arial','',12);
					$pdf->Write(5,"To go back to website, click ");
					$pdf->SetFont('','U');
					 */
					//$pdf->Write(5,'here','http://localhost/demo-fpdf/demo/');
					//$pdf->Write(5,'here','http://www.yashallay.com/');
					//$pdf->SetLink($link);
					
					//$pdf->Line(10, 30, 200, 30); // 50mm from each edge
					
		$pdf->AddPage();
		$pdf->SetMargins(20,10,20);
		$pdf->SetFont('Times','B',12);

					$pdf->Ln(30);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(100);
					$pdf->Cell(10,20,'THE JOINT REGISTER OF CHITS,');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(100);
					$pdf->Cell(10,20,'DY. COMM OF SALES TAX,');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(100);
					$pdf->Cell(10,20,'RANGE M-61, YERAWADA,');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(100);					
					$pdf->Cell(10,20,'PUNE: - 411006.');
					$pdf->Ln(25);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(10,20,'To, ');
					$pdf->Ln(8);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(10,20,'The Manager,');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(10,20,'Suvarnakalash Chits Fund Pvt. Ltd.');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(10,20,'Pune- 411 004.');
					$pdf->Ln(30);
					
					$pdf->SetFont('Times','B',12);
					$pdf->MultiCell(185,5,'REF.NO:- ACTS/PUNE/CHIT-B/............................. PUNE DT. ...............................');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','B',12);
					$pdf->MultiCell(185,5,'SUBJECT :- SANCTION LETTER FOR GROUP NO .:- ');
					$pdf->Ln(-5);
					
					$pdf->SetFillColor(255,255,0);
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(105);
					$pdf->Cell(17,5,''.$group_name,0,0,'',TRUE);
					$pdf->Ln(10);
					
					$pdf->SetFont('Times','B',12);
					$pdf->MultiCell(185,5,'CHIT VALUE: - RS. ');
					$pdf->Ln(-5);
					
					$pdf->SetFillColor(255,255,0);
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(40);
					$pdf->Cell(20,5,''.$chit_amount.'/-',0,0,'',TRUE);
					$pdf->Ln(10);
					
					$pdf->SetFont('Times','B',12);
					$pdf->MultiCell(185,5,'REF :- YOUR LETTER DT........................................');
					$pdf->Ln(12);
					
					$pdf->SetFont('Times','B',12);
					$pdf->MultiCell(170,7,'With reference to above referred letter, you are hereby allowed to collect the subscription from the above mentioned group w.e.f.............................');
					$pdf->Ln(5);
				
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(10,20,'Place:- Pune',0);
					$pdf->Ln(6);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(10,20,'Date:- ');
					$pdf->Ln(15);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(100);
					$pdf->Cell(10,20,'THE JOINT REGISTER OF CHITS,');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(100);
					$pdf->Cell(10,20,'DY. COMM OF SALES TAX,');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(100);
					$pdf->Cell(10,20,'(L.T.U.)E-001, YERAWADA,');
					$pdf->Ln(5);
					
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(100);					
					$pdf->Cell(10,20,'PUNE: - 411006.');
					$pdf->Ln(5);
					
					$pdf->output();
	
 	
?>