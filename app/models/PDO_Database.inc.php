<?php

/**
 * Initially created by w3schools.com
 * Extended by Andreas Martin for teaching purposes
 * 
 * Extended by Marco Mancuso, David Hall, Raphael Denz
 */
//$servername = $_SERVER['SERVER_NAME'];
//$username = "root";
//$password = "";
//$dbname = "dhm_rental_management";

class Database {

    private static $dbName = 'dhm_rental_management';
    //private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $cont = null;

    public function __construct() {
        exit('Init function is not allowed');
    }

    public static function connect() {
        // One connection through whole application
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . $_SERVER['SERVER_NAME'] . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect() {
        self::$cont = null;
    }

}
