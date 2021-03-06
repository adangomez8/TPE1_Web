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

    public function newCommentary($texto, $puntaje, $idLibro, $idUser){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(texto, puntuacion, id_libro_fk, id_usuario_fk) VALUE (?, ?, ?, ?)");
        $comentario= $sentencia->execute([$texto, $puntaje, $idLibro, $idUser]);

        return $comentario;
    }

    public function getComentsBook($id){
        $sentencia = $this->db->prepare("SELECT comentarios.id_comentario, comentarios.texto, comentarios.puntuacion, 
        comentarios.id_libro_fk, comentarios.id_usuario_fk, usuario.nombre, usuario.apellido 
        FROM comentarios JOIN usuario ON comentarios.id_usuario_fk=usuario.id_usuario WHERE comentarios.id_libro_fk= ?");
        
        $sentencia->execute([$id]);
        $comentario = $sentencia->fetchAll(PDO::FETCH_OBJ); 
        return $comentario;
    }

    public function getById($id){
        $sentencia= $this->db->prepare("SELECT * FROM comentarios WHERE id_usuario_fk = ?");
        $sentencia->execute([$id]);
        $comentarios= $sentencia->fetch(PDO::FETCH_OBJ);

        return $comentarios;
    }

    public function delete($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario = ?");
        $sentencia->execute([$id]);
    }

}