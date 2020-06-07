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
        $sentencia = $this->db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, libros.genero AS Genero, libros.anio AS Anio, libros.imagen AS Foto, libros.id_autor_fk,  libros.id_libro, libros.sinopsis  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor WHERE id_libro = ?"); // prepara la consulta
        $sentencia->execute([$idlibro]); // ejecuta
        $details = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta

        return $details;
    }

}