<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_mainRental
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class Model_mainRental {
    //put your code here
    private $lessor;
    private $renterName;
    private $renterSurName;
    private $leaseAgreementOutset;
    private $leaseAgreementEnd;
    private $building;
    private $flat;
    
    function getLessor() {
        return $this->lessor;
    }

    function getRenterName() {
        return $this->renterName;
    }

    function getRenterSurName() {
        return $this->renterSurName;
    }

    function getLeaseAgreementOutset() {
        return $this->leaseAgreementOutset;
    }

    function getLeaseAgreementEnd() {
        return $this->leaseAgreementEnd;
    }

    function getBuilding() {
        return $this->building;
    }

    function getFlat() {
        return $this->flat;
    }

    function setLessor($lessor) {
        $this->lessor = $lessor;
    }

    function setRenterName($renterName) {
        $this->renterName = $renterName;
    }

    function setRenterSurName($renterSurName) {
        $this->renterSurName = $renterSurName;
    }

    function setLeaseAgreementOutset($leaseAgreementOutset) {
        $this->leaseAgreementOutset = $leaseAgreementOutset;
    }

    function setLeaseAgreementEnd($leaseAgreementEnd) {
        $this->leaseAgreementEnd = $leaseAgreementEnd;
    }

    function setBuilding($building) {
        $this->building = $building;
    }

    function setFlat($flat) {
        $this->flat = $flat;
    }

}
