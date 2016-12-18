<?PHP
include("../../../fpdf/fpdf.php");   

$pdf = new FPDF();  
$pdf->AddPage();  

/*Einstellung der �berschrift */  
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(192,192,192);

// �berschrift
$pdf->Cell(30,5,"Kapital","LTR",0,"C",1);
$pdf->Cell(50,5,"Zinssatz [%]:","LTR",0,"C",1);
$pdf->Cell(70,5,"Ertrag:","LTR",0,"C",1);
$pdf->Ln();

/*Einstellungen der Tabelle */
$pdf->SetFont('Helvetica', '', 11);
$zinsfuss = 1.5;

// Tabelle

for ($kapital=100; $kapital<=800; $kapital=$kapital+100)
{
$pdf->Cell(30,5,$kapital,"LR",0,"C",1);
$pdf->Cell(50,5,$zinsfuss,"LR",0,"C",1);
$ertrag=$kapital + $kapital*$zinsfuss/100;
$pdf->Cell(70,5,number_format($ertrag,1),"LR",0,"C",1);
$pdf->Ln();
}

$pdf->Output();     
?>
