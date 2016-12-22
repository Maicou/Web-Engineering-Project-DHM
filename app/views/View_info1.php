<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <base href= "https://localhost/Web-Engineering-Project-DHM/"/>
        <link rel="stylesheet" type="text/css" href="styles/masterLayout.css" />
        <!--Head Information and meta-->
        <?php
        include 'html/headArea.inc.php';
        ?>

        <title>Informationen Anton-Leo-Str. 6</title>
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
            include 'html/header.inc.php';
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
                <?php
                require_once 'app/models/PDO_Database.inc.php';
                $conn = Database::connect();
                $conn->exec('set names utf8');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM tenant WHERE tenant.Accommodation_id <=8;");
                $stmt->execute();
                $totalsp;
                $tenantNumber = 0;
                $amount = 0;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $tenantNumber++;
                }
                $stmt = ("SELECT * FROM tenant JOIN incomings WHERE incomings.Tenant_tid = tenant.tid AND incomings.Incometypes_id = 1 and tenant.Accommodation_id <=8;");
                foreach ($conn->query($stmt) as $row) {
                    $amount += $row['amount'];
                }
                $stmt = ("SELECT * FROM tenant JOIN incomings WHERE incomings.Tenant_tid = tenant.tid AND incomings.Incometypes_id = 2 and tenant.Accommodation_id <=8;");
                foreach ($conn->query($stmt) as $row) {
                    $amount += $row['amount'];
                }
                $stmt = ("SELECT totalLivingSpace FROM `building` WHERE building.id = '1';");
                foreach ($conn->query($stmt) as $row) {
                    $totalsp = $row['totalLivingSpace'];
                }
                ?>
            </nav>
            <div class="content">                                           
                <!--the content-->
                <table>
                    <th><b><h2>Information: Anton-Leo-Gebäude</h2></b></th>
                    <th></th>
                    <tr>
                        <td>Strasse:</td> <td>Anton-Leo-Str. 6</td>
                    </tr>
                    <tr>
                        <td>PLZ:</td> <td>79713</td>
                    </tr>
                    <tr>
                        <td>Anzahl Mieter:</td> <td><?php echo $tenantNumber; ?></td>
                    </tr>
                    <tr>
                        <td>Gesamteinnahmen:</td> <td><?php echo $amount; ?></td>
                    </tr>
                    <tr>
                        <td>Gesamtfläche:</td> <td><?php echo $totalsp; ?></td>
                    </tr>
                </table>
            </div>
        </section>
        <?php
// put your code here
        ?>
    </body>
</html>
