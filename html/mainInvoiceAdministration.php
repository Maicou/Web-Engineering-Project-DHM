<!DOCTYPE html>

<html>
    <head>
         <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />

        <meta charset="UTF-8">
        <title></title>
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

                        <li>   <a href="../html/home.php">Startseite</a> </li>
                        <li>   <a href="../html/buildingreview.php" >Gebäudeübersicht</a> </li>
                        <li>   <a href="../html/mainRentalAdministration.php" >Hauptmieterverwaltung</a> </li>
                        <li>   <a href="../html/mainInvoiceAdministration.php" class="active">Hauptrechnungsverwaltung</a> </li>
                    </ul>
                </section>
                <section id="subMenu">
                    <ul>

                        <li>   <a href="#" class="active">Hausübersicht</a> </li>
                        <li>   <a href="#" >Mieterverwaltung</a> </li>
                        <li>   <a href="#" >Rechnungsverwaltung</a> </li>
                        <li>   <a href="#" >Informationsübersicht</a> </li>
                    </ul>

                </section>

            </nav>
        </section>
        
        <?php
          include "footer.inc.php";
        ?>
            
        
    </body>
</html>
