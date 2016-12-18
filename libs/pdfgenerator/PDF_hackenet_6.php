<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//define("FPDF_FONTPATH","../fpdf181/font/");
//include "../../../fpdf/fpdf.php";
include "PDFDoc.php";

$pdf = new FPDF("P", "mm", "A4");
//$pdf->Open();
$pdf->AddPage();
$pdf->SetFont("Times","",11);
$pdf->Write(5, "Hallo Welt");

$link = $pdf->AddLink();
$pdf->SetLink($link,0,2);
$pdf->Write(5, "Seite 1\n");
$pdf->SetTextColor(0,0,200);
$pdf->Write(5, "Gehe zu Seite 2", $link);
$pdf->AddPage();
$pdf->SetTextColor(0,0,0);
$pdf->Write(5,"Seite 2\n");
$pdf->SetTextColor(0,0,200);
$pdf->Write(5,"http://www.trilos.de", "http://www.trilos.de");

for($i=1;$i<5;$i++) {
//$d->AddHeading($i.". Kapitel");
    $pdf->SetFont("Times");
    $pdf->Write(5, $i);
// Abstand
$pdf->Ln(10);
//$d->AddParagraph(str_repeat("Gallia est omnia divisa in partes
//tres... ", 4+($i*2)));
$pdf->SetFont("Times", "", 11);
$pdf->Write(5, str_repeat("Gallia est omnia divisa in partestres... ", 4+($i*2)));
$pdf->Ln(10);
}
for($x=10;$x<=200;$x++) {
$y = 60+49*sin($x/20);
// Malfarbe verändern
$pdf->SetDrawColor(100,200-$x,$x);
// Linie zeichen
$pdf->Line($x, $y, $y, 100-$y/2);
$pdf->Line($y, (100-$y/2)+100, $y+100, $x);
}

$pdf->Output();


// $pdf->Output();