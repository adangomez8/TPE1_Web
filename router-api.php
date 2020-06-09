<?php
require_once 'libs/router/Router.php';
require_once 'api/public-api.controller.php';

//Creo el ruteador
$router = new Router();

// creo la tabla de ruteo

//AUTORES
$router->addRoute('autores', 'GET', 'PublicApiController', 'getAllAuthors');

//LIBROS
$router->addRoute('libros', 'GET', 'PublicApiController', 'getAllBooks');
$router->addRoute('libros/:ID', 'GET', 'PublicApiController', 'getBooksOfAuthor');
$router->addRoute('libros/:ID', 'GET', 'PublicApiController', 'getDetailsOfBook');

//USUARIOS ADMINISTRADORES

//USUARIOS NO ADMINISTRADORES

//rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);