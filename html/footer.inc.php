</div>    
</section>
<footer>
<ul>
    <li>
        <?php
        $Wochentag = date("w");
        $Datum = date("j. F Y");
        $Uhrzeit = date("H:i");
        $WochentagDeutsch = array("Sonntag", "Montag", "Dienstag", "Mittwoch",
            "Donnerstag", "Freitag", "Samstag");
        echo "$WochentagDeutsch[$Wochentag]";
        echo " der $Datum";
        echo ", $Uhrzeit Uhr";
        ?>
    </li>
    <li> &copy DHM-Mieterverwaltung  </li>
    <li>
        Kontakt: Marco Mancuso Ihr Schwager 
    </li>
</ul>
</footer>
    </body>
</html>
