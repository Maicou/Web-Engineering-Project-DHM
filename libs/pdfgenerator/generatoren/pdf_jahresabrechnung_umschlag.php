<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require("../../../libs/fpdf181/fpdf.php");

require_once '../../../app/models/PDO_Database.inc.php';
//$conn = "Database connection variable";
$errormsg = "No error found";
$dbmsg = "No message";
$querymsg = "No query message";

// http://stackoverflow.com/questions/5449526/cant-access-global-variable-inside-function
// http://php.net/manual/de/language.variables.scope.php
global $totalAmount;
global $totalNettoAmount;
$MWST=8;

global $expenseCost;
global $totalLivingSpace;
global $accommodationLivingSpace;

$expenseId = $_POST['eid']; // The received value from the formular - everything will in this file be generated with this primarykry


global $buildingId; // To store the value of the building
global $buildingSpace; // Store the total space available of the building
global $expensetype_id;
global $expenseAmount;
global $expenseCreateDate;
global $expenseDescription;
global $buildingName;
global $numberOfTenants;
global $expensetypename;

$conn = Database::connect();
$conn->exec('set names utf8'); // Enables the usag of ÄÖÜ - Umlauten (UTF8 coding)
$dbmsg = "DB sucessfully connected";

function DBdisconnect(){
    try {
        $conn = Database::disconnect();
        $dbmsg = "DB sucessfully disconnected";
    } catch (PDOException $errormsg) {
        $errormsg->getMessage();
    }
}
/**
class Myclass {
  public $classvar; 
  function Myclass() {
    $this->classvar = $GLOBALS[SYSTEM];
  }
}
**/
function FindBuilding($expenseId){
    $conn = Database::connect();
    global $buildingId;
    global $buildingSpace; // Store the total space available of the building
    global $expensetype_id;
    global $expenseAmount;
    global $expenseCreateDate;
    global $expenseDescription;
    global $totalLivingSpace;
    global $expensetypename;
    try {
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = "SELECT * FROM `expenses` WHERE eid='$expenseId'";
        foreach ($conn->query($stmt) as $row){
            $expensetype_id = $row['Expensetypes_id'];
            $expenseAmount = $row['amount'];
            $expenseCreateDate = $row['expense_received'];
            $expenseDescription = $row['expense_description'];
            $buildingId = $row['Building_id'];    
        }
    try {
        $stmt2 = "SELECT * FROM `building` WHERE id='$buildingId'";
        foreach ($conn->query($stmt2) as $row2){
            $Space = $row2['totalLivingSpace'];
        }
        $buildingSpace = $Space;
        $totalLivingSpace = $Space;
        } catch (Exception $errormsg) {
            $querymsg = "[Function HouseFunction()] Query was not successfull ".$errormsg;
        }
    try {
        $stmt3 = "SELECT * FROM `expensetypes` WHERE id='$expensetype_id'";
        foreach ($conn->query($stmt3) as $row3){
            $typename = $row3['typename'];
        }
        $expensetypename = $typename;
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
    
    $stmt = "SELECT tid FROM Tenant WHERE accommodation_id IN (SELECT id FROM accommodation WHERE Building_id = $buildingId)";
    $result = $conn->prepare($stmt);
    $result->execute();
    $number_of_rows = $result->fetchColumn();
    $numberOfTenants = $number_of_rows;
    return $numberOfTenants;
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

function  numberOfTenantsInBuilding($buildingId){
    global $numberOfTenants;
    $conn = Database::connect();
    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = "SELECT * FROM building bu JOIN (accommodation ac JOIN tenant te ON ac.id = te.accommodation_id) ON bu.id = ac.building_id WHERE bu.id = $buildingId";
    /**
    $stmt2 = "SELECT COUNT(*) FROM building bu JOIN (Accommodation ac JOIN tenant te ON ac.id = te.accommodation_id) ON bu.id = ac.building_id WHERE bu.id = $buildingId";
    **/
    $result = $conn->prepare($stmt);
    $result->execute();
    //$number_of_rows = $result->fetchColumn();
    //$numberOfRows = $result->rowCount();
    $numberOfRows = $result->rowCount();//fetchColumn();//rowCount();
    //$numberOfTenants = $number_of_rows;
    $numberOfTenants = $numberOfRows;
    /**
    foreach ($conn->query($stmt2) as $row){
    $result2 = $row['COUNT(*)'];
    }
     **/
    //if ($buildingId = 1) {
        $numberOfTenants = $numberOfTenants;//$result2;//
    //} else {
    //    $numberOfTenants = $numberOfTenants - 1;
    //}
    return $numberOfTenants;
    
    } catch (Exception $errormsg) {
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return '$numberOfTenants';
    }
    $conn = Database::disconnect();
}

function tenantRoomNr($tenantNumber, $buildingId){
    $conn = Database::connect();
    try {
    if ($tenantNumber == 0){
        $stmt = $conn->prepare("SELECT * FROM building bu JOIN (accommodation ac JOIN tenant te ON ac.id=te.accommodation_id) ON bu.id = ac.building_id WHERE bu.id = $buildingId"); 
        $stmt->execute();
        $row = $stmt->fetch();
    do {
        $tenantRoomNr = $row['id'];
        return $tenantRoomNr;
    } while($row = $stmt->fetch(PDO::FETCH_ASSOC));
    } else {
    $stmt = $conn->prepare("SELECT * FROM building bu JOIN (accommodation ac JOIN tenant te ON ac.id=te.accommodation_id) ON bu.id = ac.building_id WHERE bu.id = $buildingId LIMIT $tenantNumber OFFSET $tenantNumber"); 
    $stmt->execute();
    $row = $stmt->fetch();
    do {
        $tenantRoomNr = $row['id'];
        return $tenantRoomNr;
    } while($row = $stmt->fetch(PDO::FETCH_ASSOC));
    }
    } catch (Exception $errormsg) {
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return "Error beim Funktion TenantName";
    }
    $conn = Database::disconnect();
}

function tenantAmount($tenantNumber, $totalLivingSpace, $expenseAmount, $buildingId){
    $conn = Database::connect();
    try {
    if ($tenantNumber == 0){
        $stmt = $conn->prepare("SELECT * FROM building bu JOIN (accommodation ac JOIN tenant te ON ac.id=te.accommodation_id) ON bu.id = ac.building_id WHERE bu.id = $buildingId"); 
        $stmt->execute();
        $row = $stmt->fetch();
    do {
        $tenantSpace = $row['accommodationLivingSpace'];
        $tenantAmount = calculateAmountOnSpace($tenantSpace, $totalLivingSpace, $expenseAmount);
        return $tenantAmount;//$tenantSpace;
    } while($row = $stmt->fetch(PDO::FETCH_ASSOC));
    } else {
    $stmt = $conn->prepare("SELECT * FROM building bu JOIN (accommodation ac JOIN tenant te ON ac.id=te.accommodation_id) ON bu.id = ac.building_id WHERE bu.id = $buildingId LIMIT $tenantNumber OFFSET $tenantNumber"); 
    $stmt->execute();
    $row = $stmt->fetch();
    do {
        $tenantSpace = $row['accommodationLivingSpace'];
        $tenantAmount = calculateAmountOnSpace($tenantSpace, $totalLivingSpace, $expenseAmount);
        return $tenantAmount;//$tenantSpace;
    } while($row = $stmt->fetch(PDO::FETCH_ASSOC));
    }
    } catch (Exception $errormsg) {
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return "Error beim Funktion TenantName";
    }
    $conn = Database::disconnect();
}

function tenantName($tenantNumber, $buildingId){
    $conn = Database::connect();
    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($tenantNumber == 0){
        $stmt = $conn->prepare("SELECT * FROM `tenant` WHERE Accommodation_id IN (SELECT id FROM `accommodation` WHERE Building_id = $buildingId)"); 
        $stmt->execute();
        $row = $stmt->fetch();
    do {
        return $row['name'].' '.$row['forename'];
    } while($row = $stmt->fetch(PDO::FETCH_ASSOC));
    } else {
    $stmt = $conn->prepare("SELECT * FROM `tenant` WHERE Accommodation_id IN (SELECT id FROM `accommodation` WHERE Building_id = $buildingId) LIMIT $tenantNumber OFFSET $tenantNumber"); 
    $stmt->execute();
    $row = $stmt->fetch();
    do {
        return $row['name'].' '.$row['forename'];
    } while($row = $stmt->fetch(PDO::FETCH_ASSOC));
    }
    } catch (Exception $errormsg) {
        $querymsg = "[Function ContentRequest()] Query was not successfull ".$errormsg;
        return "Error beim Funktion TenantName";
    }
    $conn = Database::disconnect();
}

function calculateAmountOnSpace($tenantSpace, $totalLivingSpace, $expenseAmount){
    $value = $expenseAmount/$totalLivingSpace*$tenantSpace;
    return $value;
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

FindBuilding($expenseId);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica", "", 11);
$pdf->Cell(55, 5, utf8_decode("Gebäude Nr.: ".$buildingId), 0, 0, "L", 1);
$pdf->Cell(70, 5, utf8_decode("Rechnungstyp: ".$expensetype_id), 0, 0, "L", 1);
$pdf->Cell(65, 5, utf8_decode("Rechnung Nr.: ".$expenseId), 0, 0, "L", 1);

$pdf->Ln();
$pdf->Cell(55, 5, utf8_decode(BuildingName($buildingId)), 0, 0, "L", 1); 
$pdf->Cell(70, 5, utf8_decode("Rechnungsname: ".$expensetypename), 0, 0, "L", 1);
$pdf->Cell(65, 5, utf8_decode("Rechnungsmenge: ".$expenseAmount." EUR"), 0, 0, "L", 1);
$pdf->Ln();

$pdf->Cell(55, 5, utf8_decode("Totale Wohnfläche: ".$buildingSpace." m²"), 0, 0, "L", 1);
$pdf->Cell(70, 5, utf8_decode("Rechnungsdatum: ".$expenseCreateDate), 0, 0, "L", 1);
$pdf->Cell(65, 5, utf8_decode("PDF Druckdatum: ".date("d.m.Y")), 0, 0, "L", 1);
$pdf->Ln();
$pdf->Cell(190, 5, utf8_decode(""), 0, 0, 0, 1);
$pdf->Ln();

$pdf->Cell(60, 5, utf8_decode("Rechnungsbeschreibung: "), "LTRB", 0, "C", 1);
$pdf->Ln();
$pdf->Cell(190, 30, utf8_decode($expenseDescription), "LTRB", 0, "C", 1);
$pdf->Ln();
$pdf->Cell(190, 5, utf8_decode(""), 0, 0, "T", 1);
$pdf->Ln();

$pdf->SetFont("Helvetica", "", 11);
$pdf->SetLineWidth(0);  		  //Einstellung der Liniendicke
$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);

FindBuilding($expenseId);

$pdf->SetFont("Helvetica", "b", 11);
$pdf->SetLineWidth(0.4);  		  //Einstellung der Liniendicke
$pdf->SetFillColor(117,117,117);  //Zellenhintergrundfarbe
$pdf->SetTextColor(255,255,255);  //Schriftfarbe in Zelle 

$pdf->Cell(20, 10, utf8_decode("Raum Nr."), "LTRB", 0, "C", 1);
$pdf->Cell(50, 10, utf8_decode("Mieter"), "LTRB", 0, "C", 1);   
$pdf->Cell(30, 10, utf8_decode("Mieterkosten"), "LTR", 0, "C", 1); 
$pdf->Cell(35, 10, utf8_decode("Rechnung"), "LTR", 0, "C", 1); 
$pdf->Cell(55, 10, utf8_decode("Rechnungsart"), "LTR", 0, "C", 1); 
$pdf->Ln();   //Zeilenumbruch

//Einstellung f�r die Tabelle 
$pdf->SetFont("", "");
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0,0,0);

