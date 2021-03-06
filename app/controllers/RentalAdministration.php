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
class RentalAdministration extends Controller {

    public function index() {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $view->render('mainRentalAdministration');
        require_once 'html/footer.inc.php';
    }

    public function houseOne() {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $view->render('rentalAdministration1');
        require_once 'html/footer.inc.php';
    }

    public function houseTwo() {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $view->render('rentalAdministration2');
        require_once 'html/footer.inc.php';
    }

    public function createTenantHouse1() {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $view->render('rentalAdministration1CreateTenant');
    }

    public function writeTenantHouse1() {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $model->writeTenant();
        $view->render('mainRentalAdministration');
        require_once 'html/footer.inc.php';
    }

    public function createTenantHouse2() {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $view->render('rentalAdministration2CreateTenant');
    }

    public function writeTenantHouse2() {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $model->writeTenant();
        $view->render('mainRentalAdministration');
        require_once 'html/footer.inc.php';
    }

    public function updateTenantHouse1($tid) {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $view->render('rentalAdministration1UpdateTenant');
        $model->showTenantToUpdate($tid);
    }

    public function updateTenantHouse2($tid) {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $view->render('rentalAdministration2UpdateTenant');
        $model->showTenantToUpdate($tid);
    }

    public function rewriteTenantHouse1($tid, $id1, $id2, $id3, $accId, $houseNumber) {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $model->update($tid, $id1, $id2, $id3, $accId, $houseNumber);
        $view->render('mainRentalAdministration');
        require_once 'html/footer.inc.php';
    }

    public function rewriteTenantHouse2($tid, $id1, $id2, $id3, $accId, $houseNumber) {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $model->update($tid, $id1, $id2, $id3, $accId, $houseNumber);
        $view->render('mainRentalAdministration');
        require_once 'html/footer.inc.php';
    }

    public function deleteTenants($tid, $id, $accId, $houseNumber) {
        $model = $this->model('Model_rentalAdministration');
        $view = $this->createView($model);
        $model->delete($tid, $id, $accId, $houseNumber);
        $view->render('mainRentalAdministration');
        require_once 'html/footer.inc.php';
    }

}
