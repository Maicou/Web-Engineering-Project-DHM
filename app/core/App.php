<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Home
 *
 * @author Marco Mancuso, David Hall, Raphael Denz
 */
class App {

    //default controller and default method when application starts
    protected $controller = 'Login';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        
       
        $url = $this->parseUrl();
        // check if String on position 0 isset and use the controller with this 
        // name/String if not skip and just take this controller
        if (@$_SESSION['eingeloggt'] == true) {
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
            }else{
            $this->controller = 'Errors';
        }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        // check if there is a method with the String given on the position 1
        //
       $this->controller = new $this->controller;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // check if there are params given after $url[1] if not use empty
        // array
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}
