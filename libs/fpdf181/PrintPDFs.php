<?php
require 'fpdf.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$_POST['email'].' and my password: '.$_POST['password']);
$pdf->Output();
?>
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrintPDFs
 *
 * @author Marco Mancuso
 */

