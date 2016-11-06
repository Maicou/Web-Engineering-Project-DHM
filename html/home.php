<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />
        <title>DHM Hausverwaltung</title>
        <meta charset="UTF-8">
        <!--        jqueryscripting
                <script src=""></script>-->

        <!--            javascript
                    <script tpye="text/javascript">
                        
                    </script>-->


    </head>
    <body>
        <?php
        include "menubarTOP.inc.php";
        include "header.inc.php";
        include "buildingList.inc.php";
        ?>
        <section id="main">
            <nav class="nav2">
                <section id="mainMenu"> 
                    <ul>
                        <li>   <a href="../html/home.php" class="active">Startseite</a> </li>
                        <li>   <a href="../html/buildingreview.php"  >Gebäudeübersicht</a> </li>
                        <li>   <a href="../html/mainRentalAdministration.php" >Hauptmieterverwaltung</a> </li>
                        <li>   <a href="../html/mainInvoiceAdministration.php" >Hauptrechnungsverwaltung</a> </li>
                    </ul>
                </section>              
            </nav>
            <div class="content">                                           
                <p class="thick1">Info:</p>
                <p>bla böa lba 
                </p>
            </div>    
        </section>
<?php
include "footer.inc.php";
?>

    </body>
</html>
