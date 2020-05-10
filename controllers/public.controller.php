<?php

require_once 'models/autores.model.php';
require_once 'views/home.view.php';

class PublicController{

    private $model;
    private $view;

    public function __construct() {
        $this->model  = new AutoresModel();
        $this->view = new HomeView();
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
        $books = $this->model->booksOfAutho($idAutor);

        //Actualizo la vista
        $this->view->showListBooksOfAuthor($books);
    }

    public function infoBooks($idlibro){
        //Pido un libros al MODELO
        $details = $this->model->infoOfBook($idlibro);

        //Actualizo la vista
        $this->view->showInfoOfBook($details);
    }
    
    public function showError($error) {
        $this->view->showError($error); 
    }

    public function showForm(){
        //Pido a la base de datos los id de los autores
        $id= $this->model->getId();

        //mando el id al view para crear el fomrulario
        $this->view->fomr($id);
    }

    public function showOption(){
        $this->view->option();
    }


}