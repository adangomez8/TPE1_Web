<?php
require_once 'models/comentarios.model.php';
require_once 'views/user.view.php';
require_once 'models/comentarios.model.php';

class UserController{

    private $model;
    private $modelComentario;
    private $view;

    public function __construct() {
        $this->modelComen = new ComentariosModel();
        $this->view = new UserView();
        $this->modelComentario = new ComentariosModel();
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
        $id = $param;
        $comentario= $_POST['comentario'];
        $puntuacion= $_POST['puntuacion'];
        $usuario= $_POST['usuario'];
        
        if (!empty($comentario)){
            $this->modelComentario->newCommentary($comentario, $puntuacion, $usuario, $id);
            header("Location: " . BASE_URL . 'infoLibros/'.$id);
        }
        else{
            header("Location: " . BASE_URL . 'infoLibros/'.$id);
        }
    }
}