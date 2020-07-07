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
        $this->data= file_get_contents("php://input"); //Devuelve a string
    }

    public function getAllAuthors($params = []) {
        $autores = $this->modelAutor->getAll();
        if ($autores){
            $this->view->response($autores, 200);
        }else{
            $this->view->response($autores, 204);
        }
    }

    public function getAllBooks($params = []){
        $libros = $this->modelLibro->getBooksAndAuthors();
        if ($libros){
            $this->view->response($libros, 200);
        }else{
            $this->view->response($libros, 204);
        }
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

    public function getComentsOfBook($params){
        $idLibro= $params[':ID'];
        $comentarios = $this->modelComentarios->getComentsBook($idLibro);
        if (!empty($comentarios)){
            $this->view->response($comentarios, 200);
        }else{
            $this->view->response($comentarios, 204);
        }
    }

    public function getdata(){
        return json_decode($this->data); //Convierte el string en JSON
        }

    public function postComment($params){

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

    public function deleteComent($params){
        $id = $params[':ID'];
        $comentario = $this->modelComentarios->getById($id);

        if ($comentario) {
            $this->modelComentarios->delete($id);
            $this->view->response("El comentario con id {$id} se eliminó correctamente", 200);
        }
        else{
            $this->view->response("No existe comentario para eliminar con id {$id}", 404);
        }
    }

}