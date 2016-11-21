<?php

$benutzer = "root";
$passwort = "";
$dbname = "logins";

$link = mysqli_connect("localhost", $benutzer, $passwort)
        or die("Keine Verbindung zur Datenbank!");

        mysqli_select_db($link, $dbname) or die("Datenbank nicht gefunden!");
?>