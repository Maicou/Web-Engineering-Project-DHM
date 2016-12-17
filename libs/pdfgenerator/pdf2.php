<?PHP
include("../../../fpdf/fpdf.php");   

$pdf = new FPDF();  
$pdf->AddPage();    
$pdf->SetFont('Helvetica', 'B', 24); 
// Textfarbe nach RGB-Farbschema rot gr�n blau
$pdf->SetTextColor(255,0,0);
// Parameter 1,2->Startposition, 3->Text, 4->Rand, 5->Schreibpostiton nach der Zelle  
$pdf->Cell(40,10,'Dies ist der rote Titel!',0,1);

$pdf->SetFontSize(12);
// Textfarbe auf blau wechseln
$pdf->SetTextColor(0,0,255);
$text="Jetzt folgt ein langer Text, der einen Zeilenumbruch erfordert, damit der Text auch lesbar bleibt. Dies muss mit der Methode Write() gel�st werden, welche einen automatischen Zeilenumbruch einf�gt, wenn dies n�tig wird."; 
// in der Methode Write bedeutet die 5 den Zeilenabstand
$pdf->Write(5, $text);
$pdf->Output();     
?>
