<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buildingOverview
 *
 * @author Marco Mancuso
 */
class buildingOverview extends Controller{
 
    public function index(){
        $model = $this->model('User');
        $model->name = "testname";
        
        // extended from Controller --> method view --> given first parameter
        // ... and second parameter ...
        $this->view('buildingOverview', ['name' => $model->name]);
        
    }

//put your code here
}
