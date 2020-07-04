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
    private $data;

    public function __construct() {
        $this->modelAutor =  new AutoresModel();
        $this->modelLibro =  new LibrosModel();
        $this->modelComentarios =  new ComentariosModel();
        $this->view = new APIView();
        $this->data= file_get_contents("php://input");
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

    public function getdata(){
        return json_decode($this->data);
        }

    public function postComment($params){
        //Devuelve el JSON enviado por POST
        $body= $this->getData();


        $texto= $body->texto;
        $puntaje= $body->puntaje;
        $idUser= $body->idUser;
        $idLibro= $params[':ID'];

        $resultado= $this->modelComentarios->newCommentary($texto, $puntaje, $idLibro, $idUser);
        header("Location: " . BASE_URL . 'infoLibros/' . $idLibro);
        
        if ($resultado){
            $this->view->response("Se agrego el comentario", 200);
        }
        else{
            $this->view->response("No se puedo agregar el comentario", 500);
        }
    }

}