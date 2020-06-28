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
        $sentencia = $this->db->prepare("SELECT usuario.nombre, usuario.apellido, usuario.id_usuario, usuario.password FROM usuario WHERE mail = ?");
        $sentencia->execute([$usermail]);
        $usuario= $sentencia->fetch(PDO::FETCH_OBJ);

        return $usuario;
    }

    public function newUser($nombre, $apellido, $mail, $clave_encriptada){
        $sentencia = $this->db->prepare("INSERT INTO usuario(nombre, apellido, mail, password, admin) VALUE (?,?,?,?,?)");
        $sentencia->execute([$nombre, $apellido, $mail, $clave_encriptada, 0]);
    }
}