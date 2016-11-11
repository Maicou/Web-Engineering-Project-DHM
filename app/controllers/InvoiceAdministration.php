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
class InvoiceAdministration extends Controller{
 
    public function index(){
        $model = $this->model('Model_home');
        $view = $this->createView($model);
        $view->render('invoiceAdministration');
        require_once '../html/footer.inc.php';
    }

//put your code here
}
