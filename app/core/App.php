<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class App{
    
    //default controller and default method when application starts
    protected $controller = 'home';
    protected $method = 'index';
    
    
    protected $params = [];
    
    public function __construct() {
        
    }
    
    public function parseUrl(){
        if(isset($_GET['url'])){
            echo $_GET['url'];
        }
    }
}