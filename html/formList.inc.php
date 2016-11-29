<ul>
    <!--<form action="../libs/fpdf181/PrintPDFs.php" method="post">-->
<!--        <li>  <select name="Gebäude">
                <option selected="selected" value="1">Gebäude 1</option>
                <option value="2">Gebäude 2</option>
                <option value="3">Gebäude 3</option>
            </select>
        </li>
        <li> <input type="email" name="email"  placeholder="Email"/>
            <input type="password" name="password"  placeholder="Passwort"/>
            <input type="submit" class="login" value="signIn"/>
        </li>-->
    
    <!--<h3>Herzlich Willkommen <i><?php echo "".$_SESSION['user'].""?></i></h3>-->
    <h3 style="text-align: left">Herzlich Willkommen <i><?php echo "".$_SESSION['user'].""?></i></h3> 
     <form action="../public/Login/loginOutFunction" style="text-align:right;" method="post">
         
         <li style="margin-right: 11px;">
            <input type="submit" " class="logout" value="Logout" />
         </li>
     </form>
</ul>
