<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class InvoiceAdministration extends Controller {
    //put your code here

    public function index() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('mainInvoiceAdministration');

        // close view with footer
        require_once '../html/footer.inc.php';
    }

    public function invoiceHouse1() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration1');

        // close view with footer
        require_once '../html/footer.inc.php';
    }

    public function invoiceHouse2() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration2');

        // close view with footer
        require_once '../html/footer.inc.php';
    }
    
     public function createInvoiceHouse1() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration1CreateInvoice');
    }

    public function writeInvoiceHouse1() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration1CreateInvoice');
        $model->writeTenant();
    }

    public function createInvoiceHouse2() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration2CreateInvoice');
    }

    public function writeInvoiceHouse2() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration2CreateInvoice');
        $model->writeTenant();
    }

    public function updateInvoiceHouse1($tid) {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration1UpdateInvoice');
        $model->rewriteTenant($tid);
    }

    public function updateInvoiceHouse2() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration2UpdateInvoice');
    }

    public function deleteInvoice($tid, $id, $accId, $houseNumber) {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $model->delete($tid, $id, $accId, $houseNumber);
        $view->render('invoiceAdministration1');
        
        
    }
    
    public function calcInvoice($wert, $weerte){
        $model = $this->model('Model_invoiceAdministration');
        $model->calc($wert, $weerte);
    }


}
