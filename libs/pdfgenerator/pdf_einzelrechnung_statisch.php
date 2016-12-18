<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require("../../../fpdf/fpdf.php");

require_once '../app/models/PDO_Database.inc.php'; // C:\xampp\htdocs\DHM_test\pdfgenerator\pdf_einzelraechnung.php 
//$conn = "Database connection variable";
$errormsg = "No error found";
$dbmsg = "No message";
$querymsg = "No query message";

// http://stackoverflow.com/questions/5449526/cant-access-global-variable-inside-function
global $totalAmount;
global $totalNettoAmount;
$MWST=8;

$expenseCost=0;
$totalLivingSpace=0;
$accommodationLivingSpace=10;

$expenseId = 4; // The received value from the formular
global $buildingId; // To store the value of the building
global $buildingSpace; // Store the total space available of the building
global $expensetype_id;
global $expenseAmount;
global $expenseCreateDate;
global $expenseDescription;
global $buildingName;

$conn = Database::connect();
$dbmsg = "DB sucessfully connected";

function DBdisconnect(){
    try {
        $conn = Database::disconnect();
        $dbmsg = "DB sucessfully disconnected";
    } catch (PDOException $errormsg) {
        $errormsg->getMessage();
    }
}

function FindBuilding($expenseId){
    $conn = Database::connect();
    global $buildingId;
    global $buildingSpace; // Store the total space available of the building
    global $expensetype_id;
    global $expenseAmount;
    global $expenseCreateDate;
    global $expenseDescription;
try {
        // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT * FROM `expenses` WHERE id='$expenseId'";
    foreach ($conn->query($stmt) as $row){
    $expensetype_id = $row['Expensetypes_id'];
    $expenseAmount = $row['amount'];
    $expenseCreateDate = $row['expense_create'];
    $expenseDescription = $row['expense_description'];
    $buildingId = $row['Building_id'];    
    }
    try {
        $stmt2 = "SELECT * FROM `building` WHERE id='$buildingId'";
        foreach ($conn->query($stmt2) as $row2){
            $Space = $row2['totalLivingSpace'];
        }
        $buildingSpace = $Space;
    } catch (Exception $errormsg) {
        $querymsg = "[Function HouseFunction()] Query was not successfull ".$errormsg;
    }
    return "DCE-Verwaltung GmbH";
} catch (Exception $errormsg) {
    $querymsg = "[Function HouseFunction()] Query was not successfull ".$errormsg;
}
$conn = Database::disconnect();
}

function BuildingName($buildingId){
    $conn = Database::connect();
    global $buildingName;
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    try {
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = "SELECT description FROM `building` WHERE id='$buildingId'";
        foreach ($conn->query($stmt) as $row){
        $buildingName = $row['description'];  
        } 
    return $buildingName;
    }
    catch (Exception $errormsg) {
        $querymsg = "[Function BuildingName()] Query was not successfull ".$errormsg;
    }
}


function OwnerFunction(){
    return "DCE-Verwaltung GmbH";
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
    $conn = Database::disconnect();
}

function ContentRequest($tenantId, $incomingId){
    $conn = Database::connect();
    $ergebnis = "noch leeres Ergebnis";
    try {
        
     // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT * FROM `incomings` WHERE tenant_tid = $tenantId AND id = $incomingId";
    //$stmt->execute();
    $ergebnis="leer";
    foreach ($conn->query($stmt) as $row){
    $ergebnis = $row['amount'];
    }
    $querymsg = "Query was successfull";
    return $ergebnis."\n";
        
    } catch (Exception $errormsg) {
        
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return $querymsg;
    }
    $conn = Database::disconnect();
}

function TenantName($tenantId){
    $conn = Database::connect();
    $name = "Fehlender Name";
    $forename = "Fehlender Vorname";
    
    try {
     // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT * FROM `tenant` WHERE tid = $tenantId";
    foreach ($conn->query($stmt) as $row){
    $forename = $row['forename'];
    $name = $row['name'];
    }
    $querymsg = "Query was successfull";
    return $forename." ".$name;
    } catch (Exception $errormsg) {
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return utf8_decode($forename." ".$name);
    }
    $conn = Database::disconnect();
}

function TenantStreet($tenantId){
    $conn = Database::connect();
    $street = "Fehlende Strasse";
    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT * FROM `tenant` WHERE tid = $tenantId";
    foreach ($conn->query($stmt) as $row){
    $street = $row['street'];
    }
    $querymsg = "Query was successfull";
    return $street;
    } catch (Exception $errormsg) {
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return utf8_decode($street);
    }
    $conn = Database::disconnect();
}

