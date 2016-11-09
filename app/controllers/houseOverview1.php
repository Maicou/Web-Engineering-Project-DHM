<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buildingOverview
 *
 * @author David Hall
 */
class houseOverview1 extends Controller{
 
    public function index(){
        $model = $this->model('User');
        $model->name = "Hausübersicht";
        
        // extended from Controller --> method view --> given first parameter
        // ... and second parameter ...
        //$this->view('buildingOverview', ['name' => $model->name]);
        
        $view = $this->createView($model);
        $view->render('houseOverview1');
        $view->printToContent();
        require_once '../html/footer.inc.php';
    }
    
    
    public function houseOne(){
        $model = $this->model('HouseOverviews');
        $model->name = "Hausübersicht";
        
        // extended from Controller --> method view --> given first parameter
        // ... and second parameter ...
        //$this->view('buildingOverview', ['name' => $model->name]);
        
        $view = $this->createView($model);
        $view->render('houseOverview1');
        $view->model->showDataHouseOne();
        
        echo "Wir sind im <h1>ersten</h1> Haus";
        require_once '../html/footer.inc.php';
    }

    public function houseTwo(){
        echo "Wir sind im zweiten Haus";
    }
    
    public function houseThree(){
        echo "Wir sind im dritten Haus";
    }

//put your code here
}
