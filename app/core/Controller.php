<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Home
 *
 * @author Marco Mancuso, David Hall, Raphael Denz
 */
class Controller{
    
    
    
    protected function model($model){
        require_once 'app/models/'.$model.'.php';
        return new $model();
    }
    
    
//    public function view($view, $data){
//        require_once '../app/views/'. $view . '.php';
//    }
    public function createView($model){
        require_once 'app/core/View.php';
        $home = new View($model);
        return $home;
    }
    
}