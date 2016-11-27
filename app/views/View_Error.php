<!DOCTYPE html>
<?php
//      session_unset();
//        $_SESSION = array();
//        
//        if (ini_get("session.use_cookies")) {
//    $params = session_get_cookie_params();
//    setcookie(session_name(), '', time() - 42000, $params["path"],
//        $params["domain"], $params["secure"], $params["httponly"]
//    );
//    }      
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/public/" />
        <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h2> ERROR - Ups da ist wohl etwas schief gelaufen! </br>
            Sie werden weitergeleitet
        </h2>
        <?php
         if (@$_SESSION['loggedIn'] == true) {
        header("refresh:3.5; url=https://localhost/Web-Engineering-Project-DHM/public/Home");
           
        }else{
        header("refresh:3.5; url=https://localhost/Web-Engineering-Project-DHM/public/Login");
        }
        ?>
    </body>
</html>
