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

    private $name;
    private $size;
    private $adress;

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

}
