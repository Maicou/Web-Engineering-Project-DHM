<?php
/**
 * Initially created by w3schools.com
 * Extended by Andreas Martin for teaching purposes
 * 
 * Extended by Marco Mancuso, David Hall, Raphael Denz
 */
$servername = $_SERVER['SERVER_NAME'];
$username = "root";
$password = "";
$dbname = "dhm_rental_management";

//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
//} catch (PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}
//
//$conn = null;