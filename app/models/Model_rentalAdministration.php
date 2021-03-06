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
class Model_rentalAdministration {

    //  private $name;
    private $size;
    private $adress;
    private $tid;
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
        if (empty($this->getRoomnumber()) OR ( $this->getRoomnumber() == 0)) {
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

        require_once 'app/models/PDO_Database.inc.php';

        $valid = $this->validate();
        if ($valid == true) {

            try {
                // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn = Database::connect();
                $conn->exec('set names utf8');
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
                $conn->exec('set names utf8');
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
                $conn->exec('set names utf8');
                // erfassen der Mieteinnahme
                $stmt2 = $conn->prepare("INSERT INTO `incomings` (`id`, `Tenant_tid`, `Balance_id`, `amount`, `income_create`, `payment_date`, `income_description`, `Incometypes_id`) VALUES (NULL, :id , '1', :rentalIncome, NULL, NULL, 'Mieteinnahme', '1');");
                $stmt2->bindParam(':rentalIncome', $this->rentalIncome);
                $stmt2->bindParam(':id', $this->id);

                $stmt2->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = Database::disconnect();

            try {
                $conn = Database::connect();
                $conn->exec('set names utf8');
                $stmt3 = $conn->prepare("INSERT INTO `incomings` (`id`, `Tenant_tid`, `Balance_id`, `amount`, `income_create`, `payment_date`, `income_description`, `Incometypes_id`) VALUES (NULL, :id , '1', :excludingIncome, NULL, NULL, 'Nebenkosten', '2');");
                $stmt3->bindParam(':excludingIncome', $this->excludingIncome);
                $stmt3->bindParam(':id', $this->id);
                $stmt3->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = Database::disconnect();
            try {
                $conn = Database::connect();
                $conn->exec('set names utf8');
                $stmt4 = $conn->prepare("INSERT INTO `incomings` (`id`, `Tenant_tid`, `Balance_id`, `amount`, `income_create`, `payment_date`, `income_description`, `Incometypes_id`) VALUES (NULL, :id , '1', :bond, NULL, NULL, 'Kaution', '4');");
                $stmt4->bindParam(':bond', $this->bond);
                $stmt4->bindParam(':id', $this->id);
                $stmt4->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = Database::disconnect();
        } else {
            echo "<h2> ERROR </h2> ACHTUNG: Bitte wählen Sie <b> <i> alle Felder </i> </b> aus!!!";
        }
    }

    public function showTenantToUpdate($tid) {


        require_once 'app/models/PDO_Database.inc.php';
        try {

            $conn = Database::connect();
            $conn->exec('set names utf8');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = "SELECT * FROM `tenant` WHERE tenant.tid = $tid";


            foreach ($conn->query($stmt) as $row) {
                $id1 = 0;
                $id2 = 0;
                $id3 = 0;
                $whichBuilding;
                $this->setForename($row['forename']);
                $this->setName($row['name']);
                $this->setStreet($row['street']);
                $this->setCity($row['city']);
                $this->setPostalcode($row['postalcode']);
                $this->setContract_start($row['contract_start']);
                $this->setContract_end($row['contract_end']);
                $this->setContract_description($row['contract_description']);
                $this->setRoomnumber($row['Accommodation_id']);

                $stmt = "SELECT id, amount From incomings WHERE incomings.Tenant_tid = $tid AND incomings.Incometypes_id = 1;";
                foreach ($conn->query($stmt) as $row) {
                    $this->setRentalIncome($row['amount']);
                    $id1 = $row['id'];
                }
                $stmt = "SELECT id, amount From incomings WHERE incomings.Tenant_tid = $tid AND incomings.Incometypes_id = 2;";
                foreach ($conn->query($stmt) as $row) {
                    $this->setExcludingIncome($row['amount']);
                    $id2 = $row['id'];
                }

                $stmt = "SELECT id, amount From incomings WHERE incomings.Tenant_tid = $tid AND incomings.Incometypes_id = 4;";
                foreach ($conn->query($stmt) as $row) {
                    $this->setBond($row['amount']);
                    $id3 = $row['id'];
                }
                ?>
                <html>
                    <?php
                    if ($this->getRoomnumber() <= 8) {
                        $whichBuilding = 1;
                    } else {
                        $whichBuilding = 2;
                    }

                    echo '<form id="jQueryCheckRental" action="RentalAdministration/rewriteTenantHouse' . $whichBuilding . '/' . $tid . '/' . $id1 . '/' . $id2 . '/' . $id3 . '/' . $this->roomnumber . '/' . "two" . '" method="post">'
                    ?>
                    <table border="0" cellspacing="2" cellpadding="2">
                        <tbody>
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
                                    <?php
                                    if ($whichBuilding == 1) {
                                        ?>
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
                                        <?php
                                    } else {
                                        ?>
                                        <select name="roomnumber" ng-switch-default="<?php echo $this->getRoomnumber() ?>">
                                            <option value="0" hidden>Bitte auswählen</option>
                                            <option value="9">Büro 1</option>
                                            <option value="10">Wohnung 1</option>
                                            <option value="11">Wohnung 2</option>
                                            <option value="12">Wohnung 3</option>
                                            <option value="13">Wohnung 4</option>
                                            <option value="14">Wohnung 5</option>
                                            <option value="15">Wohnung 6</option>
                                            <option value="16">Wohnung 7</option>
                                            <option value="17">Wohnung 8</option>
                                            <option value="18">Wohnung 9</option>
                                            <option value="19">Wohnung 10</option>
                                            <option value="20">Wohnung 11</option>
                                            <option value="21">Wohnung 12</option>
                                            <option value="22">Wohnung 13</option>
                                            <option value="23">Wohnung 14</option>
                                        </select>
                                        <?php
                                    }
                                    ?>
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
                            <?php
                            echo '<input type="submit" onclick="return confirm_action()" value="Speichern" class="actionbutton"/>';
                            ?>
                        </td>
                    </tr>
                </tbody>
                </table>
                </form>
                </html><!--
                -->

                <?php
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } Database::disconnect();
    }

    public function update($tid, $id1, $id2, $id3, $accId, $houseNumber) {
        require_once 'app/models/PDO_Database.inc.php';
        $conn = Database::connect();
        $conn->exec('set names utf8');
        //define correct date today
        $date = date("Y-m-d");
        $valid = $this->validate();
        // $this->validate();
        if ($valid == true) {

            $conn = Database::connect();
            $conn->exec('set names utf8');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $conn->prepare("UPDATE `tenant` SET `Accommodation_id` = :roomnumber, `forename` = :forename, "
                    . "`name` = :name, `street` = :street, `city` = :city, `postalcode` = :postalcode, "
                    . "`contract_start` = :contract_start, `contract_end` = :contract_end, "
                    . "`contract_description` = :contract_description WHERE `tenant`.`tid` = :tid AND `tenant`.`Accommodation_id` = :accId ;");
            $stmt->bindParam(':forename', $this->forename);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':street', $this->street);
            $stmt->bindParam(':city', $this->city);
            $stmt->bindParam(':postalcode', $this->postalcode);
            $stmt->bindParam(':contract_start', $this->contract_start);
            $stmt->bindParam(':contract_end', $this->contract_end);
            $stmt->bindParam(':contract_description', $this->contract_description);
            $stmt->bindParam(':roomnumber', $this->roomnumber);
            $stmt->bindParam(':tid', $tid);
            $stmt->bindParam(':accId', $accId);
            $stmt->execute();

            $stmt = $conn->prepare("UPDATE `incomings` SET `amount` = :rentalIncome, `income_create` = :date WHERE `incomings`.`id` = :id AND `incomings`.`Tenant_tid` = :tid AND `incomings`.`Balance_id` = 1 AND `incomings`.`Incometypes_id` = 1;");
            $stmt->bindParam(':rentalIncome', $this->rentalIncome);
            $stmt->bindParam(':tid', $tid);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':id', $id1);
            $stmt->execute();

            $stmt = $conn->prepare("UPDATE `incomings` SET `amount` = :excludeIncome, `income_create` = :date WHERE `incomings`.`id` = :id AND `incomings`.`Tenant_tid` = :tid AND `incomings`.`Balance_id` = 1 AND `incomings`.`Incometypes_id` = 2;");
            $stmt->bindParam(':excludeIncome', $this->excludingIncome);
            $stmt->bindParam(':tid', $tid);
            $stmt->bindParam(':id', $id2);
            $stmt->bindParam(':date', $date);
            $stmt->execute();

            $stmt = $conn->prepare("UPDATE `incomings` SET `amount` = :bond, `income_create` = :date WHERE `incomings`.`id` = :id AND `incomings`.`Tenant_tid` = :tid AND `incomings`.`Balance_id` = 1 AND `incomings`.`Incometypes_id` = 4;");
            $stmt->bindParam(':bond', $this->bond);
            $stmt->bindParam(':tid', $tid);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':id', $id3);
            $stmt->execute();

            Database::disconnect();
        } else {
            echo "<h2> ERROR </h2> ACHTUNG: Bitte wählen Sie <b> <i> alle Felder </i> </b> aus!!!";
        }
    }

    public function delete($tid, $id, $accId, $houseNumber) {

        require_once 'app/models/PDO_Database.inc.php';
        try {
            $conn = Database::connect();
            $conn->exec('set names utf8');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo "Connection failed: " . $e->getMessage();
        }
        $sql = $conn->prepare("DELETE FROM `incomings` WHERE `incomings`.`id` = :id AND `incomings`.`Tenant_tid` = :tid AND `incomings`.`Balance_id` = 1 AND `incomings`.`Incometypes_id` = 1");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':tid', $tid);
        $sql->execute();
        $id = $id + 1;

        $sql2 = $conn->prepare("DELETE FROM `incomings` WHERE `incomings`.`id` = :id AND `incomings`.`Tenant_tid` = :tid AND `incomings`.`Balance_id` = 1 AND `incomings`.`Incometypes_id` = 2");
        $sql2->bindParam(':id', $id);
        $sql2->bindParam(':tid', $tid);
        $sql2->execute();
        $id = $id + 1;


        $sql3 = $conn->prepare("DELETE FROM `incomings` WHERE `incomings`.`id` = :id AND `incomings`.`Tenant_tid` = :tid AND `incomings`.`Balance_id` = 1 AND `incomings`.`Incometypes_id` = 4");
        $sql3->bindParam(':id', $id);
        $sql3->bindParam(':tid', $tid);
        $sql3->execute();

        $stmt = $conn->prepare("DELETE FROM `tenant` WHERE `tenant`.`tid` =:tid AND `tenant`.`Accommodation_id` = :accId");
        $stmt->bindParam(':tid', $tid);
        $stmt->bindParam(':accId', $accId);
        $stmt->execute();
        Database::disconnect();
    }

}
