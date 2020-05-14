<?php

class AdminModel{

    Private function createConection(){
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_libreria';
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function showBooks(){
        //Abro conexión
        $db = $this->createConection();
        $sentencia=$db->prepare("SELECT libros.nombre AS Nombre, autores.nombre AS Autor, libros.id_libro  FROM libros JOIN autores ON libros.id_autor_fk=autores.id_autor ORDER BY libros.nombre ASC");      
        $sentencia->execute();
        $libros= $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $libros;
    }

    public function getId(){
        //Abro conexión
        $db= $this->createConection();
        //Pido id a la base de datos
        $sentencia = $db->prepare("SELECT autores.nombre, autores.id_autor FROM autores");
        //ejecuto sentencia
        $sentencia->execute();
        $id= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $id;
    }

    public function getAuthorBook(){
        //Abro conexión
        $db= $this->createConection();
        //Realizo el pedido a la base de datos
        $sentencia= $db->prepare("SELECT autores.id_autor, libros.nombre FROM autores JOIN libros");
        $sentencia->execute();
        $libro= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $libro;
    }

    public function newBook($nombre, $genero, $sinopsis, $anio, $imagen, $autor){
        //Abro conexión
        $db= $this->createConection();

        //Mando datos a la base de datos
        $sentencia= $db->prepare("INSERT INTO libros(nombre, genero, sinopsis, anio, imagen, id_autor_fk) VALUE(?, ?, ?, ?, ?, ?)");
        $sentencia->execute([$nombre, $genero, $sinopsis, $anio, $imagen, $autor]);//Ejecuta
    }

    public function deleteBook($idlibro){
        //Abro conexión
        $db= $this->createConection();
        //Pido id a la base de datos
        $sentencia = $db->prepare("DELETE FROM libros WHERE id_libro = ?");
        //ejecuto sentencia
        $sentencia->execute([$idlibro]);

        //var_dump($id);die;
    }

    public function getBookForEdit($idlibro){
        //Abro conexión
        $db = $this->createConection();
        $sentencia = $db->prepare("SELECT autores.nombre, autores.id_autor FROM autores JOIN libros WHERE id_libro = ? ORDER BY nombre ASC");
        //ejecuto sentencia
        $sentencia->execute([$idlibro]);
    }

    public function updateBook($libro, $nombre, $genero, $sinopsis, $anio, $imagen, $autor){
        //Abro conexión
        $db = $this->createConection();
        $sentencia = $db->prepare("UPDATE libros SET nombre = $nombre, genero = $genero, sinopsis = $sinopsis,  anio = $anio, imagen = $imagen, 
        id_autor_fk = $autor WHERE libro.id_libro = ?");
        $sentencia->execute([$libro]);
    }
}