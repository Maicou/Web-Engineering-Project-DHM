<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Marco Mancuso
 */
class Home extends Controller{
    //put your code here
    
    public function index($name=''){
        $user = $this->model('User');
        $user->name = $name;
        
        // extended from Controller --> method view --> given first parameter
        // ... and second parameter ...
        $this->view('home', ['name' => $user->name]);
    }
    
    public function test(){
        echo "test";
    }
    
}
