<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HouseOverviews
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class Model_houseOverviews {

    //  private $name;
    private $size;
    private $adress;
    private $id;
    private $forename;
    private $name;
    private $street;
    private $city;
    private $postalcode;
    private $contract_start;
    private $contract_end;
    private $contract_description;
    private $rentalIncome;
    private $roomnumber;
    private $excludingIncome;
    private $bond;
    private $validation = true;

    function getValidation() {
        return $this->validation;
    }

    function setValidation($validation) {
        $this->validation = $validation;
    }

    function getName() {
        return $this->name;
    }

    function getSize() {
        return $this->size;
    }

    function getAdress() {
        return $this->adress;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSize($size) {
        $this->size = $size;
    }

    function setAdress($adress) {
        $this->adress = $adress;
    }

    function getForename() {
        return $this->forename;
    }

    function getStreet() {
        return $this->street;
    }

    function getCity() {
        return $this->city;
    }

    function getPostalcode() {
        return $this->postalcode;
    }

    function getContract_start() {
        return $this->contract_start;
    }

    function getContract_end() {
        return $this->contract_end;
    }

    function getContract_description() {
        return $this->contract_description;
    }

    function setForename($forename) {
        $this->forename = $forename;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setPostalcode($postalcode) {
        $this->postalcode = $postalcode;
    }

    function setContract_start($contract_start) {
        $this->contract_start = $contract_start;
    }

    function setContract_end($contract_end) {
        $this->contract_end = $contract_end;
    }

    function setContract_description($contract_description) {
        $this->contract_description = $contract_description;
    }

    function getRentalIncome() {
        return $this->rentalIncome;
    }

    function setRentalIncome($rentalIncome) {
        $this->rentalIncome = $rentalIncome;
    }

    function getRoomnumber() {
        return $this->roomnumber;
    }

    function getExcludingIncome() {
        return $this->excludingIncome;
    }

    function setExcludingIncome($excludingIncome) {
        $this->excludingIncome = $excludingIncome;
    }

    function setRoomnumber($roomnumber) {
        $this->roomnumber = $roomnumber;
    }

    function getBond() {
        return $this->bond;
    }

    function setBond($bond) {
        $this->bond = $bond;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function calc($zahl, $nummer) {
        $ergebnis = $zahl * $nummer;
        echo "$ergebnis";
    }

    public function validate() {

        $this->setForename($_POST['forename']);
        $this->setName($_POST['name']);
        $this->setStreet($_POST['street']);
        $this->setCity($_POST['city']);
        $this->setPostalcode($_POST['postalcode']);
        $this->setContract_start($_POST['contract_start']);
        $this->setContract_end($_POST['contract_end']);
        $this->setContract_description($_POST['contract_description']);
        $this->setRentalIncome($_POST['rentalIncome']);
        $this->setRoomnumber($_POST['roomnumber']);
        $this->setExcludingIncome($_POST['excludingIncome']);
        $this->setBond($_POST['bond']);

        if (empty($this->getForename())) {
            $this->validation = false;
        }
        //empty getName should be possible!!!!, missing here in this case


        if (empty($this->getStreet())) {
            $this->validation = false;
        }
        if (empty($this->getCity())) {
            $this->validation = false;
        }
        if (empty($this->getPostalcode())) {
            $this->validation = false;
        }

        if (empty($this->getContract_start())) {
            $this->validation = false;
        }

        // not needed, can be NULL
//        if (empty($this->getContract_end())) {
//            $this->validation = false;
//        }
//        
//        if (empty($this->getContract_description())) {
//            $this->validation = false;
//        }


        if (empty($this->getRentalIncome())) {
            $this->validation = false;
        }
        if (empty($this->getRoomnumber()) OR ($this->getRoomnumber()==0)) {
            $this->validation = false;
        }

        // Bond abzuklären
        if (empty($this->getBond())) {
            $this->validation = false;
        }

        if (empty($this->getExcludingIncome())) {
            $this->validation = false;
        }
        return $this->validation;
    }

    public function writeTenant() {

        require_once '../app/models/PDO_Database.inc.php';

        $valid = $this->validate();
        if ($valid == true) {

            try {
                // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn = Database::connect();
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO `tenant`(`tid`, `Accommodation_id`, `forename`, `name`, `street`, `city`, `postalcode`, `contract_start`, `contract_end`, `contract_description`) "
                        . "VALUES('NULL', :roomnumber, :forename, :name, :street, :city, :postalcode, :contract_start, :contract_end, :contract_description)");
                $stmt->bindParam(':forename', $this->forename);
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':street', $this->street);
                $stmt->bindParam(':city', $this->city);
                $stmt->bindParam(':postalcode', $this->postalcode);
                $stmt->bindParam(':contract_start', $this->contract_start);
                $stmt->bindParam(':contract_end', $this->contract_end);
                $stmt->bindParam(':contract_description', $this->contract_description);
                $stmt->bindParam(':roomnumber', $this->roomnumber);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = Database::disconnect();
            try {
                $conn = Database::connect();
                $selectStmt = $conn->prepare("SELECT tenant.tid FROM tenant WHERE tenant.forename = :forename AND tenant.name = :name");
                $selectStmt->bindParam(':forename', $this->forename);
                $selectStmt->bindParam(':name', $this->name);
                $selectStmt->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            if ($stmt->rowCount() > 0) {
                while ($row = $selectStmt->fetch(PDO::FETCH_ASSOC)) {
                    $this->setId($row['tid']);
                }
            }
            $conn = Database::disconnect();

            try {
                $conn = Database::connect();
                // erfassen der Mieteinnahme
                $stmt2 = $conn->prepare("INSERT INTO `incomings` (`id`, `Tenant_id`, `Balance_id`, `amount`, `income_create`, `payment_date`, `income_description`, `Incometypes_id`) VALUES (NULL, :id , '1', :rentalIncome, NULL, NULL, 'Mieteinnahme', '1');");
                $stmt2->bindParam(':rentalIncome', $this->rentalIncome);
                $stmt2->bindParam(':id', $this->id);

                $stmt2->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = Database::disconnect();

            try {
                $conn = Database::connect();
                $stmt3 = $conn->prepare("INSERT INTO `incomings` (`id`, `Tenant_id`, `Balance_id`, `amount`, `income_create`, `payment_date`, `income_description`, `Incometypes_id`) VALUES (NULL, :id , '1', :excludingIncome, NULL, NULL, 'Nebenkosten', '2');");
                $stmt3->bindParam(':excludingIncome', $this->excludingIncome);
                $stmt3->bindParam(':id', $this->id);
                $stmt3->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = Database::disconnect();
            try {
                $conn = Database::connect();
                $stmt4 = $conn->prepare("INSERT INTO `incomings` (`id`, `Tenant_id`, `Balance_id`, `amount`, `income_create`, `payment_date`, `income_description`, `Incometypes_id`) VALUES (NULL, :id , '1', :bond, NULL, NULL, 'Kaution', '4');");
                $stmt4->bindParam(':bond', $this->bond);
                $stmt4->bindParam(':id', $this->id);
                $stmt4->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = Database::disconnect();
        } else {
            echo "Geben Sie alle Daten ein";
        }
    }

    public function rewriteTenant($tid) {


        require_once '../app/models/PDO_Database.inc.php';
        try {
            // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn = Database::connect();
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = "SELECT * FROM `tenant` WHERE tenant.tid = $tid";
            foreach ($conn->query($stmt) as $row) {
                $this->setForename($row['forename']);
                $this->setName($row['name']);
                $this->setStreet($row['street']);
                $this->setCity($row['city']);
                $this->setPostalcode($row['postalcode']);
                $this->setContract_start($row['contract_start']);
                $this->setContract_end($row['contract_end']);
                $this->setContract_description($row['contract_description']);
                $this->setRoomnumber($row['Accommodation_id']);

                $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 1;";
                foreach ($conn->query($stmt) as $row) {
                    $this->setRentalIncome($row['amount']);
                }
                $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 2;";
                foreach ($conn->query($stmt) as $row) {
                    $this->setExcludingIncome($row['amount']);
                }
                $stmt = "SELECT amount From incomings WHERE incomings.Tenant_id = $tid AND incomings.Incometypes_id = 4;";
                foreach ($conn->query($stmt) as $row) {
                    $this->setBond($row['amount']);
                }
                ?>
                <html>
                </tr>
                <tr>
                    <td align="right">Vorname:</td>
                    <td>
                        <input maxlength="50" name="forename" size="45" type="text" value="<?php echo $this->getForename() ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">Nachname:</td>
                    <td>
                        <input maxlength="50" name="name" size="45" type="text" value="<?php echo $this->getName() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Strasse:</td>
                    <td>
                        <input maxlength="50" name="street" size="45" type="text" value="<?php echo $this->getStreet() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Ort:</td>
                    <td>
                        <input maxlength="50" name="city" size="45" type="text" value="<?php echo $this->getCity() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">PLZ:</td>
                    <td>
                        <input maxlength="50" name="postalcode" size="45" type="text" value="<?php echo $this->getPostalcode() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Vertragsbeginn(T,M,J):</td>
                    <td>
                        <input maxlength="50" name="contract_start" size="45" type="date" value="<?php echo $this->getContract_start() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Vertragsende(T,M,J):</td>
                    <td>
                        <input maxlength="50" name="contract_end" size="45" type="date" value="<?php echo $this->getContract_end() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Vertragsbeschreibung:</td>
                    <td>
                        <input maxlength="80" name="contract_description" size="45" type="text" value="<?php echo $this->getContract_description() ?>"/>
                    </td>
                </tr>

                <tr>
                    <td align="right">Wohnungsnummer/Büronummer:</td>
                    <td>
                        <select name="roomnumber"  ng-switch-default="<?php echo $this->getRoomnumber() ?>">
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
                    </td>
                </tr>

                <tr>
                    <td align="right">Mieteinnahme:</td>
                    <td>
                        <input maxlength="50" name="rentalIncome" size="45" type="number" value="<?php echo $this->getRentalIncome() ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">Nebenkosten:</td>
                    <td>
                        <input maxlength="50" name="excludingIncome" size="45" type="number" value="<?php echo $this->getExcludingIncome() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Kaution:</td>
                    <td>
                        <input maxlength="50" name="bond" size="45" type="number" value="<?php echo $this->getBond() ?>" />
                    </td>
                </tr>
                <td></td>
                <td>
                    <input type="submit" value="Speichern" class="actionbutton"/>
                </td>
                </tr>
                </tbody>
                </table>
                </form>
                </html><!--
                -->

                <?php
//                  echo '<td>' . $row['amount'] . '</td>';
//                  echo '<td>' . $row['amount'] . '</td>';
//                  echo '<td>' . $row['amount'] . '</td>';
            }

//            $stmt->bindParam(':forename', $this->forename);
//            $stmt->bindParam(':name', $this->name);
//            $stmt->bindParam(':street', $this->street);
//            $stmt->bindParam(':city', $this->city);
//            $stmt->bindParam(':postalcode', $this->postalcode);
//            $stmt->bindParam(':contract_start', $this->contract_start);
//            $stmt->bindParam(':contract_end', $this->contract_end);
//            $stmt->bindParam(':contract_description', $this->contract_description);
//            $stmt->bindParam(':roomnumber', $this->roomnumber);
//            $stmt->execute();
            //$stmt = $conn->prepare("UPDATE `tenant` SET `Accommodation_id` = '21', `forename` = 'Dave', `name` = 'Hall', `street` = 'Geilestrasse 69', `city` = 'Geilohausen', `postalcode` = '7851', `contract_start` = '2016-12-05', `contract_end` = '2020-12-05', `contract_description` = 'Sehr freundlich.. nächste Woche rauswerfen..' WHERE `tenant`.`tid` = 53 AND `tenant`.`Accommodation_id` = 22;");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } Database::disconnect();
    }

    public function delete($tid, $id, $accId, $houseNumber) {

        require_once '../app/models/PDO_Database.inc.php';
        try {
            $conn = Database::connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo "Connection failed: " . $e->getMessage();
        }
        $sql = $conn->prepare("DELETE FROM `incomings` WHERE `incomings`.`id` = :id AND `incomings`.`Tenant_id` = :tid AND `incomings`.`Balance_id` = 1 AND `incomings`.`Incometypes_id` = 1");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':tid', $tid);
        $sql->execute();
        $id = $id + 1;

        $sql2 = $conn->prepare("DELETE FROM `incomings` WHERE `incomings`.`id` = :id AND `incomings`.`Tenant_id` = :tid AND `incomings`.`Balance_id` = 1 AND `incomings`.`Incometypes_id` = 2");
        $sql2->bindParam(':id', $id);
        $sql2->bindParam(':tid', $tid);
        $sql2->execute();
        $id = $id + 1;


        $sql3 = $conn->prepare("DELETE FROM `incomings` WHERE `incomings`.`id` = :id AND `incomings`.`Tenant_id` = :tid AND `incomings`.`Balance_id` = 1 AND `incomings`.`Incometypes_id` = 4");
        $sql3->bindParam(':id', $id);
        $sql3->bindParam(':tid', $tid);
        $sql3->execute();

        $stmt = $conn->prepare("DELETE FROM `tenant` WHERE `tenant`.`tid` =:tid AND `tenant`.`Accommodation_id` = :accId");
        $stmt->bindParam(':tid', $tid);
        $stmt->bindParam(':accId', $accId);
        $stmt->execute();
        Database::disconnect();

        // müssen richtige Umleitung richtig herausfinden
        header("Location: ../../../../../../public/houseoverviews/house" . $houseNumber . "/");
    }

}
