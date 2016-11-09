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
class mainRentalAdministration extends Controller{
 
    public function index(){
        $model = $this->model('User');
        $model->name = "Hauptmieterverwaltung";
        
        // extended from Controller --> method view --> given first parameter
        // ... and second parameter ...
        //$this->view('buildingOverview', ['name' => $model->name]);
        
        $view = $this->createView($model);
        $view->render('mainRentalAdministration');
        $view->printToContent();
        require_once '../html/footer.inc.php';
    }

//put your code here
}
