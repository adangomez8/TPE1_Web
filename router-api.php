<?php
require_once 'libs/router/Router.php';
require_once 'api/public-api.controller.php';

//Creo el ruteador
$router = new Router();

// creo la tabla de ruteo

//AUTORES
$router->addRoute('autores', 'GET', 'PublicApiController', 'getAllAuthors');  //Prueba

//LIBROS
$router->addRoute('libros', 'GET', 'PublicApiController', 'getAllBooks'); //Prueba
$router->addRoute('libro/:ID', 'GET', 'PublicApiController', 'getBooksOfAuthor'); //Prueba

//COMENTARIOS
$router->addRoute('libro/:ID/coment', 'GET', 'PublicApiController', 'getComentsOfBook');
$router->addRoute('libro/:ID/coment', 'POST', 'PublicApiController', 'postComment');
$router->addRoute('comentario/:ID', 'DELETE', 'PublicApiController', 'deleteComent');



//rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);