$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0,0,0);		  //Einstellung der Farbe der Linien
$pdf->SetFillColor(255,255,255);
// Werte
$pdf->SetFillColor(0,0,0);
$pdf->Cell(100,10, "", "LR", 0, "C",1);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(35,10, utf8_decode($expenseAmount),"LR", 0, "C",1); 
$pdf->Cell(55,10, utf8_decode($expensetypename),"LR",0,"C",1);
$pdf->Ln();

$numberOfTenants = numberOfTenantsInBuilding($buildingId);
//$pdf->Cell(60,10, $numberOfTenants." Rows", "LR", 0, "C",1); // Um die Anzahl der erfassten Tenantszu eruieren

$forCounter = 0;
for($c=0; $c<$numberOfTenants; $c++)
{
  //Zeilen abwechselnd gestalten
  if($c%2==0)
    {
        $pdf->SetFillColor(204,204,204);
        $pdf->SetTextColor(0,0,0);
    }
    else
    {
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
    }
    $pdf->Cell(20,10, utf8_decode(tenantRoomNr($c, $buildingId)), "LR", 0, "C",1);
    $pdf->Cell(50,10, utf8_decode(tenantName($c, $buildingId)), "LR", 0, "C",1);
    $pdf->Cell(30,10, utf8_decode(round(tenantAmount($c, $totalLivingSpace, $expenseAmount, $buildingId, $forCounter),2)),"LR", 0, "C",1);
    $pdf->Cell(35,10, "","LR", 0, "C",1); 
    $pdf->Cell(55,10, "","LR",0,"C",1);
    $pdf->Ln();
    $forCounter++;
}

$pdf->Ln();

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(190, 5, utf8_decode("Anzahl der betroffenen Mieter: ".$numberOfTenants), 0, 0, "T", 1);
$pdf->Ln();

$pdf->Output("I", "Umschlagsrechnung_Rechnung Nr_".$expenseId."-".date("d_m_Y").".pdf");
DBdisconnect();
?>


