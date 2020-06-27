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
        $autor= $_POST['autor'];

        //var_dump($imagen);die();


        //Compruebo que no se suba dos veces el mismo libro
        $autores= $this->modelAutor->getId();
        $libro= $this->modelLibro->getAuthorBook();
        foreach($libro as $libros){
            if (($nombre == $libros->nombre) && ($autor == $libros->id_autor)){
                $this->view->formAddBook($autores, "El libro ingresado ya existe");
                die();
            }
        }

        //Compruebo el formato de la imagen //Me aseguro también que todos los campos estén completados para enviar los datos al formulario
        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || 
        $_FILES['imagen']['type'] == "image/png" || $_FILES['imagen']['type'] == "image/gif" && !empty($nombre)
        && !empty($genero) && !empty($sinopsis) && !empty($anio) && !empty($autor)){
            $this->modelLibro->newBook($nombre, $genero, $sinopsis, $anio, $_FILES['imagen']['tmp_name'], $autor,);
            $this->view->formAddBook($autores, "El libro '$nombre' ha sido subido con éxito");
        }else {
            $this->view->formAddBook($autores, "Faltan campos por completar");
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
        $this->modelLibro->deleteBook($idlibro);
        $libros = $this->modelLibro->getBooksAndAuthors();

        //Mando al view los libros
        $this->view->showEditBooks($libros, "El libro ha sido eliminado con éxito");
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
        $autor= $_POST['autor'];

        $autores= $this->modelAutor->getAuthorsAndId();
        $libros = $this->modelLibro->getBooksAndAuthors();
        $libro = $this->modelLibro->getBook($id_libro);


        //Compruebo el formato de la imagen
        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || 
        $_FILES['imagen']['type'] == "image/png" || $_FILES['imagen']['type'] == "image/gif" && !empty($nombre)
        && !empty($genero) && !empty($sinopsis) && !empty($anio) && !empty($autor)){
            $this->modelLibro->updateBook($id_libro, $nombre, $genero, $sinopsis, $anio, $_FILES['imagen']['tmp_name'], $autor);
            $this->view->showEditBooks($libros, "El libro '$nombre' ha sido modificado exitosamente");
        } else{
            $this->view->formEditBook($libro, $autores, "Faltan campos por completar");
        }
    }

    public function addAuthor(){
        $nombre= $_POST['nombre'];
        $foto= $_POST['foto'];

        //Compruebo que no se suban autores existentes
        $autores= $this->modelAutor->getAll();
        foreach ($autores as $autor){
            if ($autor->nombre == $nombre){
                $this->view->FormAddauthor("El autor ya existe");
                die();
            }
        }

        //Compruebo que no estén los campos vacíos
        if (!empty($nombre)&& !empty($foto)){
            $this->modelAutor->newAuthor($nombre, $foto);
            $this->view->FormAddauthor("El autor $nombre se agregó con éxito");
        }
        else {
            $this->view->FormAddauthor("Faltan campos por completar para crear nuevo autor");
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
        
        $libros= $this->modelLibro->getBooksOfAuthor($idautor);
        $autores= $this->modelAutor->getAll();
        
        //Antes de eliminar, compruebo que no haya libros a su nombre
        if (!empty($libros)){
            $this->view->showEditAuthor($autores, "No se pudo borrar, existen libros asociados a este autor");
        }
        else {
            $this->modelAutor->deleteAuthor($idautor); //Pido autor para borrar
            $this->view->showEditAuthor($autores, "El autor ha sido eliminado con éxito");
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
        
        $autor= $this->modelAutor->getAuthor($id_autor);
        $autores= $this->modelAutor->getAll();

        if(!empty($nombre)&& !empty($foto)){
            $this->modelAutor->updateAuthor($id_autor, $nombre, $foto);
            $this->view->showEditAuthor($autores, "El autor '$nombre' ha sido modificado exitosamente");
        }
        else{
            $this->view->formEditAuthor($autor, "Complete ambos campos para modificar el autor");
        }

    }

    public function logoutUser(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'loginUser');
    }

}