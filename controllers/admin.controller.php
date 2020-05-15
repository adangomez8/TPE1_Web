<?php

require_once 'models/admin.model.php';
require_once 'views/admin.view.php';

class AdminController{

    private $model;
    private $view;

    public function __construct() {
        $this->model  = new AdminModel();
        $this->view = new AdminView();
    }

    public function showError($error) {
        $this->view->showError($error); 
    }

    public function showLoginAdmin() {
        $this->view->showFormLoginAdmin();
    }

    public function showOptionAdmin(){
        //Envío al view
        $this->view->optionAdmin();
    }
 
    public function verifyAdmin() {
        $usermail = $_POST['mail'];
        $password = $_POST['password'];

        echo "$usermail $password";
    }

    public function addBook(){
        //Tomo datos del formulario
        $nombre= $_POST['nombreLibro'];
        $genero= $_POST['genero'];
        $sinopsis=$_POST['sinopsis'];
        $anio= $_POST['anio'];
        $imagen= $_POST['imagen'];
        $autor= $_POST['autor'];


        //Compruebo que no se suba dos veces el mismo libro
        $libro= $this->model->getAuthorBook();
        foreach($libro as $libros){
            if (($nombre == $libros->nombre) && ($autor == $libros->id_autor)){
                $this->view->showError("Error, el libro ingresado ya existe");
                die();
            }
        }

        //Me aseguro de que todos los campos estén completados para enviar los datos al formulario
        if (!empty($nombre)&& !empty($genero) && !empty($sinopsis) && !empty($anio) && !empty($imagen) && !empty($autor)){
        $this->model->newBook($nombre, $genero, $sinopsis, $anio, $imagen, $autor);
        $this->view->addedBook();
        }
        else {
        $this->view->showError("Faltan campos por completar");
        die();
        }
    }

    public function showFormForAggBook(){
        //Pido a la base de datos los id de los autores
        $id= $this->model->getId();

        //mando el id al view para crear el fomrulario
        $this->view->formAddBook($id);
    }

    public function modifyBook($idlibro){
        //Pido el libro para editar al MODELO
        $libro = $this->model->getBookForEdit($idlibro);

        //Actualizo la vista
        $this->view->formEditBook($libro);
    }

    public function deleteBook($idlibro){
        //Pido el libro que se quiere borrar a la base de datos
        $libroBorrado= $this->model->deleteBook($idlibro);

        //Mando al view los libros
        $this->view-> bookdeleted($libroBorrado);
    }

    public function editBooks(){
        //Pido los libros de nuevo a la base de datos
        $libros= $this->model->showBooks();

        //Mando al view los libros
        $this->view->showEditBooks($libros);
    }

    public function saveChangesBook($libro){
        $nombre= $_POST['nombreLibro'];
        $genero= $_POST['genero'];
        $sinopsis=$_POST['sinopsis'];
        $anio= $_POST['anio'];
        $imagen= $_POST['imagen'];
        $autor= $_POST['autor'];

        if (!empty($nombre)&& !empty($genero) && !empty($sinopsis) && !empty($anio) && !empty($imagen) && !empty($autor)){
            $this->model->updateBook($libro, $nombre, $genero, $sinopsis, $anio, $imagen, $autor);
            
        }
        else {
        $this->view->showError("Faltan campos por completar");
        }
    }

    public function addAuthor(){
        $nombre= $_POST['nombre'];
        $foto= $_POST['foto'];

        //Compruebo que no se suban autores existentes
        $autores= $this->model->getAuthors();
        foreach ($autores as $autor){
            if ($autor->nombre == $nombre){
                $this->view->showError("El autor ya existe");
                die();
            }
        }

        if (!empty($nombre)&& !empty($foto)){
            $this->model->createAuthor($nombre, $foto);
            $this->view->addedAuthor($nombre);
        }
        else {
            $this->view->showError("Faltan campos por completar para crear nuevo autor");
        }
    }

    public function showFormForAggAuthor(){
        $this->view->FormAddauthor();
    }

    public function modifyAuthor(){
        //Pido los autores a la base de datos
        $autores= $this->model->getAuthors();

        //Mando al view los autores
        $this->view->showEditAuthor($autores);
    }

    public function deleteAuthor($idautor){
        //Antes de eliminar, compruebo que no haya libros a su nombre
        $libros= $this->model->checkBook($idautor);

        if (!empty($libros)){
            $this->view->showError("Error, existen libros asociados a este autor");
        }
        else {
            $this->model->authorDelete($idautor); //Pido auntor para borrar
            $this->view->authordeleted();
        }
    }

    public function editAuthor(){
        //Pido los autores a la base de datos
        $autores= $this->model->getAuthors();

        //Mando al view los autores
        $this->view->showEditAuthor($autores);
    }

}