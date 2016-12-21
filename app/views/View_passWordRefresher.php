<html>
    <link rel="stylesheet" type="text/css" href="css.inc.css">
</head>
<head>
    <base href="https://localhost/Web-Engineering-Project-DHM/" />
    <link rel="stylesheet" type="text/css" href="styles/masterLayout.css" />
    <!--Head Information and meta-->

    <title> Reset Login (E-Mail)</title>
    
    <link rel='stylesheet' href='libs/scripts/jquery-validation-1.15.0/demo/css/screen.css' type='text/css' /> 
        <script src="libs/scripts/jquery-2.2.1.min.js"></script>
        <script src="libs/scripts/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
        <script>    
            $.validator.setDefaults({
                submitHandler: function () {
                    return true; // braucht man nicht zwingend, wenn validierung korrekt ist es okay
                }
            });
            $.validator.methods.email = function (value, element) {
                return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
            };
            $().ready(function () {
                // validate signup form on keyup and submit
                $("#jQueryCheck").validate({
                    rules: {
                        email: {
                            required: true,
                            minlength: 2,
                            email: true
                        },
                        agree: "required"
                    },
                    messages: {
                        email: {
                            required: "Bitte geben Sie eine Email an",
                            minlength: "Die Email muss aus mehr als 2 Zeichen bestehen.",
                            email: "Bitte geben Sie eine gültige Email-Adresse an"
                        },
                    }
                });
                    //code to hide topic selection, disable for demo
                    var newsletter = $("#newsletter");
                    // newsletter topics are optional, hide at first
                    var inital = newsletter.is(":checked");
                    var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
                    var topicInputs = topics.find("input").attr("disabled", !inital);
                    // show when newsletter is checked
                    newsletter.click(function () {
                        topics[this.checked ? "removeClass" : "addClass"]("gray");
                        topicInputs.attr("disabled", !this.checked);
                    });
            });
        </script>
    
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

    <form id="jQueryCheck" action="PassWordRefresher/refresher" method="POST">
        <input type="text" name="email" value="" size="40" /> E-Mail-Adresse (als Benutzername)<br/>
        <input type="submit" value="senden" /><input type="reset" value="nochmals" />
    </form> 

</body>
</html>