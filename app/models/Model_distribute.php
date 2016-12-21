<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_distribute
 *
 * @author Marco Mancuso
 */
class Model_distribute {

    private $amount;
    private $Building_id;
    private $eid;
    private $description;
    private $accommodation;
    private $accomodationName;
    private $tenant;
    private $tenantId;
    private $income;
    private $totalSpace;
    private $accSpace;

    function getTotalSpace() {
        return $this->totalSpace;
    }

    function getAccSpace() {
        return $this->accSpace;
    }

    function setTotalSpace($totalSpace) {
        $this->totalSpace = $totalSpace;
    }

    function setAccSpace($accSpace) {
        $this->accSpace = $accSpace;
    }

    function getTenantId() {
        return $this->tenantId;
    }

    function setTenantId($tenantId) {
        $this->tenantId = $tenantId;
    }

    function getAccomodationName() {
        return $this->accomodationName;
    }

    function getTenant() {
        return $this->tenant;
    }

    function getIncome() {
        return $this->income;
    }

    function setAccomodationName($accomodationName) {
        $this->accomodationName = $accomodationName;
    }

    function setTenant($tenant) {
        $this->tenant = $tenant;
    }

    function setIncome($income) {
        $this->income = $income;
    }

    function getAccommodation() {
        return $this->accommodation;
    }

    function setAccommodation($accommodation) {
        $this->accommodation = $accommodation;
    }

    function getAmount() {
        return $this->amount;
    }

    function getBuilding_id() {
        return $this->Building_id;
    }

    function getEid() {
        return $this->eid;
    }

