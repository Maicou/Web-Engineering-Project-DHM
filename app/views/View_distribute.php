<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
@author Marco Mancuso, Raphael Denz, David Hall
-->
<html>
    <head>
        <?php
//        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, strpos($_SERVER["SERVER_PROTOCOL"], '/'))) . '://';      
//        $server = $_SERVER['SERVER_NAME'];        
//        $path = explode('/', filter_var(rtrim($_SERVER['PHP_SELF'], '/')));
//        $DS = "/";         
//        $base = $protocol.$server.$DS.$path[1].$DS.$path[2].$DS;
//        echo $base;
//        
        ?>
        <base href="https://localhost/Web-Engineering-Project-DHM/" />
        <link rel="stylesheet" type="text/css" href="styles/masterLayout.css" />
        <!--Head Information and meta-->
        <?php
        include 'html/headArea.inc.php';
        ?>
        
        <title>Umschlagen</title>
       
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
                <!--the content-->
                
                <?php
             
                ?> 