function TenantPCandPlace($tenantId){
    $conn = Database::connect();
    $postalcode = "Fehlender PLZ";
    $place = "Fehlender Ort";
    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT * FROM `tenant` WHERE tid = $tenantId";
    foreach ($conn->query($stmt) as $row){
    $postalcode = $row['city'];
    $place = $row['postalcode'];
    }
    $querymsg = "Query was successfull";
    return $postalcode." ".$place;
    } catch (Exception $errormsg) {
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return utf8_decode($postalcode." ".$place);
    }
    $conn = Database::disconnect();
}

function IncomeDate($incomingId){
    $conn = Database::connect();
    $ergebnis = "noch leeres Ergebnis";
    try {
        
     // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT * FROM `incomings` WHERE id = $incomingId";
    //$stmt->execute();
    $ergebnis="Fehlendes Datum";
    foreach ($conn->query($stmt) as $row){
    $ergebnis = $row['income_create'];
    }
    $querymsg = "Query was successfull";
    return $ergebnis."\n";
        
    } catch (Exception $errormsg) {
        
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return $ergebnis;
    }
    $conn = Database::disconnect();
}

function Variant($incomingId){
    $conn = Database::connect();
    $ergebnis = "noch leeres Ergebnis";
    try {
     // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$stmt = $conn->prepare("SELECT description FROM `building` WHERE id='1'");
    $stmt = "SELECT * FROM `incometypes` WHERE id = (SELECT Incometypes_id FROM `incomings` WHERE id = $incomingId)";
    //$stmt->execute();
    $ergebnis="Fehlende Art";
    foreach ($conn->query($stmt) as $row){
    $ergebnis = $row['typename'];
    }
    $querymsg = "Query was successfull";
    return $ergebnis;
    } catch (Exception $errormsg) {
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return $ergebnis;
    }
    $conn = Database::disconnect();
}

function MWSTcalculation($amount, $MWST){
    // This function assumes that the tax/MWST is incusive
    // It returns the price without tax/MWST
    $reduceMWST = 100+$MWST;
    $tempAmount = $amount/$reduceMWST;
    $finalAmount = $tempAmount*100;
    return $finalAmount;
}

function CountTotalAmount($amount) {
    global $totalAmount;
    $totalAmount = $totalAmount + $amount;
    return $amount;
}

function CountTotalNettoAmount($amount){
    global $totalNettoAmount;
    $totalNettoAmount = $totalNettoAmount + $amount;
    return $amount;
}

function GetTotalMWSTAmount($totalAmount, $totalNettoAmount){
    $totalMWSTAmount = $totalAmount - $totalNettoAmount;
    return  round($totalMWSTAmount);
}

FindBuilding($expenseId);

// Tabellenausgabe mit Tabellentitel und Schleife f�r alle weiteren Felder
$pdf=new FPDF();
$pdf->AddPage();

//�berschrift
//4.Parameter Rand: "L"->left, "T"->top, "R"->right, "B"->bottom
//5.Parameter: die n�chste Schreibposition 0->rechts von der Zelle, 2->unter der Zelle, 1->nach Zeilenumbruch in n�chster Zeile
//6.Parameter: "C"-> Ausrichtung des Textes "zentriert" ("R"->right, "L"->left default:"L")
//7.Parameter 1-> gef�llt (0->keine F�llung)
$pdf->SetFont("Helvetica", "bui", 24);
$pdf->Cell(190, 20, utf8_decode($house=OwnerFunction()), 0, 0, "R" ); // http://php.net/manual/de/function.utf8-decode.php
$pdf->Ln();

$pdf->SetFont("Helvetica", "", 11);
$pdf->SetLineWidth(0);  		  //Einstellung der Liniendicke
$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);

// Namen
$pdf->Cell(80, 5, utf8_decode("Gebäude:"), 0, 0, "L", 1);   
$pdf->Cell(15, 5, "", 0, 0, "C", 1); 
$pdf->Cell(15, 5, "", 0, 0, "C", 1); 
$pdf->Cell(80, 5, utf8_decode("DCE-Verwaltung GmbH"), 0, 0, "L", 1); 
$pdf->Ln();   //Zeilenumbruch

