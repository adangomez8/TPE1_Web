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

    public function showBooksAuthor($idlibro){
        //Pido los libros del autor al MODELO
        $libros = $this->model->showBooksOfAuthor($idlibro);
        $detail = $this->model->detailsOfBook($idlibro);

        //Actualizo la vista
        $this->view->showListBooksOfAuthor($libros, $detail);
    }

    public function infoBooks($idlibro){
        //Pido un libros al MODELO
        $libro = $this->model->infoOfBook($idlibro);
        $detail = $this->model->detailsOfBook($idlibro);

        //Actualizo la vista
        $this->view->showInfoOfBook($libro, $detail);
    }

}