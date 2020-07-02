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

    public function newCommentary($comentario, $puntuacion, $usuario, $libro){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(texto, puntuacion, usuario, id_libro_fk) VALUE (?,?,?,?)");
        $sentencia->execute([$comentario, $puntuacion, $usuario, $libro]);
    }

    public function getCommentarys() {
        $sentencia = $this->db->prepare("SELECT comentarios.texto, comentarios.puntuacion, comentarios.id_comentario, comentarios.usuario, comentarios.id_libro_fk, libros.id_libro, libros.nombre FROM comentarios JOIN libros ON comentarios.id_libro_fk=libros.id_libro ORDER BY libros.nombre ASC");
        $sentencia->execute([]);
        $comentarios= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

    public function deleteCommentary($idCommentario){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario = ?");
        $sentencia->execute([$idCommentario]);
    }

}