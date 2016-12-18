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
        <title>Insert the Title</title>
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
                <h2> Rechnungen: Anton-Leo Haus </h2>

                <?php
                ?>

                <table>
                    <button class="actionbutton" onclick="window.location.href = 'InvoiceAdministration/createInvoiceHouse1'">Rechnung hinzufügen</button> 

                    <tr>
                        <th>Rechnungsnummer</th>
                        <th>Beschreibung</th>
                        <th>Eingangsdatum</th>
                        <th>Zahlungsdatum</th>
                        <th>Betrag</th>
                    </tr>
                    <?php
                    require_once 'app/models/PDO_Database.inc.php';
                    try {
                        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn = Database::connect();
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = "SELECT eid, expense_description, expense_received, payment_date, Expensetypes_id, amount FROM `Expenses` WHERE anton_leo_house = 'true';";
                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }

                    $amount1 = 0;
                    $amount2 = 0;
                    foreach ($conn->query($stmt) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['eid'] . '</td>';
                        echo '<td>' . $row['expense_description'] . '</td>';
                        echo '<td>' . $row['expense_received'] . '</td>';
                        echo '<td>' . $row['payment_date'] . '</td>';
                        echo '<td>' . $row['amount'] . ' €' . '</td>';
                        echo '<td width=250>';
                        $amount1 = $amount1 + $row['amount'];

//                echo '<a class="btn" href="read.php?id=' . $row['id'] . '">Read</a>';
                        //$row[''];
                        echo '&nbsp;';

                        echo '<a class="actionbutton" href="InvoiceAdministration/updateInvoiceHouse1/' . $row['eid'] .'/' . 'one' .'">Update</a>';
                        echo '&nbsp;';
                        echo '<a class="actionbutton" href="InvoiceAdministration/deleteInvoice/' . $row['eid'] . '/' . "1" . '">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td><b>' . $amount1 . '.00' . ' €' . '</b></td>';
                    echo '<td></td>';

                    $conn = Database::disconnect();
                    ?>
                </table>
