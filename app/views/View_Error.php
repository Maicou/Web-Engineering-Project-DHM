
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/" />
        <link rel="stylesheet" type="text/css" href="styles/masterLayout.css" />
        <meta charset="UTF-8">
        <title>Error</title>
    </head>
    <body>

        <h2> ERROR - Ups da ist wohl etwas schief gelaufen! </br>
            Klicken Sie 

            <?php
            if (@$_SESSION['loggedIn'] == true) {
                echo '<a href="Home"> hier </a> um auf Home zurückzugehen';
            } else {
                echo '<a href="Login"> hier </a> um auf Login zurückzugehen';
            }
            ?>
        </h2>
    </body>
</html>
