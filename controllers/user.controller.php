<?php

require_once 'models/user.model.php';
require_once 'views/user.view.php';

class UserController{

    private $model;
    private $view;

    public function __construct() {
        $this->model  = new UserModel();
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
        //Pido los autores al MODELO
        $autores = $this->model->showAuthorsForUser();
        //Actualizo la vista
        $this->view->showListAuthorForUser($autores);
    }

    public function showBooksAuthorUser($idAutor){
        //Pido los libros del autor al MODELO
        $books = $this->model->booksOfAuthor($idAutor);

        //Actualizo la vista
        $this->view->showListBooksOfAuthorUser($books);
    }

    public function readBook($idLibro){
        //Marco como leido
        $this->model->read($idLibro);

        //Pido libro al modelo y le busco el autor
        $libro = $this->model->readedBook($idLibro);
        //var_dump($libro->id_autor_fk);
        //die();
        //Mando al view los libros
        echo"Se marcó como leido";
        //header('Location: ' . BASE_URL . "librosAutorUser" . "/" . $libro->id_autor_fk);
    }

    public function logoutUser(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'loginUser');
    }
}