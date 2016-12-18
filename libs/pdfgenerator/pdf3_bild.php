<?PHP
include("../../../fpdf/fpdf.php");   

$pdf = new FPDF();  
$pdf->AddPage();    
$pdf->SetFont('Helvetica', 'B', 24); 
$pdf->Cell(40,10,'Zwei Bilder');

// Textfarbe auf blau wechseln
$pdf->Image("../htdocs/DHM_test/pdfgenerator/bild1.jpg", 10,30,45);
$pdf->Image("../htdocs/DHM_test/pdfgenerator/bild2.jpg", 60,30,40);

$pdf->Output();     
?>
