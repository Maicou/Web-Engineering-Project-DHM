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
            include '../html/header.inc.php';
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
           <h2> OVR Haus: Mieter bearbeiten</h2>
          
<!--             include '../html/content_createTenant.php';-->
<form action="../public/RentalAdministration/createTenantHouse2" method="post">
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
      <td align="right">Vorname:</td>
      <td>
        <input maxlength="50" name="forename" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Nachname:</td>
      <td>
        <input maxlength="50" name="name" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Strasse:</td>
      <td>
        <input maxlength="50" name="street" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Ort:</td>
      <td>
        <input maxlength="50" name="city" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">PLZ:</td>
      <td>
          <input maxlength="50" name="postalcode" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td align="right">Vertragsbeginn:</td>
      <td>
          <input maxlength="50" name="contract_start" size="45" type="date" />
      </td>
    </tr>
    <tr>
      <td align="right">Vertragsende:</td>
      <td>
          <input maxlength="50" name="contract_end" size="45" type="date" />
      </td>
    </tr>
    <tr>
    <td align="right">Vertragsbeschreibung:</td>
    <td>
      <input maxlength="80" name="contract_description" size="45" type="text" />
    </td>
    </tr>
   
        <tr>
      <td align="right">Wohnungsnummer/Büronummer:</td>
      <td>
        <select name="roomnumber">
          <option value="1">Büro 1</option>
          <option value="2">Wohnung 1</option>
          <option value="3">Wohnung 2</option>
          <option value="4">Wohnung 3</option>
          <option value="5">Wohnung 4</option>
          <option value="6">Wohnung 5</option>
          <option value="7">Wohnung 6</option>
          <option value="8">Wohnung 7</option>
          <option value="9">Wohnung 8</option>
          <option value="10">Wohnung 9</option>
          <option value="11">Wohnung 10</option>
          <option value="12">Wohnung 11</option>
          <option value="13">Wohnung 12</option>
          <option value="14">Wohnung 13</option>
          <option value="15">Wohnung 14</option>
        </select>
      </td>
        </tr>
        
      <tr>
      <td align="right">Mieteinnahme:</td>
      <td>
          <input maxlength="50" name="rentalIncome" size="45" type="number" />
      </td>
    </tr>
    <tr>
    <td align="right">Nebenkosten:</td>
      <td>
          <input maxlength="50" name="excludingIncome" size="45" type="number" />
      </td>
    </tr>
    <tr>
    <td align="right">Kaution:</td>
      <td>
          <input maxlength="50" name="bond" size="45" type="number" />
      </td>
    </tr>
      <td></td>
      <td>
        <input type="submit" value="Speichern" class="actionbutton"/>
      </td>
    </tr>
  </tbody>
</table>
</form>