<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_invoiceAdministration
 *
 * @author Dave
 */
class Model_invoiceAdministration {
    //put your code here
     private $eid;
     private $balance_id = 1;
     private $expense_description;
     private $expense_received;
     private $payment_date;
     private $expensetypes;
     private $amount;
     private $validation = true;
     
     function getEid() {
         return $this->eid;
     }

     function getExpense_description() {
         return $this->expense_description;
     }

     function getExpense_received() {
         return $this->expense_received;
     }

     function getPayment_date() {
         return $this->payment_date;
     }

     function getExpensetypes() {
         return $this->expensetypes;
     }

     function getAmount() {
         return $this->amount;
     }

     function setEid($eid) {
         $this->eid = $eid;
     }

     function setExpense_description($expense_description) {
         $this->expense_description = $expense_description;
     }

     function setExpense_received($expense_received) {
         $this->expense_received = $expense_received;
     }

     function setPayment_date($payment_date) {
         $this->payment_date = $payment_date;
     }

     function setExpensetypes($expensetypes) {
         $this->expensetypes = $expensetypes;
     }

     function setAmount($amount) {
         $this->amount = $amount;
     }

     function getValidation() {
         return $this->validation;
     }

     function setValidation($validation) {
         $this->validation = $validation;
     }

     public function validate() {
         
         $this->setExpense_description($_POST['expense_description']);
         $this->setExpense_received($_POST['expense_received']);
         $this->setPayment_date($_POST['payment_date']);
         $this->setExpensetypes($_POST['expensetypes']);
         $this->setAmount($_POST['amount']);
         
         if (empty($this->getExpense_description())) {
            $this->validation = false;
        }
        if (empty($this->getExpense_received())) {
            $this->validation = false;
        }
        if (empty($this->getPayment_date())) {
            $this->validation = false;
        }
        if (empty($this->getExpensetypes())) {
            $this->validation = false;
        }
        if (empty($this->getAmount())) {
            $this->validation = false;
        }
         
        return $this->validation;
         
     }
     
     
      public function writeInvoiceAnton_Leo_House() {

        require_once '../app/models/PDO_Database.inc.php';

        $valid = $this->validate();
        if ($valid == true) {

            try {
                // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn = Database::connect();
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO `expenses`(`eid`, `Balance_id`, `Expensetypes_id`, `amount`, `expense_create`, `expense_received`, `payment_date`, `expense_description`, `anton_leo_house`, `ovr_house`) "
                        . "VALUES('NULL', :balance_id, :expensetypes, :amount, 'NULL', :expense_received, :payment_date, :expense_description, 'true', 'false')");
               
                
                $stmt->bindParam(':balance_id', $this->balance_id);
                $stmt->bindParam(':expensetypes', $this->expensetypes);
                $stmt->bindParam(':amount', $this->amount);
                $stmt->bindParam(':expense_received', $this->expense_received);
                $stmt->bindParam(':payment_date', $this->payment_date);
                $stmt->bindParam(':expense_description', $this->expense_description);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = Database::disconnect();
        } else {
            echo "Geben Sie alle Daten ein";
        }
    }
    
    public function writeInvoiceOVR_House(){

        require_once '../app/models/PDO_Database.inc.php';

        $valid = $this->validate();
        if ($valid == true) {

            try {
                // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn = Database::connect();
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO `expenses`(`eid`, `Balance_id`, `Expensetypes_id`, `amount`, `expense_create`, `expense_received`, `payment_date`, `expense_description`, `anton_leo_house`, `ovr_house`) "
                        . "VALUES('NULL', :balance_id, :expensetypes, :amount, 'NULL', :expense_received, :payment_date, :expense_description, 'false', 'true')");
               
                
                $stmt->bindParam(':balance_id', $this->balance_id);
                $stmt->bindParam(':expensetypes', $this->expensetypes);
                $stmt->bindParam(':amount', $this->amount);
                $stmt->bindParam(':expense_received', $this->expense_received);
                $stmt->bindParam(':payment_date', $this->payment_date);
                $stmt->bindParam(':expense_description', $this->expense_description);
                $stmt->execute();
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
                        <input maxlength="50" name="forename" size="45" type="text" value="////<?php echo $this->getForename() ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">Nachname:</td>
                    <td>
                        <input maxlength="50" name="name" size="45" type="text" value="////<?php echo $this->getName() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Strasse:</td>
                    <td>
                        <input maxlength="50" name="street" size="45" type="text" value="////<?php echo $this->getStreet() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Ort:</td>
                    <td>
                        <input maxlength="50" name="city" size="45" type="text" value="////<?php echo $this->getCity() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">PLZ:</td>
                    <td>
                        <input maxlength="50" name="postalcode" size="45" type="text" value="////<?php echo $this->getPostalcode() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Vertragsbeginn(T,M,J):</td>
                    <td>
                        <input maxlength="50" name="contract_start" size="45" type="date" value="////<?php echo $this->getContract_start() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Vertragsende(T,M,J):</td>
                    <td>
                        <input maxlength="50" name="contract_end" size="45" type="date" value="////<?php echo $this->getContract_end() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Vertragsbeschreibung:</td>
                    <td>
                        <input maxlength="80" name="contract_description" size="45" type="text" value="////<?php echo $this->getContract_description() ?>"/>
                    </td>
                </tr>

                <tr>
                    <td align="right">Wohnungsnummer/Büronummer:</td>
                    <td>
                        <select name="roomnumber"  ng-switch-default="////<?php echo $this->getRoomnumber() ?>">
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
                        <input maxlength="50" name="rentalIncome" size="45" type="number" value="////<?php echo $this->getRentalIncome() ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">Nebenkosten:</td>
                    <td>
                        <input maxlength="50" name="excludingIncome" size="45" type="number" value="////<?php echo $this->getExcludingIncome() ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">Kaution:</td>
                    <td>
                        <input maxlength="50" name="bond" size="45" type="number" value="////<?php echo $this->getBond() ?>" />
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

    public function delete($eid, $houseNumber) {

        require_once '../app/models/PDO_Database.inc.php';
        try {
            $conn = Database::connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo "Connection failed: " . $e->getMessage();
        }
        $sql = $conn->prepare("DELETE FROM `expenses` WHERE `eid` = :eid");
        $sql->bindParam(':eid', $eid);
        $sql->execute();
        
        Database::disconnect();

        // müssen richtige Umleitung richtig herausfinden
        header("Location: ../../../../public/InvoiceAdministration/invoiceHouse" . $houseNumber . "/");
    }

}
