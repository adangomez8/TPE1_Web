<?php

class LibrosModel {
    public function __construct() {
        $this->db = $this->createConection();
    }

    Private function createConection(){
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_libreria';
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function getBooksAndAuthors(){
        $sentencia=$this->db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, libros.id_libro  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor ORDER BY libros.nombre ASC");      
        $sentencia->execute();
        $libros= $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $libros;
    }

    public function getBooksOfAuthor($idAutor){
        $sentencia = $this->db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, autores.id_autor AS IdAutor,
        libros.id_autor_fk,  libros.id_libro, libros.leido  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor WHERE id_autor_fk = ? ORDER BY libros.nombre ASC"); // prepara la consulta
        $sentencia->execute([$idAutor]); // ejecuta
        $books = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $books;
    }

    public function getDetailOfBook($idlibro){
        $sentencia = $this->db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, 
        libros.genero AS Genero, libros.anio AS Anio, libros.imagen, libros.id_autor_fk,  
        libros.id_libro, libros.sinopsis  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor 
        WHERE id_libro = ?"); // prepara la consulta
        $sentencia->execute([$idlibro]); // ejecuta
        $details = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta

        return $details;
    }

    public function getAuthorBook(){
        $sentencia= $this->db->prepare("SELECT autores.id_autor, libros.nombre FROM autores JOIN libros");
        $sentencia->execute();
        $libro= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $libro;
    }

    public function newBook($nombre, $genero, $sinopsis, $anio, $imagen = null, $name, $autor){
        $pathImg= null;
        if ($imagen){
            $pathImg= $this->uploadImage($imagen, $name);
        }
        $sentencia= $this->db->prepare("INSERT INTO libros(nombre, genero, sinopsis, anio, imagen, id_autor_fk) VALUE(?, ?, ?, ?, ?, ?)");
        $sentencia->execute([$nombre, $genero, $sinopsis, $anio, $pathImg, $autor]);//Ejecuta
    }

    //Función de redirección de imagenes
    private function uploadImage($imagen, $name){
        $target= 'imagenes/libros/' . uniqid("", true) . "." . strtolower(pathinfo($name, PATHINFO_EXTENSION));
        move_uploaded_file($imagen, $target);
        return $target;
    }

    public function newImagen($imagen, $name, $id){
        $pathImg= null;
        if ($imagen){
            $pathImg= $this->uploadImage($imagen, $name);
        }
        $sentencia= $this->db->prepare("UPDATE libros SET imagen=? WHERE libros.id_libro = ?");
        $sentencia->execute([$pathImg, $id]);
    }

    public function deleteImg($id){
        $imagen= null;
        $sentencia= $this->db->prepare("UPDATE libros SET imagen=? WHERE id_libro= ?");
        $sentencia->execute([$imagen, $id]);
    }

    public function getBook($idlibro){
        $sentencia = $this->db->prepare("SELECT libros.nombre, libros.genero, libros.sinopsis, libros.anio, libros.imagen,
        libros.id_libro FROM libros WHERE id_libro = ?");
        //ejecuto sentencia
        $sentencia->execute([$idlibro]);
        $libro= $sentencia->fetch(PDO::FETCH_OBJ);

        return $libro;
    }

    public function deleteBook($idlibro){
        $sentencia = $this->db->prepare("DELETE FROM libros WHERE id_libro = ?");
        //ejecuto sentencia
        $sentencia->execute([$idlibro]);
    }

    public function updateBook($id_libro, $nombre, $genero, $sinopsis, $anio, $imagen = null, $name, $autor){
        $pathImg= null;
        if ($imagen){
            $pathImg= $this->uploadImage($imagen, $name);
        }
        $sentencia = $this->db->prepare("UPDATE libros SET nombre=?, genero=?, sinopsis=?, anio =?, imagen=?, id_autor_fk=? 
        WHERE libros.id_libro=?");
        $sentencia->execute([$nombre, $genero, $sinopsis, $anio, $pathImg, $autor, $id_libro]);
    }
}