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
}