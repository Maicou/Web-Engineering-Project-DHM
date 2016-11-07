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

                        <li>   <a href="../public/home/">Startseite</a> </li>
                        <li>   <a href="vorlagen/buildingreview.php" class="active" >Gebäudeübersicht</a> </li>
                        <li>   <a href="vorlagen/mainRentalAdministration.php" >Hauptmieterverwaltung</a> </li>
                        <li>   <a href="vorlagen/mainInvoiceAdministration.php" >Hauptrechnungsverwaltung</a> </li>
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
            
            <div class="content">
                <div class="boxPicturePos">
                                           
           <a href="../public/"><img class="IMGtransparency1" src="../picture/house-02.jpg" alt="Style 2" title="Style 2" /></a>
           <a href="../public/"><img class="IMGtransparency1" src="../picture/exterior11.jpg" alt="Style 2" title="Style 2" /></a>
           <a href="../public/"><img class="IMGtransparency1" src="../picture/AHC - 16 - 5.2mill.jpg" alt="Style 2" title="Style 2" /></a>
                </div>


            </div>
            
        </section>
        
        <?php
          include "footer.inc.php";
        ?>
            
        
    </body>
</html>
