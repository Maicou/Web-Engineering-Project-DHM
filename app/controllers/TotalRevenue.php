<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**

 *
 * @author Dave
 */
class TotalRevenue extends Controller {

    //put your code here

    public function index() {
        $model = $this->model('Model_totalRevenue');
        $view = $this->createView($model);
        $view->render('totalRevenue');

        // close view with footer
        require_once '../html/footer.inc.php';
    }

    public function revenueHouseOne() {
        $model = $this->model('Model_totalRevenue');
        $view = $this->createView($model);
        $view->render('revenueHouseOne');

        // close view with footer
        require_once '../html/footer.inc.php';
    }

    public function revenueHousetwo() {
        $model = $this->model('Model_totalRevenue');
        $view = $this->createView($model);
        $view->render('revenueHouseTwo');

        // close view with footer
        require_once '../html/footer.inc.php';
    }

}
