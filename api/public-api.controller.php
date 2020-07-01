<?php

require_once 'models/autores.model.php';
require_once 'models/libros.model.php';
require_once 'models/usuario.model.php';
require_once 'models/comentarios.model.php';
require_once 'api/api.view.php';



class PublicApiController{

    private $modelAutor;
    private $modelLibro;
    private $modelComentarios;
    private $view;

    public function __construct() {
        $this->modelAutor =  new AutoresModel();
        $this->modelLibro =  new LibrosModel();
        $this->modelComentarios =  new ComentariosModel();
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

    public function getBooksOfAuthor($params){
        $idAutor = $params[':ID'];
        $libro = $this->modelLibro->getBooksOfAuthor($idAutor);
        if ($libro){
            $this->view->response($libro, 200);
        }else{
            $this->view->response("no existe autor con id {$idAutor}", 404);
        }
    }

    public function getAllCommentarys($params = []){
        $comentarios = $this->modelComentarios->getCommentarys();
        $this->view->response($comentarios, 200);
    }  

}