<?php
require("../../../fpdf/fpdf.php");
// Tabellenausgabe mit Tabellentitel und Schleife f�r alle weiteren Felder
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Helvetica", "b", 11);
$pdf->SetLineWidth(0.4);  		  //Einstellung der Liniendicke
$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(117,117,117);  //Zellenhintergrundfarbe
$pdf->SetTextColor(255,255,255);  //Schriftfarbe in Zelle 

//�berschrift
//4.Parameter Rand: "L"->left, "T"->top, "R"->right, "B"->bottom
//5.Parameter: die n�chste Schreibposition 0->rechts von der Zelle, 2->unter der Zelle, 1->nach Zeilenumbruch in n�chster Zeile
//6.Parameter: "C"-> Ausrichtung des Textes "zentriert" ("R"->right, "L"->left default:"L")
//7.Parameter 1-> gef�llt (0->keine F�llung)
$pdf->Cell(30, 10, "Winkel", "LTRB", 0, "C", 1);   
$pdf->Cell(40, 10, "im Bogenmass", "LTR", 0, "C", 1); 
$pdf->Cell(60, 10, "Sinus-Winkel", "LTR", 0, "C", 1); 
$pdf->Ln();   //Zeilenumbruch

//Einstellung f�r die Tabelle 
$pdf->SetFont("", "");
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0,0,0);

//Tablle
for($w=10; $w<=90; $w=$w+10)
{
  //Zeilen abwechselnd gestalten
  if($w%20==0)
  {
  $pdf->SetFillColor(204,204,204);
  $pdf->SetTextColor(0,0,0);
  }
  else
  {
  $pdf->SetFillColor(255,255,255);
  $pdf->SetTextColor(0,0,0);
  } 
  // Werte
  $wb=$w/180*M_PI;   //Berechnung Bogenmass: Winkel/180*PI
  $pdf->Cell(30,10,$w, "LR", 0, "C",1);
  $pdf->Cell(40,10, number_format($wb,3),"LR", 0, "R",1);
  $pdf->Cell(60,10, number_format(sin($wb),3),"LR", 0, "R",1); 
  $pdf->Ln();
}
$pdf->Output("I", "pdf_test2.pdf");
?>





