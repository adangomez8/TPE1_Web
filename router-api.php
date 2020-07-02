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
$router->addRoute('comentarios', 'GET', 'PublicApiController', 'getAllCommentarys');
$router->addRoute('comentario/:ID', 'GET', 'PublicApiController', 'getComent');  //HACER

//USUARIOS NO ADMINISTRADORES

//rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);