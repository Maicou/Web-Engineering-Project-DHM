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
if (isset($_POST['benutzername']) AND isset($_POST['kennwort'])){
    
     if($_POST['benutzername']=="martin" AND $_POST['kennwort']==1234){
     $_SESSION['eingeloggt']=true;
   
     
     echo "wir sind geil und es hat funktioniert!!!";
     }
     else{
         $_SESSION['eingeloggt'] = false;
         echo "das ist falsch";
     }
   }
  

   
}



}
  
