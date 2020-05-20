<?php

class UserModel{

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

    public function showAuthorsForUser(){
        
        $sentencia=$this->db->prepare("SELECT * FROM autores ORDER BY nombre ASC");
        $sentencia->execute();
        $autores= $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $autores;
    }

    public function booksOfAuthor($idAutor){
        
        $sentencia = $this->db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, autores.id_autor AS IdAutor,
        libros.id_autor_fk,  libros.id_libro, libros.leido  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor WHERE id_autor_fk = ? ORDER BY leido, nombre ASC"); // prepara la consulta
        $sentencia->execute([$idAutor]); // ejecuta
        $books = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $books;
    }

    public function read($idLibro){
        
        $sentencia = $this->db->prepare("UPDATE libros SET leido = 1 WHERE id_libro = ?");
        return $sentencia->execute([$idLibro]);
    }

    public function readedBook($idLibro){
        
        $sentencia = $this->db->prepare("SELECT libros.id_autor_fk FROM libros WHERE id_libro = ? ORDER BY nombre ASC"); 
        $sentencia->execute([$idLibro]);
        return  $sentencia->fetchAll(PDO::FETCH_OBJ); 
    }

}