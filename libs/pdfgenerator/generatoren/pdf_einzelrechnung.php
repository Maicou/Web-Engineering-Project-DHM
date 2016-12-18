<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require("../../../../fpdf/fpdf.php");

require_once '../../app/models/PDO_Database.inc.php'; // C:\xampp\htdocs\DHM_test\pdfgenerator\pdf_einzelraechnung.php 
//$conn = "Database connection variable";
$errormsg = "No error found";
$dbmsg = "No message";
$querymsg = "No query message";

$expenseCost=0;
$totalLivingSpace=0;
$accommodationLivingSpace=10;

//try {
    //   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = Database::connect();

                
    $dbmsg = "DB sucessfully connected";
//} catch (PDOException $errormsg) {
//    $errormsg->getMessage();
//}


function DBdisconnect(){
    try {
        $conn = Database::disconnect();
        $dbmsg = "DB sucessfully disconnected";
    } catch (PDOException $errormsg) {
        $errormsg->getMessage();
    }
}

function HouseFunction(){
    $conn = Database::connect();
    $haus="Anton-Leon";
    try {
        
        // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT description FROM `building` WHERE id='1'";
    //$stmt->execute();
    $house="leer";
    foreach ($conn->query($stmt) as $row){
    $house = $row['description'];
    }
    return $house;
    $querymsg = "Query was successfull";
    } catch (Exception $errormsg) {
        
        $querymsg = "[Function HouseFunction()] Query was not successfull ".$errormsg;
    }
    $conn = Database::disconnect();
}

function ContentSize(){
    $conn = Database::connect();
    $count = "noch unbekannte grösse";
    try {
        
     // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT * FROM `accommodation`";
    $count = $conn->query($stmt)->rowCount();
    
    
    return $w90=$count;
        
    } catch (Exception $errormsg) {
        
    $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
    return $querymsg;
    }
}

function ContentRequest(){
    $conn = Database::connect();
    $ergebnis = "noch leeres Ergebnis";
    try {
        
     // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT * FROM `accommodation`";
    //$stmt->execute();
    $ergebnis="leer";
    foreach ($conn->query($stmt) as $row){
    $ergebnis = $row['variant'];
    }
    $querymsg = "Query was successfull";
    return $ergebnis;
        
    } catch (Exception $errormsg) {
        
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return $querymsg;
    }
}

function CostTransfer($expenseId, $houseId, $accommodationId) {
    $expenseCost=10;
    $totalLivingSpace=10;
    $accommodationLivingSpace=10;
    $conn = Database::connect();
    
    try {
        
        // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT description FROM `expenses` WHERE id='".$expenseId."'";
    //$stmt->execute();
    foreach ($conn->query($stmt) as $row){
    $expenseCost = $row['description'];
    }
    $expenseCost=4000;
    $querymsg = "Query was successfull";
    } catch (Exception $errormsg) {
        $querymsg = "[Function CostTransfer()] Query was not successfull ".$errormsg;
    }
    
    try {
        
        // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT description FROM `building` WHERE id='".$houseId."'";
    //$stmt->execute();
    foreach ($conn->query($stmt) as $row){
    $totalLivingSpace = $row['description'];
    }
    $totalLivingSpace=4000;
    $querymsg = "Query was successfull";
    } catch (Exception $errormsg) {
        $querymsg = "[Function CostTransfer()] Query was not successfull ".$errormsg;
    }
    
    try {
        
        // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT description FROM `accommodaton` WHERE id='".$accommodationId."'";
    //$stmt->execute();
    foreach ($conn->query($stmt) as $row){
    $accommodationLivingSpace = $row['description'];
    }
    $accommodationLivingSpace=1000;
    $querymsg = "Query was successfull";
    } catch (Exception $errormsg) {
        $querymsg = "[Function CostTransfer()] Query was not successfull ".$errormsg;
    }   
    
    return $costForAccommodation = $expenseCost / $totalLivingSpace *  $accommodationLivingSpace;
    
}

// Tabellenausgabe mit Tabellentitel und Schleife f�r alle weiteren Felder
$pdf=new FPDF();
$pdf->AddPage();

//�berschrift
//4.Parameter Rand: "L"->left, "T"->top, "R"->right, "B"->bottom
//5.Parameter: die n�chste Schreibposition 0->rechts von der Zelle, 2->unter der Zelle, 1->nach Zeilenumbruch in n�chster Zeile
//6.Parameter: "C"-> Ausrichtung des Textes "zentriert" ("R"->right, "L"->left default:"L")
//7.Parameter 1-> gef�llt (0->keine F�llung)
$pdf->SetFont("Helvetica", "bui", 24);
$pdf->Cell(50, 20, $house=HouseFunction());
$pdf->Ln();

$pdf->SetFont("Helvetica", "b", 11);
$pdf->SetLineWidth(0.4);  		  //Einstellung der Liniendicke
$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(117,117,117);  //Zellenhintergrundfarbe
$pdf->SetTextColor(255,255,255);  //Schriftfarbe in Zelle 

$pdf->Cell(60, 10, "Mieter", "LTRB", 0, "C", 1);   
$pdf->Cell(35, 10, "Mieterkosten", "LTR", 0, "C", 1); 
$pdf->Cell(35, 10, "Rechnung", "LTR", 0, "C", 1); 
$pdf->Cell(60, 10, "Rechnugnsart", "LTR", 0, "C", 1); 
$pdf->Ln();   //Zeilenumbruch

//Einstellung f�r die Tabelle 
$pdf->SetFont("", "");
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0,0,0);

$w=10;
$w90=110;
$w10=10;
ContentSize();
//Tablle
//for($w=10; $w<=90; $w=$w+10)

//foreach

for($w=$w10; $w<=$w90; $w=$w+$w10)
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
  $pdf->Cell(60,10,$w, "LR", 0, "C",1);
  $pdf->Cell(35,10, number_format($wb,3),"LR", 0, "R",1);
  $pdf->Cell(35,10, number_format(sin($wb),3),"LR", 0, "R",1); 
  $pdf->Cell(60,10, $erg=ContentRequest(),"LR",0,"C",1);
  $pdf->Ln();
  
  // SELECT * FROM tenant JOIN incomings WHERE incomings.Tenant_id = tenant.tid
  // SELECT * FROM `expenses` WHERE `id` = 1
}

  $pdf->Cell(60,50, "blabla"/*$erg=ContentRequest()*/,"LR",0,"C",1);
$pdf->Output("I", "pdf_test2.pdf");
DBdisconnect();
?>





