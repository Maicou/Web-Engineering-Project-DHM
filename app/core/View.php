<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author Marco Mancuso
 */
class View {
    
   public $model;
   
   public function __construct($model) {
       $this->model = $model;
       
   }
   
   public function render($file){
        require_once '../app/views/'. $file . '.php';
    }
    
    
   public function printToContent(){
       echo "<p>Hi wir sind auf ". $this->model->name."</p>";
   } 
   
}
