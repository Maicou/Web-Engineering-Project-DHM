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
    

}