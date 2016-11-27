
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/public/" />
        <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />
        <!--Head Information and meta-->
        
        <title>Login</title>
    </head>
    
        
    <body>
        <nav class="nav0"> 
         <form action="../public/Login/valideUser" method="post">
            <input type ="text" name ="email" style="margin-bottom: 20px"> E-Mail<br/>
            <input type ="password" name ="password" style="margin-bottom: 20px"> Passwort<br/>
            <input type ="submit" class="login" value="Einloggen"/> 
            <input type ="reset" class="interrupt" value="Abbrechen"/>
        </form>
        <button onclick="window.location.href='../public/Login/refresher'">Passwort vergessen</button> 
     </nav>    
        
    </body>
</html>
        