// Strasse
$pdf->Cell(80, 5, utf8_decode(BuildingName($buildingId)), 0, 0, "L", 1);   
$pdf->Cell(15, 5, "", 0, 0, "C", 1); 
$pdf->Cell(15, 5, "", 0, 0, "C", 1); 
$pdf->Cell(80, 5, utf8_decode(""), 0, 0, "L", 1); 
$pdf->Ln();   //Zeilenumbruch

// Postleitzahl + Stadt
$pdf->Cell(80, 5, utf8_decode("Gesamte Wohnfläche: ".$buildingSpace), 0, 0, "L", 1);   
$pdf->Cell(15, 5, "", 0, 0, "C", 1); 
$pdf->Cell(15, 5, "", 0, 0, "C", 1); 
$pdf->Cell(80, 5, utf8_decode(""), 0, 0, "L", 1); 
$pdf->Ln();   //Zeilenumbruch

// Telefonnummer
$pdf->Cell(80, 5, "", 0, 0, "C", 1);   
$pdf->Cell(15, 5, "", 0, 0, "C", 1); 
$pdf->Cell(15, 5, "", 0, 0, "C", 1); 
$pdf->Cell(80, 5, utf8_decode(""), 0, 0, "L", 1); 
$pdf->Ln();   //Zeilenumbruch
$pdf->Ln();

$pdf->SetFont("Helvetica", "b", 11);
$pdf->SetLineWidth(0.4);  		  //Einstellung der Liniendicke
$pdf->SetFillColor(117,117,117);  //Zellenhintergrundfarbe
$pdf->SetTextColor(255,255,255);  //Schriftfarbe in Zelle 
$pdf->SetTextColor(0,0,0);

$pdf->Cell(60, 10, utf8_decode("Mieter"), "LTRB", 0, "C", 1);   
$pdf->Cell(35, 10, utf8_decode("Mieterkosten"), "LTR", 0, "C", 1); 
$pdf->Cell(35, 10, utf8_decode("Rechnung"), "LTR", 0, "C", 1); 
$pdf->Cell(60, 10, utf8_decode("Rechnugnsart"), "LTR", 0, "C", 1); 
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


$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(255,255,255);
// Werte
$pdf->Cell(70,10, variant($incomingId), "LR", 0, "C",1);
$pdf->Cell(45,10, utf8_decode((round(CountTotalNettoAmount(MWSTcalculation(ContentRequest($tenantId, $incomingId), $MWST)),2))),"LR", 0, "C",1);
$pdf->Cell(15,10, $MWST."%","LR", 0, "C",1); 
$pdf->Cell(60,10, utf8_decode((round(CountTotalAmount(ContentRequest($tenantId, $incomingId)),2))),"LR",0,"C",1);
$pdf->Ln();
  
$pdf->SetFillColor(204,204,204);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,10, utf8_decode(variant($incomingId)), "LR", 0, "C",1);
$pdf->Cell(45,10, utf8_decode((round(CountTotalNettoAmount(MWSTcalculation(ContentRequest($tenantId, $incomingId), $MWST)),2))),"LR", 0, "C",1);
$pdf->Cell(15,10, $MWST."%","LR", 0, "C",1); 
$pdf->Cell(60,10, utf8_decode((round(CountTotalAmount(ContentRequest($tenantId, $incomingId)),2))),"LR",0,"C",1);
$pdf->Ln();
  
$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(255,255,255);
$pdf->Cell(70,10, variant($incomingId), "LR", 0, "C",1);
$pdf->Cell(45,10, utf8_decode((round(CountTotalNettoAmount(MWSTcalculation(ContentRequest($tenantId, $incomingId), $MWST)),2))),"LR", 0, "C",1);
$pdf->Cell(15,10, $MWST."%","LR", 0, "C",1); 
$pdf->Cell(60,10, utf8_decode((round(CountTotalAmount(ContentRequest($tenantId, $incomingId)),2))),"LR",0,"C",1);
$pdf->Ln();
  
$pdf->SetFillColor(204,204,204);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,10, variant($incomingId), "LR", 0, "C",1);
$pdf->Cell(45,10, utf8_decode((round(CountTotalNettoAmount(MWSTcalculation(ContentRequest($tenantId, $incomingId), $MWST)),2))),"LR", 0, "C",1);
$pdf->Cell(15,10, $MWST."%","LR", 0, "C",1); 
$pdf->Cell(60,10, utf8_decode((round(CountTotalAmount(ContentRequest($tenantId, $incomingId)),2))),"LR",0,"C",1);
$pdf->Ln();

