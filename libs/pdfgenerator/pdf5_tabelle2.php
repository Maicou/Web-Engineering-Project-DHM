<?PHP
include("../../../fpdf/fpdf.php");   

$pdf = new FPDF();  
$pdf->AddPage();  

/*Einstellung der �berschrift */  
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(192,192,192);

// �berschrift
$pdf->Cell(30,5,"Kapital:","LTR",0,"C",1);
$pdf->Cell(50,5,"Zinssatz in [%]:","1",0,"C",1);
$pdf->Cell(70,5,"Ertrag:","1",0,"C",1);
$pdf->Ln();

/* Einstellungen der Tabelle */
$pdf->SetFont('Helvetica', '', 10);
$zinsfuss = 1.5;

// Tabelle

for ($kapital=100; $kapital<=800; $kapital=$kapital+100)
{
/* Einstellung f�r unterschiedliche Zeilenfarbe */
	if ($kapital%200==0)
	{
	$pdf->SetFillColor(192,192,192);
	}
	else
	{
	$pdf->SetFillColor(224,224,224);
	}

$pdf->Cell(30,5,"Fr. ".$kapital,"LR",0,"C",1);
$pdf->Cell(50,5,$zinsfuss,"LR",0,"C",1);
$ertrag=$kapital + $kapital*$zinsfuss/100;
$pdf->Cell(70,5,"Fr. ".number_format($ertrag,1),"LR",0,"R",1);
$pdf->Ln();
}

$pdf->Output();     
?>
