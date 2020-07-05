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
$router->addRoute('libro/:ID', 'GET', 'PublicApiController', 'getBooksOfAuthor');

//COMENTARIOS
$router->addRoute('libro/:ID/coment', 'GET', 'PublicApiController', 'getComentsOfBook');
$router->addRoute('comentario', 'GET', 'PublicApiController', 'getComents');  
$router->addRoute('libro/:ID/coment', 'POST', 'PublicApiController', 'postComment');

//USUARIOS NO ADMINISTRADORES

//rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);