    function getDescription() {
        return $this->description;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setBuilding_id($Building_id) {
        $this->Building_id = $Building_id;
    }

    function setEid($eid) {
        $this->eid = $eid;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    public function calculate($amount, $Building_id, $eid, $description) {
        $this->setAmount($amount);
        $this->setBuilding_id($Building_id);
        $this->setEid($eid);
        $this->setDescription($description);
        require_once 'app/models/PDO_Database.inc.php';
        $conn = Database::connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo"<table><tr><td>";
        $stmt = "SELECT * FROM `building` WHERE building.id = '$this->Building_id';";
        if ($this->Building_id == 2) {
            echo "<h3>Rechnung für Hauensteinerstr. 7</h3></br>";
        } else {
            echo "<h3>Rechnung für Anton-Leo-Str. 6</h3></br>";
        }
        echo '<h3> Rechnungsnummer: ' . $this->eid . ' </h3> </br>';
        echo '<h3> Beschreibung: ' . $this->description . ' </h3> </br>';
        echo '<h3> Betrag: ' . $this->amount . ' € </h3> </br>';
        foreach ($conn->query($stmt) as $row) {
            $this->totalSpace = $row['totalLivingSpace'];
            echo '<h3> Gilt für Quadratmeter: ' . $this->totalSpace . ' </h3> </br>';
            echo"</td><td>";
            echo 'umschlagen auf: ';
        }
        $conn = Database::disconnect();
        if ($this->Building_id == 2) {
            echo '<form action="Distribute/calcValue/' . $this->amount . '/' . $this->Building_id . '/' . $this->totalSpace . '/' . $this->description . '" method="post">'
            . '<select name="roomnumber">';
            echo' <option value="0" hidden>Bitte auswählen</option> 
        <option value = "9">Büro 1</option>
        <option value = "10">Wohnung 1</option>
        <option value = "11">Wohnung 2</option>
        <option value = "12">Wohnung 3</option>
        <option value = "13">Wohnung 4</option>
        <option value = "14">Wohnung 5</option>
        <option value = "15">Wohnung 6</option>
        <option value = "16">Wohnung 7</option>
        <option value = "17">Wohnung 8</option>
        <option value = "18">Wohnung 9</option>
        <option value = "19">Wohnung 10</option>
        <option value = "20">Wohnung 11</option>
        <option value = "21">Wohnung 12</option>
        <option value = "22">Wohnung 13</option>
        <option value = "23">Wohnung 14</option>
        </select>
        <input type="submit" value="berechnen" class="actionbutton"/>
        </form>';
        } else {
            echo '<form action="Distribute/calcValue/' . $this->amount . '/' . $this->Building_id . '/' . $this->totalSpace . '/' . $this->description . '" method="post">';
            echo'<select name="roomnumber">
                    <option value="0" hidden>Bitte auswählen</option>
                    <option value="1">Büro 1</option>
                    <option value="2">Büro 2</option>
                    <option value="3">Büro 3</option>
                    <option value="4">Büro 4</option>
                    <option value="5">Wohnung 1</option>
                    <option value="6">Wohnung 2</option>
                    <option value="7">Wohnung 3</option>
                    <option value="8">Wohnung 4</option>
                 </select>
             <input type="submit" value="berechnen" class="actionbutton"/>
        </form>';
        }
        echo '<form action="libs/pdfgenerator/generatoren/pdf_jahresabrechnung_umschlag.php" method="post">';

        echo'<select name="eid">
                    <option value="0" hidden>Bitte auswählen</option>
                    <option value=' . $this->eid . '>' . $this->eid . ' - Diese Rechnung</option>
                    
                 </select>';
        echo 'Auf alle Räumlichkeiten umschlagen (PDF)';
        echo '<input type="submit"/>';
        echo '</form>';
        echo"</td></tr></table>";
    }

    public function calcValue($amount, $Building_id, $totalSpace, $description) {
        $this->setAmount($amount);
        $this->setBuilding_id($Building_id);
        $this->setTotalSpace($totalSpace);
        $this->setDescription($description);
        $this->accommodation = $_POST['roomnumber'];
        // echo $this->accommodation;

        require_once 'app/models/PDO_Database.inc.php';
        $conn = Database::connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // stmt for the accommodation
        $accstmt = "SELECT * FROM `accommodation` WHERE accommodation.Building_id = '$this->Building_id' AND accommodation.id = '$this->accommodation';";
        foreach ($conn->query($accstmt) as $row) {
            $this->accomodationName = $row['variant'] . ' ' . $row['roomnumber'];
            $this->accSpace = $row['accommodationLivingSpace'];
        }
        // stmt for the tenant
        $tenstmt = "SELECT * FROM `tenant` WHERE tenant.Accommodation_id = '$this->accommodation';";
        foreach ($conn->query($tenstmt) as $row) {
            $this->tenant = $row['forename'] . ' ' . $row['name'];
            $this->tenantId = $row['tid'];
        }

        $incstmt = "SELECT * FROM `incomings` WHERE incomings.Tenant_tid = '$this->tenantId' AND incomings.Incometypes_id = '2';";
        foreach ($conn->query($incstmt) as $row) {
            $this->income = $row['amount'];
        }
        ?>
        <html>
            <table>
                <th>Bezeichnung</th>
                <th>Daten</th>    
               
                <tr>
                    <td>Die Accommodation Nummer</td><td><?php echo $this->accommodation?></td>
                </tr>
                <tr>
                    <td>Name der Accommodation</td><td><?php echo $this->accomodationName?></td>
                </tr>
                <tr>
                    <td>Zugehöriger Mieter</td><td><?php echo $this->tenant?></td>
                </tr>
                <tr>
                    <td>Mieter ID</td><td><?php echo $this->tenantId?></td>
                </tr>
                <tr>
                    <td>Betrag der Rechgnung</td><td><?php echo $this->amount?></td>
                </tr>
                <tr>
                    <td>Nebenkosten</td><td><?php echo $this->income?></td>
                </tr>
                <tr>
                    <td>Wohnfläche</td><td><?php echo $this->accSpace?></td>
                </tr>
                <tr>
                    <td>Totalfläche</td><td><?php echo $this->totalSpace?></td>
                </tr>
                <tr>
                <?php
                // Kosten der Rechnung auf diese einzelne Accommodation
                $result = ($this->amount / $this->totalSpace) * $this->accSpace;
                 ?>
                    <td><b>Kosten in €</b></td><td><b><?php echo $result?></b></td>
                </tr>
            </table>
        </html>

        <?php
      
    }

}
