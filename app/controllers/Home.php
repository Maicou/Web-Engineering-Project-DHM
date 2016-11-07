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
        $model = $this->model('User');
        $model->name = "testname";
        
        // extended from Controller --> method view --> given first parameter
        // ... and second parameter ...
        $this->view('home', ['name' => $model->name]);
        $model->printsome();

    }
    
    public function test(){
//        $model = $this->model('User');
//        $model->name = "testname";
//         $model->printFPDF();
    }
    
}
