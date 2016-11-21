
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/public/" />
        <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />
        <!--Head Information and meta-->

        <title>logout</title>
    </head>
    <body>
        <h2> Sie haben sich erfolgreich ausgeloggt. </h2></br>
        <h2> Klicken Sie  <a href="../public/Login"> hier </a>  um sich wieder anzumelden!! </h2>
        <h2> Sie werden automatisch weitergeleitet </h2>
    </body>
</html>

<?php
header("refresh:2.5; url=../public/Login");
?>