<?php

class AutoresModel {
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

    public function getAll(){
        $sentencia=$this->db->prepare("SELECT * FROM autores ORDER BY nombre ASC");
        $sentencia->execute();
        $autores= $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $autores;
    }

    public function getId(){
        $sentencia = $this->db->prepare("SELECT autores.nombre, autores.id_autor FROM autores");
        //ejecuto sentencia
        $sentencia->execute();
        $autores= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $autores;
    }

    public function newAuthor($nombre, $foto){
        $sentencia= $this->db->prepare("INSERT INTO autores(nombre, foto) VALUE(?,?)");
        $sentencia->execute([$nombre, $foto]);//Ejecuta
    }

    public function getAuthor($id_autor){
        $sentencia= $this->db->prepare("SELECT autores.nombre, autores.foto, autores.id_autor FROM autores WHERE id_autor=?");
        $sentencia->execute([$id_autor]);
        $autor= $sentencia->fetch(PDO::FETCH_OBJ);

        return $autor;
    }

    public function deleteAuthor($idautor){
        $sentencia = $this->db->prepare("DELETE FROM autores WHERE id_autor = ?");
        //ejecuto sentencia
        $sentencia->execute([$idautor]);
    }

    public function updateAuthor($id_autor, $nombre, $foto){
        $sentencia= $this->db->prepare("UPDATE autores SET nombre=?, foto=? WHERE autores.id_autor=?");
        $sentencia->execute([$nombre, $foto, $id_autor]);
    }
}