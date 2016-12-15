 <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
@author Marco Mancuso, Raphael Denz, David Hall
-->
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/public/" />
        <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />
        <!--Head Information and meta-->
        <?php
        include '../html/headArea.inc.php';
        ?>
        <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />
        <!--Head Information and meta-->
        <?php
        include '../html/headArea.inc.php';
        ?>
        <title>Insert the Title</title>
    </head>
    <body>
        <section id="menubar">
            <!--Top menu button bar-->
            <?php
            include '../html/menubarTOP.inc.php';
            ?>
        </section>
        <header id="header" class="header">
            <!--Header-->
            <?php
            include '../html/headerInvoiceAdministration.inc.php';
            ?>
        </header> 
        <nav class="nav1">           
            <!--form and logout etc-->
            <?php
            include '../html/formList.inc.php';
            ?> 
        </nav>
        <section id="main">
           <nav class="nav3">
                <section id="mainMenu"> 
                    <!--the main menu-->
                    <?php
                    include '../html/mainMenu.inc.php';
                    ?> 
                </section>

            </nav>
            <div class="content">  
           <h2> OVR Haus: Rechnung hinzufügen</h2>
            
<!--             include '../html/content_createTenant.php';-->
<form action="../public/InvoiceAdministration/writeInvoiceHouse2" method="post">
<table border="0" cellspacing="2" cellpadding="2">
  <tbody>
<!--    <tr>
      <td align="right">Anrede:</td>
      <td>
        <select name="gender">
          <option value="default">Bitte wählen</option>
          <option value="male">Herr</option>
          <option value="fimale">Frau</option>
        </select>
      </td>-->
    </tr>
    <tr>
      <td align="right">Bezeichnung:*</td>
      <td>
          <input maxlength="50" placeholder="Unternehmen & Rechnungsbeschreibung" name="expense_description" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Eingangsdatum:*</td>
      <td>
        <input maxlength="50" name="expense_received" size="45" type="date" />
      </td>
    </tr>
    <tr>
      <td align="right">Zahlungsdatum:*</td>
      <td>
        <input maxlength="50" name="payment_date" size="45" type="date" />
      </td>
    </tr>
     <tr>
      <td align="right">Rechnungstyp:*</td>
      <td>
        <select name="expensetypes">
          <option value="0">Bitte auswählen</option>
          <option value="1">Reperaturrechung</option>
          <option value="2">Ölrechnung</option>
          <option value="3">Wasserrechnung</option>
          <option value="4">Stromrechnung</option>
          <option value="5">Hauswartsrechung</option>
          <option value="6">Mieter: Kautionrückzahlung</option>
          <option value="7">anderes</option>
         </select>
      </td>
        </tr>
        <tr>
      <td align="right">Betrag:*</td>
      <td>
          <input maxlength="50" name="amount" size="45" type="number" />
      </td>
        </tr>
      <td></td>
      <td>
        <input type="submit" value="Speichern" class="actionbutton"/>
      </td>
  </tbody>
</table>
</form>
              