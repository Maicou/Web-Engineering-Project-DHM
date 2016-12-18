<?php
require("../../../../fpdf/fpdf.php");
// Tabellenausgabe mit Tabellentitel und Schleife f�r alle weiteren Felder
$pdf=new FPDF();
$pdf->AddPage();

function Hausfunktion(){
    $haus="Anton-Leon";
    return $haus;
}


//�berschrift
//4.Parameter Rand: "L"->left, "T"->top, "R"->right, "B"->bottom
//5.Parameter: die n�chste Schreibposition 0->rechts von der Zelle, 2->unter der Zelle, 1->nach Zeilenumbruch in n�chster Zeile
//6.Parameter: "C"-> Ausrichtung des Textes "zentriert" ("R"->right, "L"->left default:"L")
//7.Parameter 1-> gef�llt (0->keine F�llung)
$pdf->SetFont("Helvetica", "bui", 24);
$pdf->Cell(50, 20, $haus=Hausfunktion());
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

function PDOabfrage(){
    $ergebnis = "noch leeres Ergebnis";
    try {
    $db = new PDO("mysql:dbname=dhm_rental_management;host=".$_SERVER['SERVER_NAME'], "root", "MOV2ESR11*");
    $sql = "SELECT `expense_description` FROM `expenses` WHERE `id` = 3";
    $ergebnis = $db->query($sql);
    } catch (PDOException $e){
        
    }
    return $ergebnis;
}

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
  $pdf->Cell(60,10,$w, "LR", 0, "C",1);
  $pdf->Cell(35,10, number_format($wb,3),"LR", 0, "R",1);
  $pdf->Cell(35,10, number_format(sin($wb),3),"LR", 0, "R",1); 
  $pdf->Cell(60,10, $erg=PDOabfrage(),"LR",0,"C",1);
  $pdf->Ln();
  
  // SELECT * FROM tenant JOIN incomings WHERE incomings.Tenant_id = tenant.tid
  // SELECT * FROM `expenses` WHERE `id` = 1
}
$pdf->Output("I", "pdf_test2.pdf");
?>





