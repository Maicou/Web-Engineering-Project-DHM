<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//        session_unset();
//        $_SESSION = array();
//        
//        if (ini_get("session.use_cookies")) {
//    $params = session_get_cookie_params();
//    setcookie(session_name(), '', time() - 42000, $params["path"],
//        $params["domain"], $params["secure"], $params["httponly"]
//    );
//    }      
        $date = date("Y-m-d");
        setcookie("date", $date);
        require_once 'app/init.php';
        
        $app= new App();
        
//        echo "<h1>Hey there!! Here is DHM Engineering - This page is under construction<h1>";
        ?>
    </body>
<!--    <a href="../html/home.php"> HOME </a>-->
</html>
