<?php

/**
 * Description of Model_home
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class Model_login {

    private $benutzername;
    private $passwort;

    function getBenutzername() {
        return $this->benutzername;
    }

    function getPasswort() {
        return $this->passwort;
    }

    function setBenutzername($benutzername) {
        $this->benutzername = $benutzername;
    }

    function setPasswort($passwort) {
        $this->passwort = $passwort;
    }

    public function loginTesting() {
        //  session_start();
        if (isset($_POST['email']) AND isset($_POST['password'])) {

            if ($_POST['email'] == "martin" AND $_POST['passwort'] == 1234) {
                $_SESSION['eingeloggt'] = true;
            } else {
                $_SESSION['eingeloggt'] = false;
                echo "das ist falsch";
            }
        }
    }

    public function loginTestingAdvanced() {
        if (isset($_POST['email']) AND isset($_POST['password'])) {
            

            $this->setBenutzername($_POST['email']);
            $this->setPasswort($_POST['password']);
            $pass=md5($this->passwort);
            
           require_once '../app/models/db.inc.php';
           
            $abfrage = "SELECT email, password FROM `users` WHERE email='$this->benutzername' and password='$this->passwort'";        
            $ergebnis = mysqli_query($link, $abfrage) or die("Email oder Passwort stimmt nicht!");
            $count = mysqli_num_rows($ergebnis);
           
            if ($count == 1) {
                
                echo "Herzlich willkommen im VIP-Bereich!<br/>";
                echo "Ihre Session-ID: " . session_id();
           
                $_SESSION['eingeloggt'] = true;
                header("refresh:2.5; url=../Home");
            } 
            else{
                $_SESSION['eingeloggt'] = false;
                header("refresh:2.5; url=../Login");
                echo "Login nicht geklappt, Sie werden automatisch weitergeleitet";
            }
        } else {
            echo "hier gehts nicht mehr weiter...";
      }
    }

}
