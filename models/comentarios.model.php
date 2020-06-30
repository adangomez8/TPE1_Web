<?php

class ComentariosModel {
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

    public function newCommentary($comentario, $puntuacion, $libro){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(texto, puntuacion, id_libro_fk) VALUE (?,?,?)");
        $sentencia->execute([$comentario, $puntuacion, $libro]);
    }

}