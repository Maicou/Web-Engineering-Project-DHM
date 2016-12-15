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
           <nav class="nav3">
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

                <h2> Gesamteinnahmen </h2>
                <table>
                    <button class="actionbutton" onclick="window.location.href = '../public/TotalRevenue/revenueHouseOne'">Anton-Leo Haus</button> 
                    <button class="actionbutton" onclick="window.location.href = '../public/TotalRevenue/revenueHouseTwo'">OVR Haus</button> 
                    <tr>
                        <th>Vorname</th>
                        <th>Nachname</th>
                        <th>Adresse</th>
                        <th>Miete</th>
                        <th>Nebenkosten</th>
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
                        $amount1 = 0;
                        $amount2 = 0;
                        $tid = $row['tid'];
                        echo '<tr>';
                        echo '<td>' . $row['forename'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['street'] . '</td>';
                        echo '<td>' . $row['amount'] . ' €' . '</td>';
                        $amount1 += $row['amount'];

//                $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 1;";
//                foreach ($conn->query($stmt) as $row) {
//                    $this->setRentalIncome($row['amount']);
//                }
                        $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 2;";
                        foreach ($conn->query($stmt) as $row) {
                            echo '<td>' . $row['amount'] . ' €' . '</td>';
                            $amount2 += $row['amount'];
                        }
                        

//                $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 4;";
//                foreach ($conn->query($stmt) as $row) {
//                 echo '<td>' . $row['amount'] . ' €' .'</td>';
//                }
//                echo '<td width=250>';
////                echo '<a class="btn" href="read.php?id=' . $row['id'] . '">Read</a>';
//                echo '&nbsp;';
////                echo '<a class="actionbutton" href="update.php?id=' . $row['id'] . '">Update</a>';
////                echo '&nbsp;';
////                echo '<a class="actionbutton" href="delete.php?id=' . $row['id'] . '">Delete</a>';
//                echo '</td>';
//                echo '</tr>';
                    }
                    echo '</tr>';
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td><b>'.$amount1.'.00'.' €'.'</b></td>';
                        echo '<td><b>'.$amount2.'.00'.' €'.'</b></td>';



                    $conn = Database::disconnect();
                    ?>
                </table>