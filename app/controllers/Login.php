<?php
session_start();
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
    
    public function valideUser(){
        
        $model = $this->model('Model_login');
        $view = $this->createView($model);
        $model->loginTesting();
        
        require_once '../app/models/Model_login.php';
        
        if (@$_SESSION['eingeloggt'] == true) {
        $view->render('Home');
        $view->printToContent();
        require_once '../html/footer.inc.php';
        }else{
            
            $view->render('login');
            
        }
        
        
        
        

    }

}
