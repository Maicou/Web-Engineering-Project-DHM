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
            
            
    <a href="../public/houseoverviews/houseone"><img class="IMGtransparency1" src="../picture/house-02.jpg" alt="Style 2" title="Style 2" /></a> 
    <a href="../public/houseoverviews/housetwo"><img class="IMGtransparency1" src="../picture/exterior11.jpg" alt="Style 2" title="Style 2" /></a>
    <a href="../public/houseoverviews/housethree"><img class="IMGtransparency2" src="../picture/AHC - 16 - 5.2mill.jpg" alt="Style 2" title="Style 2" /></a>

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
                <section id="subMenu">
                    <!--the sub menu-->
                    <?php
                    include '../html/subMenu.inc.php';
                    ?> 
                </section>
            </nav>
            <div class="content">  
                
         
           
                <?php
                ?> 
                <p class="thick1">Info: Wir sind bei Hausuebersicht</p>
