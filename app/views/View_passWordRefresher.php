<html>
    <link rel="stylesheet" type="text/css" href="css.inc.css">
</head>
<head>
    <base href="https://localhost/Web-Engineering-Project-DHM/" />
    <link rel="stylesheet" type="text/css" href="styles/masterLayout.css" />
    <!--Head Information and meta-->

    <title> Reset Login (E-Mail)</title>
</head>
<body>
    <?php
//// Session starten oder �bernehmen
////session_start();
//
//if (isset($_POST['email']) AND ($_POST['email']!=''))
//{
//  $email = $_POST['email'];
//
//  $chars = ("abcdefghijklmnopqrstuvwxyz1234567890"); 
//  $newpwd = 'x'; 
//  for ($i = 0; $i < 7; $i++) 
//  { 
//    @$newpwd .= $chars{mt_rand (0,strlen($chars))}; 
//  } 
//  $passwort = $newpwd;
//  $betreff = "Neues Passwort von fh-weiterbildung.ch!";
//  $inhalt = "Sehr geehrte Kundin\nSehr geehrter Kunde\n\nHier Ihr neues Passwort: '$passwort'\n
//Freundliche Gr�sse\nIhr FH-Weiterbildungs-Team\nwww.fh-weiterbildung.ch";
//  $header = "From: david.hall@hotmail.ch";
//  mail($email,$betreff,$inhalt,$header);
//  
//  // Datenbankupdate
//  include "db.inc.php";
//  $link=mysqli_connect("localhost", $benutzer, $passwort) or die("Keine Verbindung zur Datenbank!");
//  mysqli_select_db($link, $dbname) or die("Datenbank nicht gefunden!");
//  
//  $pass = md5($newpwd);
//  echo "Ihr md5-Passwort: ".$pass."<br/>"; // nur zu Testzwecken
//  $neupasswort = "UPDATE users SET `password`='$pass' WHERE `email`='$email'";
//  $angepasst = mysqli_query($link,$neupasswort);
//
//  if ($angepasst == TRUE)
//	{
//	  echo "Das neue Passwort wurde eingetragen!<br/>";
//	  echo "Ihr Passwort lautet: ".$newpwd;
//	  echo "<br/> <a href=\"index.php\">Login</a><br/>";
//      echo "<br/> <a href=\"login-anpassen-form.php\">Passwort anpassen</a><br/>";
//	} 
//}
//else
//{
//
    ?>
    <h1> Passwort vergessen / neues Passwort anfordern</h1>
    Es wird Ihnen eine E-Mail zugestellt mit einem generierten Passwort. 
    Passen Sie das Passwort bitte anschliessend auf der Webseite an! <br/>
    Ihre Mail-Adresse:<br/>

    <form action="PassWordRefresher/refresher" method="POST">
        <input type="text" name="email" value="" size="40" /> E-Mail-Adresse (als Benutzername)<br/>
        <input type="submit" value="senden" /><input type="reset" value="nochmals" />
    </form> 

</body>
</html>