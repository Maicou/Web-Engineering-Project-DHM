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
        $model->loginTestingAdvanced();
    }

    public function loginOutFunction() {
        session_destroy();
        session_unset();
        $_SESSION = array();
        
        if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"],
        $params["domain"], $params["secure"], $params["httponly"]
    );
}
        $model = $this->model('Model_login');
        $view = $this->createView($model);
        $view->render('logout');
        require_once '../html/footer.inc.php';
    }
    
    public function refresher() {
        $model = $this->model('Model_login');
        $view = $this->createView($model);
        $model->resetPassWord();
    }

}
