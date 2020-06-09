<?php

require_once 'models/autores.model.php';
require_once 'models/libros.model.php';
require_once 'models/usuario.model.php';
require_once 'api/api.view.php';



class PublicApiController{

    private $model;
    private $view;

    public function __construct() {
        $this->modelAutor =  new AutoresModel();
        $this->modelLibro =  new LibrosModel();
        $this->view = new APIView();
    }

    public function getAllAuthors($params = []) {
        $autores = $this->modelAutor->getAll();
        $this->view->response($autores, 200);
    }

    public function getAllBooks($params = []){
        $libros = $this->modelLibro->getBooksAndAuthors();
        $this->view->response($libros, 200);
    }

    public function getBooksOfAuthor($params = []){
        $idAutor = $params[':ID'];
        $autor = $this->modelLibro->getBooksOfAuthor($idAutor);
        if ($autor){
            $this->view->response($autor, 200);
        }else{
            $this->view->response("no existe autor con id {$idAutor}", 404);
        }
    }

    public function getDetailsOfBook($params = []){
        $idLibro = $params[':ID'];
        $libro = $this->modelLibro->getDetailOfBook($idLibro);
        if ($libro){
            $this->view->response($libro, 200);
        }else{
            $this->view->response("no existe libro con id {$idLibro}", 404);
        }  
    }

    

}