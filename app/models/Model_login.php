<?php

/**
 * Description of Model_home
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class Model_login {

    private $email;
    private $password;
    private $username;

    function getUsername() {
        return $this->username;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function getUserMail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setUserMail($benutzername) {
        $this->email = $benutzername;
    }

    function setPassword($passwort) {
        $this->password = $passwort;
    }

    public function loginTestingAdvanced() {
        if (isset($_POST['email']) AND isset($_POST['password'])) {
            $this->setUserMail($_POST['email']);
            $this->setPassword($_POST['password']);
            $pass = SHA1(md5($this->password));            
            require_once 'app/models/PDO_Database.inc.php';
            try {
                $conn = Database::connect();
                $conn->exec('set names utf8');

                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT username, email, password FROM `user` WHERE email=:email and password=:password");
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':password', $pass);

                $stmt->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = Database::disconnect();

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    if ($pass == $row['password'] && $this->email == $row['email']) {
                        $_SESSION['loggedIn'] = true;
                        $this->setUsername($row['username']);
                        $_SESSION['user'] = $this->getUsername();
                        echo "<h2> Hallo " . $_SESSION['user'] . " Sie haben sich erfolgreich eingeloggt Willkommen bei DHM </br> "
                        . "Ihre Session ID " . session_id() .'</br>' ;
                        echo 'Klicken Sie <a href="https://localhost/Web-Engineering-Project-DHM/Home"> hier </a> um auf Home zu gelangen </h2>';
                    } else {
                        echo "Login nicht erfolgreich... </br>";
                        $_SESSION['loggedIn'] = false;
                    }
                }
            } else {
                echo "Login nicht erfolgreich :( </br> ";
                $_SESSION['loggedIn'] = false;
                echo 'Klicken Sie <a href="Login"> hier </a> um auf Login zurückzugehen';
            }
        } else {
            echo 'Email und Passwort eingeben bitte :) </br> ';
            $_SESSION['loggedIn'] = false;
            echo 'Klicken Sie <a href="Login"> hier </a> um auf Login zurückzugehen';
        }
    }

    function resetPassWord() {
        if (isset($_POST['user'])) {
            $this->setUserMail($_POST['user']);
            require_once 'app/models/PDO_Database.inc.php';
            try {
                $conn = Database::connect();
                $conn->exec('set names utf8');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt1 = $conn->prepare("SELECT email FROM `user` WHERE email=:email");
                $stmt1->bindParam(':email', $this->email);
                $stmt1->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $conn = Database::disconnect();
            if ($stmt1->rowCount() > 0) {
                $chars = ("abcdefghijklmnopqrstuvwxyz1234567890+-_ABCDEFGHIJKLMNOPQRSTUVWXYZ$/=.,");
                $newpwd = 'x';
                for ($i = 0; $i < 12; $i++) {
                    @$newpwd .= $chars{mt_rand(0, strlen($chars))};
                }
                //for mailing to the user
                $betreff = "Neues Passwort von DHM-Mietverwaltung";
                $inhalt = "Sehr geehrter User\n\n"
                        . "Ihr neues Passwort lautet: $newpwd. Viel Spaß beim Verwenden des DHM-Mietverwaltungstools.\n\n"
                        . "Freundliche Grüsse"
                        . "\nIhr DHM-Mieterverwaltungsteam\n";
                $header = "From: info@dhm-mietverwaltung.com";
                
                mail($this->email, $betreff, $inhalt, $header);
        
                $this->setPassword(SHA1(md5($newpwd)));
                //update Statement
                try {
                    $conn = Database::connect();
                    $conn->exec('set names utf8');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("UPDATE user SET password=:password WHERE email=:email");
                    $stmt->bindParam(':email', $this->email);
                    $stmt->bindParam(':password', $this->password);
                    $stmt->execute();
                    // write a log about this
                    $timestamp = date('Y-m-d G:i:s');
                    $handle = fopen("log.csv", "a");
                    fwrite($handle, $this->getUserMail());
                    fwrite($handle, "|");
                    fwrite($handle, $timestamp);
                    fwrite($handle, "|");
                    // to delete before app ready!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    fwrite($handle, $newpwd);
                    fwrite($handle, "| \n");
                    fclose($handle);
                    echo "<h2>Das neue Passwort wurde Ihnen an $this->email zugeschickt.<br/> </h2>";
                    echo 'Klicken Sie <a href="Login"> hier </a> um auf Login zurückzugehen';
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                } $conn = Database::disconnect();
            } else {
                echo "Diese E-Mail ist keine User-Adresse!";
                 echo 'Klicken Sie <a href="Login"> hier </a> um auf Login zurückzugehen';
            }
        } else {
            echo 'gültige E-Mail-Adresse eingeben bitte :)';
             echo 'Klicken Sie <a href="Login"> hier </a> um auf Login zurückzugehen';
        }
    }

}
