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

    public function newCommentary($comentario, $puntuacion, $libro, $usuario){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(texto, puntuacion, id_libro_fk, id_usuario_fk) VALUE (?, ?, ?, ?)");
        $sentencia->execute([$comentario, $puntuacion, $libro, $usuario]);
    }

    public function getCommentarys() {
        $sentencia = $this->db->prepare("SELECT comentarios.id_comentario, comentarios.texto, comentarios.puntuacion, 
        comentarios.id_libro_fk, comentarios.id_usuario_fk, libros.id_libro, libros.nombre, usuario.nombre, usuario.apellido 
        FROM comentarios JOIN libros JOIN usuario ON comentarios.id_libro_fk=libros.id_libro && comentarios.id_usuario_fk=usuario.id_usuario 
        ORDER BY libros.nombre ASC");
        $sentencia->execute([]);
        $comentarios= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

    public function deleteCommentary($idCommentario){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario = ?");
        $sentencia->execute([$idCommentario]);
    }

    public function getById($id){
        $sentencia= $this->db->prepare("SELECT comentarios.texto FROM comentarios WHERE id_usuario_fk = ?");
        $sentencia->execute([$id]);
        $comentarios= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

}