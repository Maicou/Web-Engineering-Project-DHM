<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class View {

    public $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function render($file) {
        require_once 'app/views/View_' . $file . '.php';
    }

}
