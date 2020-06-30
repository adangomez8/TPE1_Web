<?php

require_once 'models/autores.model.php';
require_once 'models/libros.model.php';
require_once 'models/usuario.model.php';
require_once 'views/public.view.php';
require_once 'helpers/autentication.helper.php';


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
        $user= $this->user();
        //Pido los autores al MODELO
        $autores = $this->modelAutor->getAll();

        //Actualizo la vista
        $this->view->showListAuthor($autores, $user);
    }

    public function showAllBooks(){
        $user= $this->user();
        //Pido los libros al MODELO
        $libros = $this->modelLibro->getBooksAndAuthors();

        //Actualizo la vista
        $this->view->showListBooks($libros, $user);
    }

    public function showBooksAuthor($idAutor){
        $user= $this->user();
        //Pido los libros del autor al MODELO
        $books = $this->modelLibro->getBooksOfAuthor($idAutor);

        if (!empty($books)){
            $this->view->showListBooksOfAuthor($books, $user); //Actualizo la vista
        }
        else {
            $this->view->showError("Aún no hay libros de este autor para mostrar", $user);
        }
    }

    public function infoBooks($idlibro){
        $user= $this->user();
        //Pido un libros al MODELO
        $details = $this->modelLibro->getDetailOfBook($idlibro);

        //Actualizo la vista
        $this->view->showInfoOfBook($details, $user);
    }
    
    public function showLoginUser() {
        $user= $this->user();
        $this->view->showFormLoginUser($user);
    }

    public function formRegister(){
        $user= $this->user();
        $this->view->showFormRegister($user);
    }

    public function sendRegister(){
        $user= $this->user();
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $mail= $_POST['mail'];
        $contraseña= $_POST['password'];

        
        //Compruebo que no queden campos sin completar
        if (!empty($nombre) && !empty($apellido) &&!empty($mail) && !empty($contraseña)){
            //Compruebo que el mail ingresado no exista en la base de datos
            $succes= $this->modelUsuario->getUser($mail);
            if ($succes){
                $this->view->showError("El mail ingresado ya está registrado", $user);
            }
            else{
            $clave_encriptada = password_hash ($contraseña, PASSWORD_DEFAULT); //Encripto contraseña de usuario
            $this->modelUsuario->newUser($nombre, $apellido, $mail, $clave_encriptada);
            $this->view->succesRegister($nombre, $apellido, $user);
            }
        }
        else{
            $this->view->showError("No completó todos los campos", $user);
            die();
        }
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
            $_SESSION['admin']= $user->admin;
            
            header("Location: " . BASE_URL . "home");
        }


        if (!$user){
            $this->view->showFormLoginUser("El mail ingresado no está registado");
        } else{
            $this->view->showFormLoginUser("contraseña incorrecta");
        }
    }

    private function user(){
        if (session_start()){
            $user= $_SESSION;
        }
        return $user;
    }
}