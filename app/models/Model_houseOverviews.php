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
    
    private $forename;
    private $name;
    private $street;
    private $city;
    private $postalcode;
    private $contract_start;
    private $contract_end;
    private $contract_description;
    private $variant;
    private $roomnumber;
    private $ownerName;





    public function showData() {
        echo $this->getName() . ' </br>';
        echo $this->getSize() . ' </br>';
        echo $this->getAdress();
    }

    public function setData() {
        // using setters and DB required
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
        return $this->forname;
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

    function setForename($forename){
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

    function getVariant() {
        return $this->variant;
    }

    function getRoomnumber() {
        return $this->roomnumber;
    }

    function getOwnerName() {
        return $this->ownerName;
    }

    function setVariant($variant) {
        $this->variant = $variant;
    }

    function setRoomnumber($roomnumber) {
        $this->roomnumber = $roomnumber;
    }

    function setOwnerName($ownerName) {
        $this->ownerName = $ownerName;
    }

    



    public function writeTenantHouse1(){
//        echo "hier 1";
    require_once '../app/models/PDO_Database.inc.php';
    
       if (isset($_POST['forename']) AND isset($_POST['name'])AND isset($_POST['street'])AND
           isset($_POST['city'])AND isset($_POST['postalcode'])AND isset($_POST['contract_start'])AND
           isset($_POST['contract_end'])AND isset($_POST['contract_description'])AND isset($_POST['variant'])AND 
           isset($_POST['roomnumber'])AND isset($_POST['ownerName'])
                ) {
//     echo 'hier 2';
    $this->setForename($_POST['forename']);
    $this->setName($_POST['name']);
    $this->setStreet($_POST['street']);
    $this->setCity($_POST['city']);
    $this->setPostalcode($_POST['postalcode']);
    $this->setContract_start($_POST['contract_start']);
    $this->setContract_end($_POST['contract_end']);
    $this->setContract_description($_POST['contract_description']);
    $this->setVariant($_POST['variant']);
    $this->setRoomnumber($_POST['roomnumber']);
    $this->setOwnerName($_POST['ownerName']);

//      echo "hier 3";          
    try {
               // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                 $conn = Database::connect();
                // set the PDO error mode to exception
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $conn->prepare("INSERT INTO `tenant`(`id`, `Accommodation_id`, `forename`, `name`, `street`, `city`, `postalcode`, `contract_start`, `contract_end`, `contract_description`) "
                       . "VALUES('NULL', ':roomnumber', ':forename', ':name', ':street', ':city', ':postalcode', ':contract_start', ':contract_end', ':contract_description')");
                                        //   . "VALUES('', '8', '$this->forename', '$this->name', '$this->street', '$this->city', '$this->postalcode', '$this->contract_start', '$this->contract_end', '$this->contract_description')");
       
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
                }else{
                    echo "jetzt bin ich mal auf der rechten Seite!!";
                }
       
        }
    }
    