<?php
require_once 'models/comentarios.model.php';
require_once 'views/user.view.php';

class UserController{

    private $modelComen;
    private $view;

    public function __construct() {
        $this->modelComen = new ComentariosModel();
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

    public function logoutUser(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'loginUser');
    }

    public function sendCommentary($param){
        $id = $param[0];
        $comentario= $_POST['comentario'];
        $puntuacion= $_POST['puntuacion'];
        $idLibro= $_POST['libro'];
        
        if (!empty($comentario)){
            $this->modelComen->newCommentary($comentario, $puntuacion, $idLibro);
           
            header("Location: " . BASE_URL . 'infoLibros/'.$id);
        }
        else{
            header("Location: " . BASE_URL . 'infoLibros/'.$id);
        }
    }
}