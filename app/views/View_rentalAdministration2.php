<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
@author Marco Mancuso, Raphael Denz, David Hall
-->
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/" />
        <link rel="stylesheet" type="text/css" href="styles/masterLayout.css" />
        <!--Head Information and meta-->
        <?php
        include 'html/headArea.inc.php';
        ?>
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
            include 'html/headerRentalAdministration.inc.php';
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
                <h2> Mietverwaltung: Hauensteingebäude </h2>

                <?php
                ?>

                <table>
                    <button class="actionbutton" onclick="window.location.href = 'RentalAdministration/createTenantHouse2'">Mieter hinzufügen</button> 

                    <tr>
                        <th>Vorname</th>
                        <th>Nachname</th>
                        <th>Adresse</th>
                        <th>Miete</th>
                        <th>Nebenkosten</th>
                        <th>Kaution</th>
                    </tr>
                    <?php
                    require_once 'app/models/PDO_Database.inc.php';
                    try {
                        $conn = Database::connect();
                        // set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = "SELECT * FROM tenant JOIN incomings WHERE incomings.Tenant_id = tenant.tid AND incomings.Incometypes_id = 1 and tenant.Accommodation_id >= 9;";
                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }

                    foreach ($conn->query($stmt) as $row) {
                        $tid = $row['tid'];
                        $id = $row['id'];
                        $Accommodation_id = $row['Accommodation_id'];

                        echo '<tr>';
                        echo '<td>' . $row['forename'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['street'] . '</td>';
                        echo '<td>' . $row['amount'] . ' €' . '</td>';
                        $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 2;";
                        foreach ($conn->query($stmt) as $row) {
                            echo '<td>' . $row['amount'] . ' €' . '</td>';
                        }

                        $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 4;";
                        foreach ($conn->query($stmt) as $row) {
                            echo '<td>' . $row['amount'] . ' €' . '</td>';

                            echo '<td width=250>';
                            echo '&nbsp;';
                            echo '<a class="actionbutton" href="RentalAdministration/updateTenantHouse2/' . $tid . '">Update</a>';
                            echo '&nbsp;';
                            echo '<a class="actionbutton" href="RentalAdministration/deleteTenants/' . $tid . '/' . $id . '/' . $Accommodation_id . '/' . "two" . '">Delete</a>';
                        }
                    }
                    $conn = Database::disconnect();
                    ?>
                </table>