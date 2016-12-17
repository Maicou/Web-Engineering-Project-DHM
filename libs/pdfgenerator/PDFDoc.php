<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDFDoc
 *
 * Copyright by hacke.net - http://www.hacke.net/php/pdf/maechtig_viel_druck_machen.pdf
 * @author Raphael Denz
 */

define("FPDF_FONTPATH","../../../fpdf/font/");
include "../../../fpdf/fpdf.php";

// Abgeleitete PDFDOC-Klasse
class PDFDoc extends FPDF {
// Übergeordnetes Objekt
var $pdf;
// PDF im Konstruktor erstellen
function PDFDoc() {
$this->pdf = new FPDF("P", "mm", "A4");
$this->pdf->SetTitle("PDF-Vortrag");
$this->pdf->AliasNbPages();
//$this->pdf->Open();
$this->pdf->SetMargins(25,25,20);
$this->pdf->AddPage();
}
function Display() {
header("Content-type: application/pdf");
$this->pdf->Output();
}
} 

// Überschrift hinzufügen
function AddHeading($text) {
// Font stzen
//$this->pdf->SetFont("Times", "B", 14);
// Überschrift ausgeben
$this->pdf->Write(5, $text);
// Abstand
$this->pdf->Ln(10);
}
// Absatz hinzufügen
function AddParagraph($text) {
$this->pdf->SetFont("Times", "", 11);
$this->pdf->Write(5, $text);
$this->pdf->Ln(10);
}
/*
$d = new PDFDOC();
for($i=1;$i<5;$i++) {
//$d->AddHeading($i.". Kapitel");
    $d->pdf->SetFont("Times");
    $d->pdf->Write(5, $i);
// Abstand
$d->pdf->Ln(10);
//$d->AddParagraph(str_repeat("Gallia est omnia divisa in partes
//tres... ", 4+($i*2)));
$d->pdf->SetFont("Times", "", 11);
$d->pdf->Write(5, str_repeat("Gallia est omnia divisa in partestres... ", 4+($i*2)));
$d->pdf->Ln(10);
}
$d->Display();
 * 
 */

// Grafische Spielerei
function fancyGraphic() {
for($x=10;$x<=200;$x++) {
$y = 60+49*sin($x/20);
// Malfarbe verändern
$this->pdf->SetDrawColor(100,200-$x,$x);
// Linie zeichen
$this->pdf->Line($x, $y, $y, 100-$y/2);
$this->pdf->Line($y, (100-$y/2)+100, $y+100, $x);
}
}




