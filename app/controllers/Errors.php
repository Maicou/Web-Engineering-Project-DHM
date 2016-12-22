<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error
 *
 * @author Marco Mancuso, David Hall, Raphael Denz
 */
class Errors extends Controller{
    public function index() {
        $model = $this->model('Model_home');
     
        $view = $this->createView($model);
        /*
         * after this function:
         * $view->render(...); 
         * display information from Models to the content
         *
         */
        $view->render('Error');
        // content before closing with footer
        // close view with footer
        
    }
}
