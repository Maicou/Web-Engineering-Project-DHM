<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/public/" />
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
                <!--the content-->
                <?php
                include '../html/content.inc.php';
                ?> 
            </div>    
        </section>
        <footer>
            <!--the footer-->
            <?php
            include '../html/footer.inc.php';
            ?> 
        </footer>
    </body>
</html>