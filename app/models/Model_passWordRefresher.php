<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_mainRental
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class Model_passWordRefresher {

    private $email;
    private $password;

    function getBenutzername() {
        return $this->email;
    }

    function getPasswort() {
        return $this->password;
    }

    function setBenutzername($benutzername) {
        $this->email = $benutzername;
    }

    function setPasswort($passwort) {
        $this->password = $passwort;
    }


    
    public function customizingPassWord() {
        
        
        
    }

}
