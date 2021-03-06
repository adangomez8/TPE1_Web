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
    private $modelComentarios;
    private $viewUsuario;

    public function __construct() {
        $this->modelAutor = new AutoresModel();
        $this->modelLibro = new LibrosModel();
        $this->modelUsuario = new UsuarioModel();
        $this->modelComentarios = new ComentariosModel();
        $this->modelComentario = new ComentariosModel();
        $this->viewUsuario = new AdminView();
        HelperAutenticacion::checkLoggedAdmin();
    }

    public function showError($error) {
        $this->viewUsuario->showError($error); 
    }
 
    public function verifyAdmin() {
        $usermail = $_POST['mail'];
        $password = $_POST['password'];

        echo "$usermail $password";
    }

    public function showOptionAdmin(){
        //Envío al viewUsuario
        $this->viewUsuario->optionAdmin();
    }

    //SUBIR IMAGEN A LIBRO
    public function upImage($id){
        //Compruebo que no haya imagen en el libro
        $libro= $this->modelLibro->getBook($id);

        if (!$libro->imagen){
            //Compruebo formato de la imagen
            if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || 
            $_FILES['imagen']['type'] == "image/png" || $_FILES['imagen']['type'] == "image/gif"){
                $this->modelLibro->newImagen($_FILES['imagen']['tmp_name'], $_FILES['imagen']['name'], $id);
                header("Location: " . BASE_URL . 'infoLibros/' . $id);
            }
        }
        else {
            $this->viewUsuario->showError("Ya existe una imagen en este libro");
            die();
        }
    }

    //ELIMINAR IMAGEN DE LIBRO
    public function deleteImage($id){
        $libro= $this->modelLibro->getBook($id);
        $this->modelLibro->deleteImg($id);
        unlink($libro->imagen); //Elimina la imagen de la carpeta
        header("Location: " . BASE_URL . 'infoLibros/' . $id);
    } 

    //SUBIR UN NUEVO LIBRO
    public function addBook(){
        //Tomo datos del formulario
        $nombre= $_POST['nombreLibro'];
        $genero= $_POST['genero'];
        $sinopsis=$_POST['sinopsis'];
        $anio= $_POST['anio'];
        $autor= $_POST['autor'];


        //Compruebo que no se suba dos veces el mismo libro
        $autores= $this->modelAutor->getId();
        $libro= $this->modelLibro->getAuthorBook();
        foreach($libro as $libros){
            if (($nombre == $libros->nombre) && ($autor == $libros->id_autor)){
                $this->viewUsuario->formAddBook($autores, "El libro ingresado ya existe");
                die();
            }
        }

        //Compruebo el formato de la imagen //Me aseguro también que todos los campos estén completados para enviar los datos al formulario
        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || 
        $_FILES['imagen']['type'] == "image/png" || $_FILES['imagen']['type'] == "image/gif" || $_FILES['imagen']['type'] == null
        && !empty($nombre) && !empty($genero) && !empty($sinopsis) && !empty($anio) && !empty($autor)){
            $this->modelLibro->newBook($nombre, $genero, $sinopsis, $anio, $_FILES['imagen']['tmp_name'], $_FILES['imagen']['name'], $autor);
            $this->viewUsuario->formAddBook($autores, "El libro '$nombre' ha sido subido con éxito");
        }else {
            $this->viewUsuario->formAddBook($autores, "Faltan campos por completar");
            die();
        }
    }

    public function showFormForAggBook(){
        //Pido a la base de datos los id de los autores
        $id= $this->modelAutor->getId();

        //mando el id al viewUsuario para crear el fomrulario
        $this->viewUsuario->formAddBook($id);
    }

    //MANDA A FORMULARIO PARA EDITAR LIBRO
    public function modifyBook($idlibro){
        //Pido el libro para editar al MODELO
        $autores= $this->modelAutor->getId();
        $libro = $this->modelLibro->getBook($idlibro);

        //Actualizo la vista
        $this->viewUsuario->formEditBook($libro, $autores);
    }

    //FUNCIÓN ELIMINAR LIBRO
    public function deleteBook($idlibro){
        //Pido el libro que se quiere borrar a la base de datos
        $this->modelLibro->deleteBook($idlibro);
        $libros = $this->modelLibro->getBooksAndAuthors();

        //Mando al viewUsuario los libros
        $this->viewUsuario->showEditBooks($libros, "El libro ha sido eliminado con éxito");
    }

    //MUESTRA TABLA PARA EDITAR-ELIMIAR LIBRO
    public function editBooks(){
        //Pido los libros de nuevo a la base de datos
        $libros= $this->modelLibro->getBooksAndAuthors();

        //Mando al viewUsuario los libros
        $this->viewUsuario->showEditBooks($libros);
    }

    //FUNCIÓN DE EDITAR LIBRO
    public function saveChangesBook($id_libro){
        $nombre= $_POST['nombreLibro'];
        $genero= $_POST['genero'];
        $sinopsis=$_POST['sinopsis'];
        $anio= $_POST['anio'];
        $autor= $_POST['autor'];
        $imagen= $_FILES['imagen']['error']; //EL ERROR NOS DEVUELVE UN 4 SI EL ADMINISTRADOR NO ELIGIÓ EDITAR LA IMAGEN

        $libros = $this->modelLibro->getBooksAndAuthors();

        //Si no edita imagen
        if ($imagen == 4 && !empty($nombre) && !empty($genero) && !empty($sinopsis) && !empty($anio) && !empty($autor)){
            $this->modelLibro->updateNotImage($id_libro, $nombre, $genero, $sinopsis, $anio, $autor);
            header("Location: " . BASE_URL . 'editLibros');
        }
        else if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || 
        $_FILES['imagen']['type'] == "image/png" || $_FILES['imagen']['type'] == "image/gif" && !empty($nombre)
        && !empty($genero) && !empty($sinopsis) && !empty($anio) && !empty($autor)){
            $this->modelLibro->updateBook($id_libro, $nombre, $genero, $sinopsis, $anio, $_FILES['imagen']['tmp_name'], $_FILES['imagen']['name'], $autor);
            header("Location: " . BASE_URL . 'editLibros');
        }
        else{
            $this->viewUsuario->showError("Faltan campos por completar");
            die();
        }
    }

    //FUNCIÓN PARA AGREGAR UN NUEVO AUTOR
    public function addAuthor(){
        $nombre= $_POST['nombre'];
        $foto= $_POST['foto'];

        //Compruebo que no se suban autores existentes
        $autores= $this->modelAutor->getAll();
        foreach ($autores as $autor){
            if ($autor->nombre == $nombre){
                $this->viewUsuario->FormAddauthor("El autor ya existe");
                die();
            }
        }

        //Compruebo que no estén los campos vacíos
        if (!empty($nombre)&& !empty($foto)){
            $this->modelAutor->newAuthor($nombre, $foto);
            $this->viewUsuario->FormAddauthor("El autor $nombre se agregó con éxito");
        }
        else {
            $this->viewUsuario->FormAddauthor("Faltan campos por completar para crear nuevo autor");
        }
    }

    public function showFormForAggAuthor(){
        $this->viewUsuario->FormAddauthor();
    }

    public function modifyAuthor($id_autor){
        //Pido los autores a la base de datos
        $autores= $this->modelAutor->getAuthor($id_autor);

        //Mando al viewUsuario los autores
        $this->viewUsuario->formEditAuthor($autores);
    }

    //FUNCIÓN PARA ELIMINAR UN AUTOR
    public function deleteAuthor($idautor){
        
        $libros= $this->modelLibro->getBooksOfAuthor($idautor);
        $autores= $this->modelAutor->getAll();
        
        //Antes de eliminar, compruebo que no haya libros a su nombre
        if (!empty($libros)){
            $this->viewUsuario->showEditAuthor($autores, "No se pudo borrar, existen libros asociados a este autor");
        }
        else {
            $this->modelAutor->deleteAuthor($idautor); //Pido autor para borrar
            $this->viewUsuario->showEditAuthor($autores, "El autor ha sido eliminado con éxito");
        }
    }

    public function editAuthor(){
        //Pido los autores a la base de datos
        $autores= $this->modelAutor->getAll();

        //Mando al viewUsuario los autores
        $this->viewUsuario->showEditAuthor($autores);
    }

    //FUNCIÓN PARA EDITAR AUTOR
    public function changeAuthor($id_autor){
        //Tomo datos nuevos del formulario
        $nombre= $_POST['nombre'];
        $foto= $_POST['foto'];
        
        $autor= $this->modelAutor->getAuthor($id_autor);
        $autores= $this->modelAutor->getAll();

        if(!empty($nombre)&& !empty($foto)){
            $this->modelAutor->updateAuthor($id_autor, $nombre, $foto);
            $this->viewUsuario->showEditAuthor($autores, "El autor '$nombre' ha sido modificado exitosamente");
        }
        else{
            $this->viewUsuario->formEditAuthor($autor, "Complete ambos campos para modificar el autor");
        }

    }

    //MUESTRA EN UNA TABLA TODOS LOS USUARIOS
    public function allUser(){
        $usuarios= $this->modelUsuario->getAllUser();
        //Mando al viewUsuario los usuarios
        $this->viewUsuario->showListUser($usuarios);
    }

    //FUNCIÓN DE DAR PERMISOS 
    public function givePermissionAdmin($idUser){
        
        $this->modelUsuario->giveAdminUser($idUser);
        header("Location: " . BASE_URL . 'todosUsers');
    }

    //FUNCIÓN DE QUITAR PERMISOS
    public function removePermissionAdmin($idUser){
        $this->modelUsuario->removeAdminUser($idUser);
        header("Location: " . BASE_URL . 'todosUsers');
    }

    //FUNCIÓN DE ELIMINAR USUARIO
    public function deleteUser($idUser){
        //Compruebo que no haya comentarios realizados por ese usuario
        $comentarios = $this->modelComentarios->getById($idUser);
        if ($comentarios){
            $this->viewUsuario->showError("No se puede eliminar el usuario porque hay comentarios realizados por el mismo");
        }
        else{
            $this->modelUsuario->deleteUser($idUser);
            header("Location: " . BASE_URL . 'todosUsers');
        }
    }
}