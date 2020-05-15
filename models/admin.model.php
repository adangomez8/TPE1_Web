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
    }

    public function getBookForEdit($idlibro){
        //Abro conexión
        $db = $this->createConection();
        $sentencia = $db->prepare("SELECT libros.nombre, libros.id_libro FROM libros WHERE id_libro = ?");
        //ejecuto sentencia
        $sentencia->execute([$idlibro]);
        $libro= $sentencia->fetch(PDO::FETCH_OBJ);

        return $libro;
    }

    public function updateBook($id_libro, $nombre, $genero, $sinopsis, $anio, $imagen, $autor){
        //Abro conexión
        $db = $this->createConection();
        $sentencia = $db->prepare("UPDATE libros SET nombre=?, genero=?, sinopsis=?, anio =?, imagen=?, id_autor_fk=? 
        WHERE libros.id_libro=?");
        $sentencia->execute([$nombre, $genero, $sinopsis, $anio, $imagen, $autor, $id_libro]);
    }

    public function getAuthors(){
        //Abro conexión
        $db = $this->createConection();

        //Pido a base de datos los autores
        $sentencia= $db->prepare("SELECT autores.nombre, autores.id_autor FROM autores");
        $sentencia->execute(); //Ejecuto
        $autores= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $autores;
    }

    public function createAuthor($nombre, $foto){
        //Abro conexión
        $db = $this->createConection();

        //Mando datos a la base de datos
        $sentencia= $db->prepare("INSERT INTO autores(nombre, foto) VALUE(?,?)");
        $sentencia->execute([$nombre, $foto]);//Ejecuta
    }

    public function checkBook($idautor){
        //Abro conexión
        $db = $this->createConection();

        $sentencia= $db->prepare("SELECT autores.nombre, libros.nombre FROM autores JOIN libros WHERE id_autor_fk=?");
        $sentencia->execute([$idautor]);
        $libro= $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $libro;
    }

    public function authorDelete($idautor){
        //Abro conexión
        $db = $this->createConection();

        $sentencia = $db->prepare("DELETE FROM autores WHERE id_autor = ?");
        //ejecuto sentencia
        $sentencia->execute([$idautor]);
    }

    public function getAuthor($id_autor){
        //Abro conexión
        $db = $this->createConection();

        $sentencia= $db->prepare("SELECT autores.nombre, autores.id_autor FROM autores WHERE id_autor=?");
        $sentencia->execute([$id_autor]);
        $autor= $sentencia->fetch(PDO::FETCH_OBJ);

        return $autor;
    }

    public function updateAuthor($id_autor, $nombre, $foto){
        //Abro conexión
        $db = $this->createConection();

        $sentencia= $db->prepare("UPDATE autores SET nombre=?, foto=? WHERE autores.id_autor=?");
        $sentencia->execute([$nombre, $foto, $id_autor]);
    }
}