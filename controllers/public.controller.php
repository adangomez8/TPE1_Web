<?php

require_once 'models/autores.model.php';
require_once 'models/libros.model.php';
require_once 'models/usuario.model.php';
require_once 'views/public.view.php';


class PublicController{

    private $modelAutor;
    private $modelLibro;
    private $modelUsuario;
    private $view;

    public function __construct() {
        $this->modelAutor = new AutoresModel();
        $this->modelLibro = new LibrosModel();
        $this->modelUsuario = new UsuarioModel();
        $this->view = new PublicView();
    }

    public function showError($error) {
        $this->view->showError($error); 
    }

    public function showHome(){
        //Pido los autores al MODELO
        $autores = $this->modelAutor->getAll();

        //Actualizo la vista
        $this->view->showListAuthor($autores);
    }

    public function showAllBooks(){
        //Pido los libros al MODELO
        $libros = $this->modelLibro->getBooksAndAuthors();

        //Actualizo la vista
        $this->view->showListBooks($libros);
    }

    public function showBooksAuthor($idAutor){
        //Pido los libros del autor al MODELO
        $books = $this->modelLibro->getBooksOfAuthor($idAutor);

        if (!empty($books)){
            $this->view->showListBooksOfAuthor($books); //Actualizo la vista
        }
        else {
            $this->view->showError("Aún no hay libros de este autor para mostrar");
        }
    }

    public function infoBooks($idlibro){
        //Pido un libros al MODELO
        $details = $this->modelLibro->getDetailOfBook($idlibro);
        //var_dump($details->imagen);die();

        //Actualizo la vista
        $this->view->showInfoOfBook($details);
    }
    
    public function showLoginUser() {
        $this->view->showFormLoginUser();
    }

    public function verifyUser() {
        $usermail = $_POST['mail'];
        $password = $_POST['password'];

        $user = $this->modelUsuario->getUser($usermail);


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