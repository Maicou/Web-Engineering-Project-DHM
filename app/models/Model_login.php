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
if (isset($_POST['email']) AND isset($_POST['passwort'])){
    
     if($_POST['email']=="martin" AND $_POST['passwort']==1234){
     $_SESSION['eingeloggt']=true;
     }
     else{
         $_SESSION['eingeloggt'] = false;
         echo "das ist falsch";
     }
   }
  

   
}


public function loginTestingAdvanced() {
     Echo "hier bin ich jetzt 1";
    Echo "hier bin ich jetzt 1";
if (isset($_POST['email']) AND isset($_POST['passwort']))
{
 	Echo "hier bin ich jetzt 1.1";
        $email=$_POST['email'];
	$pass=$_POST['passwort']; 
    $pass=md5($pass);	

        $benutzer="root";
        $passwort="";
        $dbname="logins";

    $link=mysqli_connect("localhost", $benutzer, $passwort) or die("Keine Verbindung zur Datenbank!");
    mysqli_select_db($link, $dbname) or die("Datenbank nicht gefunden!");
	
	// prüfen ob es user und passwort gibt
    $abfrage="SELECT email, password FROM `users` WHERE email='$email' and password='$pass'";
	$ergebnis=mysqli_query($link,$abfrage) or die("Email oder Passwort stimmt nicht!");
	$count=mysqli_num_rows($ergebnis);
	Echo "hier bin ich jetzt 2";
 	if ($count == 1) 
	  { 
          Echo "hier bin ich jetzt 3";  
	  $_SESSION['eingeloggt']=true;
	 // $_SESSION['email']=$email;
	  echo "Herzlich willkommen im VIP-Bereich!<br/>";
	  echo "Ihre Session-ID: ".session_id();
	  echo "<br/><a href=\"login_c.php\"> Hier gehts zu den geheimen Daten</a>";
	  echo "<br/><a href=\"login-anpassen-form.php\"> Passwort anpassen </a>";
	  }
	else
	  {
	  $_SESSION['eingeloggt']=false;
	  header("Location:index.php");
	  echo "Login nicht geklappt";
	  }
}else{
    echo "hier gehts nicht mehr weiter...";
}
  
}




}
  
