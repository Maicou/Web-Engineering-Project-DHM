<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Marco Mancuso
 */
class User {

    //put your code here
    public $name;

    public function printsome() {
//        echo $this->name;
        }

//        public function printFPDF(){
//        
//        require'../libs/fpdf181/fpdf.php';
//
//        $pdf = new FPDF();
//        $pdf->AddPage();
//        $pdf->SetFont('Arial', 'B', 16);
//        $pdf->Cell(40, 10, "SHITTESTING");
//        $pdf->Output();
//        
//}
    function getName() {
        return $this->name;
    }



}
