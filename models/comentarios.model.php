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

    public function getCommentarys() {
        $sentencia = $this->db->prepare("SELECT comentarios.texto, comentarios.puntuacion, comentarios.id_comentario, comentarios.id_libro_fk FROM comentarios ORDER BY comentarios.id_libro_fk ASC");
        $sentencia->execute([]);
        $comentarios= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

    public function deleteCommentary($idCommentario){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario = ?");
        $sentencia->execute([$idCommentario]);
    }

}