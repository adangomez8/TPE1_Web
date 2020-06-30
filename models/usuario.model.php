<?php

class UsuarioModel {
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

    public function getUser($usermail) {
        $sentencia = $this->db->prepare("SELECT usuario.nombre, usuario.apellido, usuario.id_usuario, usuario.mail, usuario.password, usuario.admin FROM usuario WHERE mail = ?");
        $sentencia->execute([$usermail]);
        $usuario= $sentencia->fetch(PDO::FETCH_OBJ);

        return $usuario;
    }

    public function newUser($nombre, $apellido, $mail, $clave_encriptada){
        $sentencia = $this->db->prepare("INSERT INTO usuario(nombre, apellido, mail, password, admin) VALUE (?,?,?,?,?)");
        $sentencia->execute([$nombre, $apellido, $mail, $clave_encriptada, 0]);
    }

    public function getAllUser(){
        $sentencia=$this->db->prepare("SELECT usuario.nombre, usuario.apellido, usuario.id_usuario, usuario.mail, usuario.admin FROM usuario ORDER BY apellido ASC");
        $sentencia->execute();
        $usuarios= $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $usuarios;
    }

    public function giveAdminUser($idUser) {
        $sentencia = $this->db->prepare("UPDATE usuario SET admin = 1 WHERE id_usuario = ?"); 
        $usuario = $sentencia->execute([$idUser]);  

        return $usuario;
     }

     public function removeAdminUser($idUser) {
        $sentencia = $this->db->prepare("UPDATE usuario SET admin = 0 WHERE id_usuario = ?"); 
        $usuario = $sentencia->execute([$idUser]);  

        return $usuario;
     }

    public function deleteUser($idUser){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        $sentencia->execute([$idUser]);
    }
}