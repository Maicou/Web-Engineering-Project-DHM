
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/public/" />
        <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />
        <!--Head Information and meta-->

        <title>Login</title>
    </head>

    

    <body>
     
        <section id="menubar">
            <!--Top menu button bar-->
            <?php
            include '../html/menubarTOP.inc.php';
            ?>
        </section>
           <h1 style="text-align: left; margin-left: 20px">Login</h1>
        <nav class="nav0"> 
            <form action="../public/Login/valideUser" method="post">
                <input type ="email" name ="email" style="margin-bottom: 20px"> E-Mail<br/>
                <input type ="password" name ="password" style="margin-bottom: 20px"> Passwort<br/>
                <input type ="submit" class="login" value="Einloggen">  
                <input type ="reset" class="interrupt" value="Reset"> <br/>
            </form>
            <form method="post" action="../public/Login/refresher">
                
                <input type="email" name="user" style="margin-bottom: 20px"> E-Mail
                <input type="submit" class="login" value="Passwort vergessen" style="margin-bottom: 20px"/>
            </form>
<!--            <button onclick="window.location.href = '../public/Login/refresher'">Passwort vergessen</button> -->
        </nav>    

    </body>



