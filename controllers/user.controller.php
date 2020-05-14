<?php

require_once 'models/user.model.php';
require_once 'views/user.view.php';

class UserController{

    private $model;
    private $view;

    public function __construct() {
        $this->model  = new UserModel();
        $this->view = new UserView();
    }

    public function showError($error) {
        $this->view->showError($error); 
    }

    public function showLoginUser() {
        $this->view->showFormLoginUser();
    }
    
    public function verifyUser() {
        $usermail = $_POST['mail'];
        $password = $_POST['password'];

        echo "$usermail $password";
       
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
        //Pido el libro que se quiere borrar a la base de datos
        $idLibro= $this->model->read($idLibro);

        //Mando al view los libros
        echo"Se marcó como leido";
        }
}