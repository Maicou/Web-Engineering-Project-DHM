<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buildingOverview
 *
 * @author David Hall, Marco Mancuso, Raphael Denz
 */
class MainInvoiceAdministration extends Controller{
 
    public function index(){
        $model = $this->model('Model_mainInvoice');
        $view = $this->createView($model);
        $view->render('mainInvoiceAdministration');
        require_once '../html/footer.inc.php';
    }

//put your code here
}
