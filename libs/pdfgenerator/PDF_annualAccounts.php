<?php

/* 
 * Example taken from: http://www.fpdf.org/en/script/script14.php
 * 
 * 
 */

 require('../fpdf181/fpdf.php'); 

class PDF extends FPDF {
  // Kopfzeile
  function Header()
  {
    // Logo
    $this->Image('logo_pb.png',10,8,33);
    // Arial fett 15
    $this->SetFont('Arial','B',15);
     // nach rechts gehen
     $this->Cell(80);
     // Titel
     $this->Cell(30,10,'Titel',1,0,'C');
     // Zeilenumbruch
     $this->Ln(20);
  } 

  // Fusszeile
  function Footer()
  {
     // Position 1,5 cm von unten
     $this->SetY(-15);
     // Arial kursiv 8
     $this->SetFont('Arial','I',8);
     // Seitenzahl
     $this->Cell(0,10,'Seite '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
  $pdf->Cell(0,10,'Zeilennummer '.$i,0,1);
$pdf->Output(); 

?>

