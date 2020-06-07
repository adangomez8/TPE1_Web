<?php

require_once 'views/user.view.php';

class UserController{

    private $model;
    private $view;

    public function __construct() {
        $this->view = new UserView();
        //Barrera de segurisad
        $this->checkLoggedUser();
    }

    public function showError($error) {
        $this->view->showError($error); 
    }

    private function checkLoggedUser() {

        session_start(); 

        if (!isset($_SESSION['logged'])) {
            header('Location: ' . BASE_URL . 'loginUser');
            die();
        }

    }
 
    public function showUserHome(){

        $this->view->showError("En reparación. Próximamente podrá hacer uso de esta funcionalidad");
    }

}