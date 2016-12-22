<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
@author Marco Mancuso, Raphael Denz, David Hall
-->
<html>
    <head>

        <base href= "https://localhost/Web-Engineering-Project-DHM/"/>
        <link rel="stylesheet" type="text/css" href="styles/masterLayout.css" />
        <!--Head Information and meta-->
        <?php
        include 'html/headArea.inc.php';
        ?>
        <title>Rechnungsverwaltung</title>
    </head>
    <body>
        <section id="menubar">
            <!--Top menu button bar-->
            <?php
            include 'html/menubarTOP.inc.php';
            ?>
        </section>
        <header id="header" class="header">
            <!--Header-->
            <?php
            include 'html/headerInvoiceAdministration.inc.php';
            ?>
        </header>  
        <nav class="nav1">           
            <!--form and logout etc-->
            <?php
            include 'html/formList.inc.php';
            ?> 
        </nav>
        <section id="main">
            <nav class="nav3">
                <section id="mainMenu"> 
                    <!--the main menu-->
                    <?php
                    include 'html/mainMenu.inc.php';
                    ?> 
                </section>

            </nav>
            <div class="content">  
                <h2> Rechnungsverwaltung </h2>

                <?php
                ?>

                <table>   
                    <tr>
                        <th>Gebäude-Nr.</th>
                        <th>Rechnungsnummer</th>
                        <th>Beschreibung</th>
                        <th>Eingangsdatum</th>
                        <th>Zahlungsdatum</th>
                        <th>Betrag</th>
                    </tr>
                    <?php
                    require_once 'app/models/PDO_Database.inc.php';
                    try {
                        $conn = Database::connect();
                        $conn->exec('set names utf8'); 
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = "SELECT * FROM `expenses` WHERE Building_id = '1' OR '2';";
                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                    $amount1 = 0;
                    $amount2 = 0;
                    foreach ($conn->query($stmt) as $row) {
                        echo '<tr>';
                        if($row['Building_id']==1){
                            echo '<td>' . 'Anton-Leo' . '</td>';
                        }else{
                            echo '<td>' . 'Hauensteinerstr.' . '</td>';
                        }
                       //echo '<td>' . $row['Building_id'] . '</td>';
                        echo '<td>' . $row['eid'] . '</td>';
                        echo '<td>' . $row['expense_description'] . '</td>';
                        echo '<td>' . $row['expense_received'] . '</td>';
                        echo '<td>' . $row['payment_date'] . '</td>';
                        echo '<td>' . $row['amount'] . ' €' . '</td>';         
                        echo '<td width=250>';
                        $amount1 = $amount1 + $row['amount'];
                        echo '&nbsp;';
                        echo '<a class="actionbutton" href="Distribute/index/'.$row['amount'].'/'. $row['Building_id'].'/'.$row['eid'].'/'.$row['expense_description'].'">Umschlagen</a>';
//                        echo '<a class="actionbutton" href="../public/InvoiceAdministration/updateTenantHouse1/' . $row['eid'] . '">Update</a>';
//                        echo '&nbsp;';
//                        echo '<a class="actionbutton" href="../public/InvoiceAdministration/deleteTenants/' . $row['id'] . '/' .$row['id']. '/' .$row['Accommodation_id'].'/' ."one".'">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td><b>' . $amount1 . ' €' . '</b></td>';
                    echo '<td></td>';
                    $conn = Database::disconnect();
                    ?>
                </table>
