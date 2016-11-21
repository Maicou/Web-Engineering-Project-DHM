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
class Login extends Controller {

    //put your code here

    public function index() {
        $model = $this->model('Model_login');
        $view = $this->createView($model);
        $view->render('login');

        // close view with footer
        require_once '../html/footer.inc.php';
    }

    public function valideUser() {


        $model = $this->model('Model_login');
        $view = $this->createView($model);
        //$model->loginTesting();
        $model->loginTestingAdvanced();

        //  if (@$_SESSION['eingeloggt'] == true) {
//            header("Location:../home/index/");
//        $view->render('Home');
//        $view->printToContent();
//        require_once '../html/footer.inc.php';
//        }else{
//            
//            $view->render('login');
//        require_once '../html/footer.inc.php';    
        //  }
    }

    public function loginOutFunction() {
        session_destroy();
        $model = $this->model('Model_login');
        $view = $this->createView($model);
        $view->render('logout');
        require_once '../html/footer.inc.php';
    }

}
