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
class MainRentalAdministration extends Controller {

    //put your code here

    public function index() {
        $model = $this->model('Model_mainRental');
        $view = $this->createView($model);
        $view->render('mainRentalAdministration');

        // close view with footer
        require_once '../html/footer.inc.php';
    }

}