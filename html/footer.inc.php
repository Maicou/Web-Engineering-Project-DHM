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
    <li> &copy DHM-Engineering  </li>
    <li>
        Kontakt: bla bla
    </li>
</ul>
