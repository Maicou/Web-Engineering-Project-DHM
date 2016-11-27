<?php

/**
 * Description of Model_home
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class Model_login {

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

//    public function loginTesting() {
//        //  session_start();
//        if (isset($_POST['email']) AND isset($_POST['password'])) {
//
//            if ($_POST['email'] == "martin" AND $_POST['passwort'] == 1234) {
//                $_SESSION['eingeloggt'] = true;
//            } else {
//                $_SESSION['eingeloggt'] = false;
//                echo "das ist falsch";
//            }
//        }
//    }

    public function loginTestingAdvanced() {
        if (isset($_POST['email']) AND isset($_POST['password'])) {


            $this->setBenutzername($_POST['email']);
            $this->setPasswort($_POST['password']);
            $pass = md5($this->password);

            require_once '../app/models/PDO_Database.inc.php';

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully";
                //$stmt = $conn->prepare("SELECT email, password FROM `user` WHERE email='$this->email' and password='$this->passwort'");

                $stmt = $conn->prepare("SELECT email, password FROM `user` WHERE email=:email and password=:password");
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':password', $pass);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = null;

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    if ($pass == $row['password'] && $this->email == $row['email']) {
                        $_SESSION['loggedIn'] = true;
                        echo "Sie haben sich erfolgreich eingeloggt Willkommen bei DHM </br> "
                        . "Ihre Session ID " . session_id();
                        header("refresh:2.5; url=../Home");
                    } else {
                        echo "Login nicht erfolgreichr... </br>";
                        $_SESSION['loggedIn'] = false;
                    }
                }
            } else {
                echo "Login nicht erfolgreich";
                $_SESSION['loggedIn'] = false;
                header("refresh:2.5; url=../Login");
            }


//            $ergebnis = $stmt->execute() or die("Email oder Passwort stimmt nicht!");
//            $count = mysqli_num_rows($ergebnis);
//            $count = 0 ;
//            if ($count == 1) {
//
//                echo "Herzlich willkommen im VIP-Bereich!<br/>";
//                echo "Ihre Session-ID: " . session_id();
//                echo $stmt;
//                $_SESSION['eingeloggt'] = true;
//                //header("refresh:2.5; url=../Home");
//            } else {
//                $_SESSION['eingeloggt'] = false;
//                //header("refresh:2.5; url=../Login");
//                echo "Login nicht geklappt, Sie werden automatisch weitergeleitet";
//            }
        }
//        else {
//            echo "hier gehts nicht mehr weiter...";
//        }
    }
    
        function resetPassWord() {
//        if (isset($_POST['email']) AND ( $_POST['email'] != '')) {
            $this->setBenutzername('test@test.test');

            $chars = ("abcdefghijklmnopqrstuvwxyz1234567890");
            $newpwd = 'x';
            for ($i = 0; $i < 7; $i++) {
                @$newpwd .= $chars{mt_rand(0, strlen($chars))}; // was bedeute das @$newpwd .=
            }

            $password = $newpwd;
            $betreff = "Neues Passwort von fh-weiterbildung.ch!";
            $inhalt = "Sehr geehrte Kundin\nSehr geehrter Kunde\n\nHier Ihr neues Passwort: '$password'\n
            Freundliche Gr�sse\nIhr FH-Weiterbildungs-Team\nwww.fh-weiterbildung.ch";
            $header = "From: david.hall@hotmail.ch";
            // mail($email, $betreff, $inhalt, $header); Hier noch die Mailverbindung checken!!!

            // Datenbankupdate
            require_once '../app/models/PDO_Database.inc.php';

            $this->setPasswort(md5($newpwd));

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully";
                //$stmt = $conn->prepare("SELECT email, password FROM `user` WHERE email='$this->email' and password='$this->passwort'");

                $stmt = $conn->prepare("UPDATE user SET password=:password WHERE email=:email");
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':password', $this->password);
                $stmt->execute();
                
                $timestamp = date('Y-m-d G:i:s');
                                
                 $handle = fopen("log.csv", "a");
                 fwrite ($handle, $this->getBenutzername());
                 fwrite ($handle, "|" );
                 fwrite ($handle, $timestamp);
                 fwrite ($handle, "|" );
                 fwrite ($handle, $newpwd);
                 fwrite ($handle, "|" );
                 fclose ($handle);
                 
                
                echo "Das neue Passwort wurde Ihnen an $this->email zugeschickt.<br/>";
                header("refresh:3.5; url=https://localhost/Web-Engineering-Project-DHM/public/Login");

                
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

//}
