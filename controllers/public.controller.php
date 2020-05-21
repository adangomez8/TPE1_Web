<?php

require_once 'models/public.model.php';
require_once 'views/public.view.php';

class PublicController{

    private $model;
    private $view;

    public function __construct() {
        $this->model  = new PublicModel();
        $this->view = new PublicView();
    }

    public function showError($error) {
        $this->view->showError($error); 
    }

    public function showHome(){
        //Pido los autores al MODELO
        $autores = $this->model->showAuthors();

        //Actualizo la vista
        $this->view->showListAuthor($autores);
    }

    public function showAllBooks(){
        //Pido los libros al MODELO
        $libros = $this->model->showBooks();

        //Actualizo la vista
        $this->view->showListBooks($libros);
    }

    public function showBooksAuthor($idAutor){
        //Pido los libros del autor al MODELO
        $books = $this->model->booksOfAuthor($idAutor);

        if (!empty($books)){
            $this->view->showListBooksOfAuthor($books); //Actualizo la vista
        }
        else {
            $this->view->showError("Aún no hay libros de este autor para mostrar");
        }
    }

    public function infoBooks($idlibro){
        //Pido un libros al MODELO
        $details = $this->model->infoOfBook($idlibro);

        //Actualizo la vista
        $this->view->showInfoOfBook($details);
    }
    
    public function showLoginUser() {
        $this->view->showFormLoginUser();
    }

    public function verifyUser() {
        $usermail = $_POST['mail'];
        $password = $_POST['password'];

        $user = $this->model->getUser($usermail);


        if ($user && password_verify($password, $user->password)) { 

            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['id_user'] = $user->id_usuario;
            $_SESSION['usermail'] = $user->mail;
            $_SESSION['username'] = $user->nombre;
            $_SESSION['usersurname'] = $user->apellido;
            
            header("Location: " . BASE_URL . "admin");
        }


        if (!$user){
            $this->view->showFormLoginUser("El mail ingresado no está registado");
        } else{
            $this->view->showFormLoginUser("contraseña incorrecta");
        }
    }
}