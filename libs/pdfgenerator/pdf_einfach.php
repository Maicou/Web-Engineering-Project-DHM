<?php
require("../../../fpdf/fpdf.php");
// 
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Helvetica", "bui", 24);
$pdf->Cell(50, 20, "Nebenkostenabrechnung");
$pdf->Ln();
$pdf->SetFont("Helvetica", "", 12);
$pdf->SetTextColor(255,0,0);
$pdf->Write(6, "Hier folgt eine l�ngerer Text �ber mehrere Zeilen, mit automatischem Zeilenumbruch. Toll was man mit FPDF alles machen kann. Wie weit sind Sie mit Ihren versuchen?");
$pdf->Output("I", "pdf_test.pdf");
?>


