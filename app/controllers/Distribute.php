<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Distribute
 *
 * @author Marco Mancuso
 */
class Distribute extends Controller{
    public function index($amount, $building_id, $eid, $description) {
        $model = $this->model('Model_distribute');
        $view = $this->createView($model);
        $view->render('distribute');
        $model->calculate($amount, $building_id, $eid, $description);
        require_once 'html/footer.inc.php';
    }
    
    public function calcValue($amount, $Building_id, $totalSpace, $description){
        $model = $model = $this->model('Model_distribute');
        $view = $this->createView($model);
        $view->render('distribute');
        $model->calcValue($amount, $Building_id, $totalSpace, $description);
        require_once 'html/footer.inc.php';
        
    }
    
    
    
}