$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(255,255,255);
$pdf->Cell(70,10, variant($incomingId), "LR", 0, "C",1);
$pdf->Cell(45,10, utf8_decode((round(CountTotalNettoAmount(MWSTcalculation(ContentRequest($tenantId, $incomingId), $MWST)),2))),"LR", 0, "C",1);
$pdf->Cell(15,10, $MWST."%","LR", 0, "C",1); 
$pdf->Cell(60,10, utf8_decode((round(CountTotalAmount(ContentRequest($tenantId, $incomingId)),2))),"LR",0,"C",1);
$pdf->Ln();
  
$pdf->SetFillColor(204,204,204);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,10, variant($incomingId), "LR", 0, "C",1);
$pdf->Cell(45,10, utf8_decode((round(CountTotalNettoAmount(MWSTcalculation(ContentRequest($tenantId, $incomingId), $MWST)),2))),"LR", 0, "C",1);
$pdf->Cell(15,10, $MWST."%","LR", 0, "C",1); 
$pdf->Cell(60,10, utf8_decode((round(CountTotalAmount(ContentRequest($tenantId, $incomingId)),2))),"LR",0,"C",1);
$pdf->Ln();

$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(255,255,255);
$pdf->Cell(70,10, variant($incomingId), "LR", 0, "C",1);
$pdf->Cell(45,10, utf8_decode((round(CountTotalNettoAmount(MWSTcalculation(ContentRequest($tenantId, $incomingId), $MWST)),2))),"LR", 0, "C",1);
$pdf->Cell(15,10, $MWST."%","LR", 0, "C",1); 
$pdf->Cell(60,10, utf8_decode((round(CountTotalAmount(ContentRequest($tenantId, $incomingId)),2))),"LR",0,"C",1);
$pdf->Ln();
  
$pdf->SetFillColor(204,204,204);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(70,10, variant($incomingId), "LR", 0, "C",1);
$pdf->Cell(45,10, utf8_decode((round(CountTotalNettoAmount(MWSTcalculation(ContentRequest($tenantId, $incomingId), $MWST)),2))),"LR", 0, "C",1);
$pdf->Cell(15,10, $MWST."%","LR", 0, "C",1); 
$pdf->Cell(60,10, utf8_decode((round(CountTotalAmount(ContentRequest($tenantId, $incomingId)),2))),"LR",0,"C",1);
$pdf->Ln();


$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Helvetica", "", 11);
$pdf->SetLineWidth(0);		  //Einstellung der Farbe der Linien
// Total Netto amount
$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(255,255,255);
$pdf->Cell(60,10, "", 0, 0, "C",1);
$pdf->Cell(15,10, "", 0, 0, "C",1);
$pdf->Cell(55,10, utf8_decode("Nettobetrag: "), 0, 0, "R",1); 
$pdf->Cell(60,10, utf8_decode(round($totalNettoAmount, 2)." CHF"), 0,0,"L",1); // http://php.net/manual/de/function.round.php
$pdf->Ln();
// Total MWST amount
$pdf->Cell(60,10, "", 0, 0, "C",1);
$pdf->Cell(15,10, "", 0, 0, "C",1);
$pdf->Cell(55,10, utf8_decode("zzgl. ".$MWST."% MwSt. total: "), 0, 0, "R",1); 
$pdf->Cell(60,10, utf8_decode(GetTotalMWSTAmount($totalAmount, $totalNettoAmount)." CHF"), 0,0,"L",1);
$pdf->Ln();
// Total amount
$pdf->Cell(60,10, "", 0, 0, "C",1);
$pdf->Cell(15,10, "", 0, 0, "C",1);
$pdf->SetFont("Helvetica", "b", 11);
$pdf->Cell(55,10, utf8_decode("Gesamtbetrag: "), 0, 0, "R",1); 
$pdf->Cell(60,10, utf8_decode(round($totalAmount, 2)." CHF"), 0,0,"L",1);
$pdf->SetFont("Helvetica", "", 11);
$pdf->Ln();


 
  // SELECT * FROM tenant JOIN incomings WHERE incomings.Tenant_id = tenant.tid
  // SELECT * FROM `expenses` WHERE `id` = 1

$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(190,50, utf8_decode("HIER KÖNNTE IHRE WERBUNG.. EH.. TEXT STEHEN")/*$erg=ContentRequest()*/,"LTRB", "L", 0,1); // http://www.fpdf.org/en/doc/multicell.htm - http://stackoverflow.com/questions/18865350/fpdf-multicell-alignment-not-working
$pdf->Output("I", "pdf_test2.pdf");
DBdisconnect();
?>





