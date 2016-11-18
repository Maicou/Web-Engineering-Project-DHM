<?php
//session_start();
?>
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/public/" />
        <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />
        <!--Head Information and meta-->
        
        <title>Login</title>
    </head>
    <body>
         <form action="../public/Login/valideUser" method="post">
            <input type ="text" name ="benutzername"> Benutzername<br/>
            <input type ="password" name ="kennwort"> Passwort<br/>
            <input type ="submit" value="einloggen"/>
            <input type ="reset" value="nochmals"/>
        </form>
        <br/>
        <a href="../public/Login/newRegistration"> Neu registrieren </a>
        
        
    </body>
</html>
        

