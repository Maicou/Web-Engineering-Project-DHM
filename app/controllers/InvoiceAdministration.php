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
        require_once 'html/footer.inc.php';
    }

    public function invoiceHouse1() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration1');

        // close view with footer
        require_once 'html/footer.inc.php';
    }

    public function invoiceHouse2() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration2');

        // close view with footer
        require_once 'html/footer.inc.php';
    }

    public function createInvoiceHouse1() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration1CreateInvoice');
    }

    public function writeInvoiceHouse1() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        //$view->render('invoiceAdministration1CreateInvoice');
        $model->writeInvoiceAnton_Leo_house();
        $view->render('mainInvoiceAdministration');
    }

    public function createInvoiceHouse2() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration2CreateInvoice');
    }

    public function writeInvoiceHouse2() {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
       // $view->render('invoiceAdministration2CreateInvoice');
        $model->writeInvoiceOVR_house();
        $view->render('mainInvoiceAdministration');
    }

    public function updateInvoiceHouse1($eid, $houseNumber) {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration1UpdateInvoice');
        $model->showInvoiceToUpdate($eid, $houseNumber);
    }

    public function updateInvoiceHouse2($eid, $houseNumber) {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $view->render('invoiceAdministration2UpdateInvoice');
        $model->showInvoiceToUpdate($eid, $houseNumber);
    }
    
    public function rewriteInvoiceHouse($eid, $expensetyp, $houseNumber){
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $model->update($eid, $expensetyp, $houseNumber);
        $view->render('mainInvoiceAdministration');
         
    }
   
    public function deleteInvoice($eid, $houseNumber) {
        $model = $this->model('Model_invoiceAdministration');
        $view = $this->createView($model);
        $model->delete($eid, $houseNumber);
         $view->render('mainInvoiceAdministration');
    }

    public function calcInvoice($wert, $weerte) {
        $model = $this->model('Model_invoiceAdministration');
        $model->calc($wert, $weerte);
    }

}
