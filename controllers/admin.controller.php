<?php

require_once 'models/autores.model.php';
require_once 'models/libros.model.php';
require_once 'models/usuario.model.php';
require_once 'views/admin.view.php';
require_once 'helpers/autentication.helper.php';

class AdminController{

    private $modelAutor;
    private $modelLibro;
    private $modelUsuario;
    private $view;

    public function __construct() {
        $this->modelAutor = new AutoresModel();
        $this->modelLibro = new LibrosModel();
        $this->modelUsuario = new UsuarioModel();
        $this->view = new AdminView();
        HelperAutenticacion::checkLoggedUser();
    }

    public function showError($error) {
        $this->view->showError($error); 
    }
 
    public function verifyAdmin() {
        $usermail = $_POST['mail'];
        $password = $_POST['password'];

        echo "$usermail $password";
    }

    public function showOptionAdmin(){
        //Envío al view
        $this->view->optionAdmin();
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
        $libro= $this->modelLibro->getAuthorBook();
        foreach($libro as $libros){
            if (($nombre == $libros->nombre) && ($autor == $libros->id_autor)){
                $this->view->showError("Error, el libro ingresado ya existe");
                die();
            }
        }

        //Me aseguro de que todos los campos estén completados para enviar los datos al formulario
        if (!empty($nombre)&& !empty($genero) && !empty($sinopsis) && !empty($anio) && !empty($imagen) && !empty($autor)){
        $this->modelLibro->newBook($nombre, $genero, $sinopsis, $anio, $imagen, $autor);
        $this->view->addedBook("El libro $nombre ha sido subido con éxito");
        }
        else {
        $this->view->showError("Faltan campos por completar");
        die();
        }
    }

    public function showFormForAggBook(){
        //Pido a la base de datos los id de los autores
        $id= $this->modelAutor->getId();

        //mando el id al view para crear el fomrulario
        $this->view->formAddBook($id);
    }

    public function modifyBook($idlibro){
        //Pido el libro para editar al MODELO
        $autores= $this->modelAutor->getAuthorsAndId();
        $libro = $this->modelLibro->getBook($idlibro);

        //Actualizo la vista
        $this->view->formEditBook($libro, $autores);
    }

    public function deleteBook($idlibro){
        //Pido el libro que se quiere borrar a la base de datos
        $libroBorrado= $this->modelLibro->deleteBook($idlibro);

        //Mando al view los libros
        $this->view-> bookdeleted("El libro ha sido eliminado con éxito");
    }

    public function editBooks(){
        //Pido los libros de nuevo a la base de datos
        $libros= $this->modelLibro->getBooksAndAuthors();

        //Mando al view los libros
        $this->view->showEditBooks($libros);
    }

    public function saveChangesBook($id_libro){
        $nombre= $_POST['nombreLibro'];
        $genero= $_POST['genero'];
        $sinopsis=$_POST['sinopsis'];
        $anio= $_POST['anio'];
        $imagen= $_POST['imagen'];
        $autor= $_POST['autor'];


        if (!empty($nombre)&& !empty($genero) && !empty($sinopsis) && !empty($anio) && !empty($imagen) && !empty($autor)){
            $this->modelLibro->updateBook($id_libro, $nombre, $genero, $sinopsis, $anio, $imagen, $autor);
            $this->view->succesEditBook("El libro $nombre ha sido modificado exitosamente");
        }
        else {
        $this->view->showError("Faltan campos por completar");
        }
    }

    public function addAuthor(){
        $nombre= $_POST['nombre'];
        $foto= $_POST['foto'];

        //Compruebo que no se suban autores existentes
        $autores= $this->modelAutor->getAll();
        foreach ($autores as $autor){
            if ($autor->nombre == $nombre){
                $this->view->showError("El autor ya existe");
                die();
            }
        }

        //Compruebo que no estén los campos vacíos
        if (!empty($nombre)&& !empty($foto)){
            $this->modelAutor->newAuthor($nombre, $foto);
            $this->view->addedAuthor("El autor $nombre se agregó con éxito");
        }
        else {
            $this->view->showError("Faltan campos por completar para crear nuevo autor");
        }
    }

    public function showFormForAggAuthor(){
        $this->view->FormAddauthor();
    }

    public function modifyAuthor($id_autor){
        //Pido los autores a la base de datos
        $autores= $this->modelAutor->getAuthor($id_autor);

        //Mando al view los autores
        $this->view->formEditAuthor($autores);
    }

    public function deleteAuthor($idautor){
        //Antes de eliminar, compruebo que no haya libros a su nombre
        $libros= $this->modelLibro->getBooksOfAuthor($idautor);

        if (!empty($libros)){
            $this->view->showError("Error, existen libros asociados a este autor");
        }
        else {
            $this->modelAutor->deleteAuthor($idautor); //Pido auntor para borrar
            $this->view->authordeleted("El autor ha sido eliminado con éxito");
        }
    }

    public function editAuthor(){
        //Pido los autores a la base de datos
        $autores= $this->modelAutor->getAll();

        //Mando al view los autores
        $this->view->showEditAuthor($autores);
    }

    public function changeAuthor($id_autor){
        //Tomo datos nuevos del formulario
        $nombre= $_POST['nombre'];
        $foto= $_POST['foto'];

        if(!empty($nombre)&& !empty($foto)){
            $this->modelAutor->updateAuthor($id_autor, $nombre, $foto);
            $this->view->showSuccesChane("EL autor $nombre ha sido modificado exitosamente");
        }
        else{
            $this->view->showError("Error, complete ambos campos para modificar el autor");
        }

    }

    public function logoutUser(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'loginUser');
    }

}