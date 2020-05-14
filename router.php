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
            $controller->showOption();
        break;
        case 'nuevoLibro':
            $controller = new AdminController();
            $controller->showFormForAgg();
        break;
        case 'editDB':
            $controller = new AdminController();
            $controller->editDB();
        break;
        case 'addBook':
            $controller = new AdminController();
            $controller->addBook();
        break;
        case 'borrarLib':
            $controller = new AdminController();
            $controller->deleteBook($parametros[1]);
        break;
        case 'addAuthor':
            $controller = new AdminController();
            $controller->formAuthor();
        break;
        case 'newAuthor':
            $controller = new AdminController();
            $controller->newAuthor();
        break;
        case 'deleteAuthor':
            $controller = new AdminController();
            $controller->formdeleteAuthor();
        break;
        case 'borrarAutor':
            $controller = new AdminController ();
            $controller->deleteAuthor($parametros[1]);
        break;
        case 'guardarCambios':
            $controller = new AdminController();
            $controller->saveChanges($parametros[1]);
        break;
        case 'modificarLibro':
            $controller = new AdminController();
            $controller->modifyBook($parametros[1]);
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