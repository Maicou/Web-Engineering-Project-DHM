<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDF_showExpense
 *
 * @author http://www.fpdf.org/en/script/script14.php
 * http://www.jrc.edu.ph/parker/tutorial/
 * http://www.fpdf.org/en/doc/index.php
 * http://fpdf.de/dokumentation/tutorials/tutorial-5-tabellen.html
 * https://community.filemaker.com/thread/153045
 * http://www.fpdf.org/en/script/script20.php
 * http://stackoverflow.com/questions/28380396/generating-pdf-dynamically-through-fpdf
 * http://www.fpdf.org/en/script/script10.php
 * http://stackoverflow.com/questions/4637645/how-to-create-fpdf-tables
 * http://stackoverflow.com/questions/16051841/date-range-issue-using-php-fpdf
 * 
 * 
 * 
 * Genutzt von: Raphael Denz
 * 
 */

require('PDF_MySQL_Table.php');  // ../fpdf181/mysql_table.php

class PDF_showExpense extends PDF_MySQL_Table
{
function Header()
{
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'World populations',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

//Connect to database
//mysql_connect('server','login','password');
//mysql_select_db('db');

require_once '../../app/models/PDO_Database.inc.php';
$conn = Database::connect();
$pdfquery =



$pdf=new PDF_showExpense();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table($conn->prepare('select id, expense_description, expense_received, payment_date, Expensetypes_id, amount FROM "Expenses" where id="1"')); // select id, expense_description, expense_received, payment_date, Expensetypes_id, amount FROM 'Expenses' where id="1";
$pdf->AddPage();
//Second table: specify 3 columns
$pdf->AddCol('rank',20,'','C');
$pdf->AddCol('name',40,'Country');
$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop=array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
$pdf->Table('select name, format(pop,0) as pop, rank from country order by rank limit 0,10',$prop);
$pdf->Output();

$conn = Database::disconnect();

?>
