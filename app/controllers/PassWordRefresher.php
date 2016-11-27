<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PassWordRefresher
 *
 * @author Dave
 */
class PassWordRefresher extends Controller {

    public function index() {
        $model = $this->model('Model_passWordRefresher');
        $model->resetPassWord();
//        $view = $this->createView($model);
//        $view->render('passWordRefresher');
        // $view->printToContent();
//        require_once '../html/footer.inc.php';
    }

    public function refresher() {
        $model = $this->model('Model_passWordRefresher');
        $view = $this->createView($model);
        $model->resetPassWord();
    }
    
    public function customizer(){
        $model = $this->model('Model_passWordRefresher');
        $view = $this->createView($model);
        $model->customizingPassWord();
    }

}
