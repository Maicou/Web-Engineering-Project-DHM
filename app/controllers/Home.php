<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Marco Mancuso
 */
class Home extends Controller {

    //put your code here

    public function index($name = '') {
        $model = $this->model('User');
        $model->name = "Home";

        // extended from Controller --> method view --> given first parameter
        // ... and second parameter ...
//        $this->view('home', ['name' => $model]);
//        $model->printsome();

        $view = $this->createView($model);
        $view->render('home');
        $view->printToContent();
        // close view with footer
        require_once '../html/footer.inc.php';
    }

    public function test() {
            
    }

}
