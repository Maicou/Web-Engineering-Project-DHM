<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainInvoiceAdministration
 *
 * @author Dave
 */
class MainInvoiceAdministration extends Controller {

    //put your code here
    //put your code here

    public function index() {
        $model = $this->model('Model_mainInvoice');
        $view = $this->createView($model);
        $view->render('mainInvoiceAdministration');

        // close view with footer
        require_once '../html/footer.inc.php';
    }

}
