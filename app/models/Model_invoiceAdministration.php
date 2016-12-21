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
     private $building_id;
     
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
     
     function getBuilding_id() {
         return $this->building_id;
     }

     function setBuilding_id($building_id) {
         $this->building_id = $building_id;
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
       $this->setBuilding_id('1');

        require_once 'app/models/PDO_Database.inc.php';

        $valid = $this->validate();
        if ($valid == true) {

            try {
                // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn = Database::connect();
                $conn->exec('set names utf8'); 
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO `expenses`(`eid`, `Balance_id`, `Expensetypes_id`, `amount`, `expense_create`, `expense_received`, `payment_date`, `expense_description`, `Building_id`) "
                        . "VALUES('NULL', :balance_id, :expensetypes, :amount, 'NULL', :expense_received, :payment_date, :expense_description, :Building_id)");
               
                
                $stmt->bindParam(':balance_id', $this->balance_id);
                $stmt->bindParam(':expensetypes', $this->expensetypes);
                $stmt->bindParam(':amount', $this->amount);
                $stmt->bindParam(':expense_received', $this->expense_received);
                $stmt->bindParam(':payment_date', $this->payment_date);
                $stmt->bindParam(':expense_description', $this->expense_description);
                $stmt->bindParam(':Building_id', $this->building_id);
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
           $this->setBuilding_id('2');

        require_once 'app/models/PDO_Database.inc.php';

        $valid = $this->validate();
        if ($valid == true) {

            try {
                // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn = Database::connect();
                $conn->exec('set names utf8'); 
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO `expenses`(`eid`, `Balance_id`, `Expensetypes_id`, `amount`, `expense_create`, `expense_received`, `payment_date`, `expense_description`, `Building_id`) "
                        . "VALUES('NULL', :balance_id, :expensetypes, :amount, 'NULL', :expense_received, :payment_date, :expense_description, :Building_id)");
               
                
                $stmt->bindParam(':balance_id', $this->balance_id);
                $stmt->bindParam(':expensetypes', $this->expensetypes);
                $stmt->bindParam(':amount', $this->amount);
                $stmt->bindParam(':expense_received', $this->expense_received);
                $stmt->bindParam(':payment_date', $this->payment_date);
                $stmt->bindParam(':expense_description', $this->expense_description);
                $stmt->bindParam(':Building_id', $this->building_id);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            
            $conn = Database::disconnect();
        } else {
            echo "Geben Sie alle Daten ein";
        }
    }
    
        public function delete($eid, $houseNumber) {

        require_once 'app/models/PDO_Database.inc.php';
        try {
            $conn = Database::connect();
            $conn->exec('set names utf8'); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo "Connection failed: " . $e->getMessage();
        }
        $sql = $conn->prepare("DELETE FROM `expenses` WHERE `eid` = :eid");
        $sql->bindParam(':eid', $eid);
        $sql->execute();
        
        Database::disconnect();
    }

public function showInvoiceToUpdate($eid, $houseNumber) {

 
        require_once 'app/models/PDO_Database.inc.php';
        try {
            // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn = Database::connect();
            $conn->exec('set names utf8'); 
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = "SELECT * FROM `expenses` WHERE expenses.eid = $eid";
            
            foreach ($conn->query($stmt) as $row) {
         
                 $this->setExpense_description($row['expense_description']);
                 $this->setExpense_received($row['expense_received']);
                 $this->setPayment_date($row['payment_date']);
                 $this->setExpensetypes($row['Expensetypes_id']);
                 $this->setAmount($row['amount']);
        
        ?>
                <html>
                    <?php
            
            echo '<form id="jQueryCheckInvoice" action=InvoiceAdministration/rewriteInvoiceHouse/' . $eid .'/' .$this->expensetypes. '/'. $houseNumber .' method="post">'
                    ?>
<table border="0" cellspacing="2" cellpadding="2">
  <tbody>
    </tr>
    <tr>
      <td align="right">Bezeichnung:*</td>
      <td>
        <input maxlength="50" placeholder="Unternehmen & Rechnungsbeschreibung" name="expense_description" size="45" type="text" value="<?php echo $this->getExpense_description() ?>" />
      </td>
    </tr>
    <tr>
      <td align="right">Eingangsdatum:*</td>
      <td>
        <input maxlength="50" name="expense_received" size="45" type="date" value="<?php echo $this->getExpense_received() ?>"/>
      </td>
    </tr>
    <tr>
      <td align="right">Zahlungsdatum:*</td>
      <td>
        <input maxlength="50" name="payment_date" size="45" type="date" value="<?php echo $this->getPayment_date() ?>"/>
      </td>
    </tr>
     <tr>
      <td align="right">Rechnungstyp:*</td>
      <td>
        <select name="expensetypes" value="<?php echo $this->getExpensetypes() ?>">
          <option value="0" hidden>Bitte auswählen</option>
          <option value="1">Reperaturrechung</option>
          <option value="2">Ölrechnung</option>
          <option value="3">Wasserrechnung</option>
          <option value="4">Stromrechnung</option>
          <option value="5">Hauswartsrechung</option>
          <option value="6">Mieter: Kautionrückzahlung</option>
          <option value="7">anderes</option>
        </select>
      </td>
        </tr>
        <tr>
      <td align="right">Betrag:*</td>
      <td>
          <input maxlength="50" name="amount" size="45" type="number" value="<?php echo $this->getAmount() ?>"/>
      </td>
        </tr>
                        <td></td>
                        <td>
                            <?php
                            echo '<input type="submit" value="Speichern" class="actionbutton"/>';
                            ?>
                        </td>
                    </tr>
  </tbody>
</table>
</form>
                 
     <?php              
                 
            }
       
        }catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } Database::disconnect();
    
    }
    
    
    
        public function update($eid, $expensetyp, $houseNumber) {
        require_once 'app/models/PDO_Database.inc.php';
      
        if($houseNumber == 'one'){
                $this->setBuilding_id('1');
            }
            else { 
                    $this->setBuilding_id('2');
                    }
       
        $valid = $this->validate();
        
       if ($valid == true) {
            

            $conn = Database::connect();
            $conn->exec('set names utf8'); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $conn->prepare("UPDATE `expenses` SET `eid` = :eid, `Balance_id` = :Balance_id, "
                    . "`Expensetypes_id` = :Expensetypes_id, `amount` = :amount, `expense_create` = 'NULL', `expense_received` = :expense_received, "
                    . "`payment_date` = :payment_date, `expense_description` = :expense_description, "
                    . "`Building_id` = :Building_id WHERE `expenses`.`eid` = :eid AND `expenses`.`Expensetypes_id` = :Expensetypes_id;");
            
            $stmt->bindParam(':eid', $eid);
            $stmt->bindParam(':Balance_id', $this->balance_id);
            $stmt->bindParam(':Expensetypes_id', $expensetyp);
            $stmt->bindParam(':amount', $this->amount);
            $stmt->bindParam(':expense_received', $this->expense_received);
            $stmt->bindParam(':payment_date', $this->payment_date);
            $stmt->bindParam(':expense_description', $this->expense_description);
            $stmt->bindParam(':Building_id', $this->building_id);
            $stmt->execute();

           

            Database::disconnect();

        //    header("Location: ../../../../../../../../public/RentalAdministration/house" . $houseNumber . "/");
        } else {
            echo "<h2> ERROR </h2> ACHTUNG: Bitte wählen Sie <b> <i> alle Felder </i> </b> aus!!!";
        }
    }
}