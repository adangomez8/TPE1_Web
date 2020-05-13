<?php
    require_once 'controllers/public.controller.php';

    // definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // define una acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'home';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);
    //var_dump($parametros); die; // like console.log();

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {
        case 'home':
            $controller = new PublicController();
            $controller->showHome();
        break;   
        case 'librosAutor':
            $controller = new PublicController();
            $controller->showBooksAuthor($parametros[1]);
        break; 
        case 'mostrarLibros':
            $controller = new PublicController();
            $controller->showAllBooks();
        break; 
        case 'infoLibros':
            $controller = new PublicController();
            $controller->infoBooks($parametros[1]);
        break;
        case 'admin':
            $controller = new PublicController();
            $controller->showOption();
        break;
        case 'nuevoLibro':
            $controller = new PublicController();
            $controller->showForm();
        break;
        case 'editDB':
            $controller = new PublicController();
            $controller->editDB();
        break;
        case 'addBook':
            $controller = new PublicController();
            $controller->addBook();
        break;
        case 'borrarLib':
            $controller = new PublicController();
            $controller->deleteBook($parametros[1]);
        break;
        case 'usuario':
            $controller = new PublicController();
            $controller->showUserHome();
        break;
        case 'librosAutorUser':
            $controller = new PublicController();
            $controller->showBooksAuthorUser($parametros[1]);
        break;
        case 'modificarLibro':
            $controller = new PublicController();
            $controller->modifyBook($parametros[1]);
        break;
        case 'guardarCambios':
            $controller = new PublicController();
            $controller->saveChanges($parametros[1]);
        break;
        default:  
            $controller = new PublicController();
            $controller->showError("");
        break;

    }