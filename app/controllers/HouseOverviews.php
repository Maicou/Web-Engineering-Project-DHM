<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buildingOverview
 *
 * @author Marco Mancuso, Raphael Denz, David Hall
 */
class HouseOverviews extends Controller{
 
    public function index(){
        $this->houseOne();
    }
    
    
    public function houseOne(){
        $model = $this->model('Model_houseOverviews'); 
        $view = $this->createView($model);
        $view->render('houseOverview1');
        $view->model->setName("Anton-Leo");
        $view->model->setAdress("Anton-Leo-Str. 6");
        $view->model->setSize("7 Wohnungen");
        $view->model->showData();
        require_once '../html/footer.inc.php';
    }

    public function houseTwo(){
        $model = $this->model('Model_houseOverviews'); 
        $view = $this->createView($model);
        $view->render('houseOverview2');
        $view->model->setName("OVR");
        $view->model->setAdress("Von-Roll-Strasse 12");
        $view->model->setSize("145 Zimmer");
        $view->model->showData();
        require_once '../html/footer.inc.php';
    }
    
    public function houseThree(){
        $model = $this->model('Model_houseOverviews'); 
        $view = $this->createView($model);
        $view->render('houseOverview3');
        $view->model->setName("OTA");
        $view->model->setAdress("Tannwaldstrasse 10");
        $view->model->setSize("1425 Zimmer");
        $view->model->showData();
        require_once '../html/footer.inc.php';
    }

     public function createTenantHouse1(){
        $model = $this->model('Model_houseOverviews'); 
        $model->writeTenantHouse1();
        $view = $this->createView($model);
        $view->render('houseOverview1CreateTenant');
    }
    
    public function createTenantHouse2(){
        $model = $this->model('Model_houseOverviews'); 
        $view = $this->createView($model);
        $view->render('houseOverview2CreateTenant');
    }
    
    public function updateTenantHouse1(){
        $model = $this->model('Model_houseOverviews'); 
        $view = $this->createView($model);
        $view->render('houseOverview1UpdateTenant');
    }

public function updateTenantHouse2(){
        $model = $this->model('Model_houseOverviews'); 
        $view = $this->createView($model);
        $view->render('houseOverview2UpdateTenant');
    }
//put your code here
}
