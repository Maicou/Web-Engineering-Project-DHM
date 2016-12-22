<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Info
 *
 * @author Marco Mancuso
 */
class Info extends Controller {
    
    public function index(){
        $this->info1();
    }
    
    public function info1(){
        $model = $this->model('Model_info');
        $view = $this->createView($model);
        $view->render('info1');
    }
    
    public function info2(){
        $model = $this->model('Model_info');
        $view = $this->createView($model);
        $view->render('info2');
    }
    
    
}
