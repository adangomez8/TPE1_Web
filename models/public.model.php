<?php

class PublicModel{

    Private function createConection(){
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_libreria';
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    public function showAuthors(){
        //Abro conexión
        $db = $this->createConection();
        $sentencia=$db->prepare("SELECT * FROM autores");
        $sentencia->execute();
        $autores= $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $autores;
    }

    public function showAuthor($nombre){
        //Abro conexión
        $db = $this->createConection();
        $sentencia=$db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, libros.id_libro  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor WHERE id_autor_fk = ?");
        $sentencia->execute([$nombre]);
        $autor= $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $autor;
    }

    public function showBooks(){
        //Abro conexión
        $db = $this->createConection();
        $sentencia=$db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, libros.id_libro  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor");      
        $sentencia->execute();
        $libros= $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $libros;
    }

    public function booksOfAuthor($idAutor){
        //Abro conexión
        $db = $this->createConection();
        $sentencia = $db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, autores.id_autor AS IdAutor,
        libros.id_autor_fk,  libros.id_libro, libros.leido  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor WHERE id_autor_fk = ?"); // prepara la consulta
        $sentencia->execute([$idAutor]); // ejecuta
        $books = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $books;
    }

    public function infoOfBook($idlibro){
        //Abro conexión
        $db = $this->createConection();
        $sentencia = $db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, libros.genero AS Genero, libros.anio AS Anio, libros.imagen AS Foto, libros.id_autor_fk,  libros.id_libro, libros.sinopsis  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor WHERE id_libro = ?"); // prepara la consulta
        $sentencia->execute([$idlibro]); // ejecuta
        $details = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta

        return $details;
    }
}