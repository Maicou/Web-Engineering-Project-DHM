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
            $pass = md5($this->password);
            require_once '../app/models/PDO_Database.inc.php';
            try {
                //   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn = Database::connect();

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
                        echo "Hallo " . $_SESSION['user'] . " Sie haben sich erfolgreich eingeloggt Willkommen bei DHM </br> "
                        . "Ihre Session ID " . session_id();
                        header("refresh:4.5; url=../Home");
                    } else {
                        echo "Login nicht erfolgreichr... </br>";
                        $_SESSION['loggedIn'] = false;
                    }
                }
            } else {
                echo "Login nicht erfolgreich :(";
                $_SESSION['loggedIn'] = false;
                header("refresh:2.5; url=../Login");
            }
        } else {
            echo 'Email und Passwort eingeben bitte :)';
            $_SESSION['loggedIn'] = false;
            header("refresh:2.5; url=../Login");
        }
    }

    function resetPassWord() {
        if (isset($_POST['user'])) {
            $this->setUserMail($_POST['user']);
            require_once '../app/models/PDO_Database.inc.php';
            try {
                $conn = Database::connect();
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
                $chars = ("abcdefghijklmnopqrstuvwxyz1234567890+-_");
                $newpwd = 'x';
                for ($i = 0; $i < 8; $i++) {
                    @$newpwd .= $chars{mt_rand(0, strlen($chars))};
                }
                //for mailing to the user
                $betreff = "Neues Passwort von fh-weiterbildung.ch!";
                $inhalt = "Sehr geehrte Kundin\nSehr geehrter Kunde\n\nHier Ihr neues Passwort: '$newpwd'\n
            Freundliche Gr�sse\nIhr FH-Weiterbildungs-Team\nwww.fh-weiterbildung.ch";
                $header = "From: david.hall@hotmail.ch";
                // mail($email, $betreff, $inhalt, $header); Hier noch die Mailverbindung checken!!!

                $this->setPassword(md5($newpwd));
                //update Statement
                try {
                    $conn = Database::connect();
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
                    echo "Das neue Passwort wurde Ihnen an $this->email zugeschickt.<br/>";
                    header("refresh:3.5; url=https://localhost/Web-Engineering-Project-DHM/public/Login");
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                } $conn = Database::disconnect();
            } else {
                echo "Diese E-Mail ist keine User-Adresse!";
                header("refresh:2.5; url=../Login");
            }
        } else {
            echo 'gültige E-Mail-Adresse eingeben bitte :)';
            header("refresh:2.5; url=../Login");
        }
    }

}

//}
