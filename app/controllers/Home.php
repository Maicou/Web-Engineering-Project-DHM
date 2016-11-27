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
class Home extends Controller {
    
        
    

    //put your code here

    public function index($name = '') {
        $model = $this->model('Model_home');
        $model->setName("Home");
        $view = $this->createView($model);
        /*
         * after this function:
         * $view->render(...); 
         * display information from Models to the content
         *
         */
        $view->render('home');
        // content before closing with footer
        // close view with footer
        require_once '../html/footer.inc.php';
    }

    public function test() {
        
    }

}
