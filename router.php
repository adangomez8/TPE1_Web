<?php
    require_once 'controllers/public.controller.php';
    require_once 'controllers/admin.controller.php';
    require_once 'controllers/user.controller.php';

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
        case "loginAdmin": 
            $controller = new AdminController();
            $controller->showLoginAdmin();
        break;
        case "verifyAdmin": 
            $controller = new AdminController();
            $controller->verifyAdmin();
        break;
        case 'admin':
            $controller = new AdminController();
            $controller->showOptionAdmin();
        break;
        case 'nuevoLibro':
            $controller = new AdminController();
            $controller->showFormForAggBook();
        break;
        case 'editLibros':
            $controller = new AdminController();
            $controller->editBooks();
        break;
        case 'agregarLibro':
            $controller = new AdminController();
            $controller->addBook();
        break;
        case 'borrarLib':
            $controller = new AdminController();
            $controller->deleteBook($parametros[1]);
        break;
        case 'modificarLibro':
            $controller = new AdminController();
            $controller->modifyBook($parametros[1]);
        break;
        case 'guardarCambiosLib':
            $controller = new AdminController();
            $controller->saveChangesBook($parametros[1]);
        break;
        case 'agregarAutor':
            $controller = new AdminController();
            $controller->showFormForAggAuthor();
        break;
        case 'editAutor':
            $controller = new AdminController();
            $controller->editAuthor();
        break;
        case 'nuevoAutor':
            $controller = new AdminController();
            $controller->addAuthor();
        break;
        case 'borrarAutor':
            $controller = new AdminController ();
            $controller->deleteAuthor($parametros[1]);
        break;
        case 'modificarAutor':
            $controller = new AdminController();
            $controller->modifyAuthor($parametros[1]);
            //AGREGAR FUNCION
        break;
        case 'guardarCambiosAut':
            $controller = new AdminController();
            $controller->saveChangesAuthor($parametros[1]);
            //AGREGAR FUNCION
        break;
        case "loginUser": 
            $controller = new AuthController();
            $controller->showLogin();
        break;
        case "verifyUser": 
            $controller = new AuthController();
            $controller->verify();
        break;
        case 'usuario':
            $controller = new UserController();
            $controller->showUserHome();
        break;
        case 'librosAutorUser':
            $controller = new UserController();
            $controller->showBooksAuthorUser($parametros[1]);
        break;
        case "leido":
            $controller = new UserController();
            $controller->readBook($parametros[1]);
        break;

        default:  
            $controller = new PublicController();
            $controller->showError("");
        break;

    }