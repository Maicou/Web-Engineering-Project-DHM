<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define("FPDF_FONTPATH","../fpdf181/font/");
include "../../../fpdf/fpdf.php";

$pdf = new FPDF("P", "mm", "A4");
//$pdf->Open();
$pdf->AddPage();
$pdf->SetFont("Times","",11);
$pdf->Write(5, "Hallo Welt");
$pdf->Output();