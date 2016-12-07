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
            <nav class="nav2">
                <section id="mainMenu"> 
                    <!--the main menu-->
                    <?php
                    include '../html/mainMenu.inc.php';
                    ?> 
                </section>

            </nav>
            <div class="content">                                           
                <!--the content-->
                <?php
                
                ?> 
                
<h2> Rechnungsverwaltung: OVR Haus </h2>
    <table>
    <button class="actionbutton" onclick="window.location.href = '../public/MainInvoiceAdministration/invoiceHouseOne'">Anton-Leo Haus</button> 
    <tr>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Adresse</th>
                <th>Miete</th>
                <th></th>
            </tr>
    <?php
    
    
    require_once '../app/models/PDO_Database.inc.php';
            try {
               // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                 $conn = Database::connect();
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = "SELECT * FROM tenant JOIN incomings WHERE incomings.Tenant_id = tenant.tid AND incomings.Incometypes_id = 1";
//                $stmt->bindParam(':email', $this->email);
//                $stmt->bindParam(':password', $pass);
                
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
    
     
            foreach ($conn->query($stmt) as $row) {
                echo '<tr>';
                echo '<td>' . $row['forename'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['street'] . '</td>';
                echo '<td>' . $row['amount'] . ' €' .'</td>';
                echo '<td width=250>';
//                echo '<a class="btn" href="read.php?id=' . $row['id'] . '">Read</a>';
                echo '&nbsp;';
//                echo '<a class="actionbutton" href="update.php?id=' . $row['id'] . '">Update</a>';
//                echo '&nbsp;';
//                echo '<a class="actionbutton" href="delete.php?id=' . $row['id'] . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            
            $conn = Database::disconnect();
    
    ?>
    </table>
    
    
    
<!-- <tr>
    <th>Vorname</th>
    <th>Nachname</th>
    <th>Adresse</th>
    <th>Tel. Nummer</th>
    <th>Miete (kalt)</th>
    <th>Nebenkosten</th>
    <th>Action</th>
     </tr>
  <tr>
    <td>David</td>
    <td>Hall</td>
    <td>Bündenmattweg 118, 4654 Lostorf</td>
    <td>078 756 24 35</td>
    <td>1500</td>
    <td>150</td>
    <td><button class="actionbutton">neu</button>
        <button class="actionbutton">bearbeiten</button>
        <button class="actionbutton">löschen</button>
    </td>  
  </tr>
  <tr>
    <td>Rahel</td>
    <td>Hall</td>
    <td>Mahrenstrasse 6, 4654 Lostorf</td>
    <td>078 756 24 35</td>
    <td>2600</td>
    <td>150</td>
    <td><button class="actionbutton">neu</button>
        <button class="actionbutton">bearbeiten</button>
        <button class="actionbutton">löschen</button>
    </td> 
  </tr>
  <tr>
    <td>Marco</td>
    <td>Mancuso</td>
    <td>bla bla 118, 4654 Bas Säckingen</td>
    <td>078 756 24 35</td>
    <td>1500</td>
    <td>150</td>
    <td><button class="actionbutton">neu</button>
        <button class="actionbutton">bearbeiten</button>
        <button class="actionbutton">löschen</button>
    </td> 
  </tr>
  <tr>
    <td>Raphael</td>
    <td>Denz</td>
    <td>hiersteineralle 118, 4000 Basel</td>
    <td>078 756 24 35</td>
    <td>1500</td>
    <td>150</td>
    <td><button class="actionbutton">neu</button>
        <button class="actionbutton">bearbeiten</button>
        <button class="actionbutton">löschen</button>
    </td> 
  </tr>-->
</table>
