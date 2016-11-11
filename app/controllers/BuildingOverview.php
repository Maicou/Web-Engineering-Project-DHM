<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buildingOverview
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class BuildingOverview extends Controller {

    public function index() {
        $model = $this->model('Model_home');
        $view = $this->createView($model);
        $view->render('buildingoverview');
        require_once '../html/footer.inc.php';
    }

//put your code here
}
