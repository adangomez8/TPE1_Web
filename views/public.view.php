<?php
    require_once('libs/smarty/Smarty.class.php');

class PublicView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', "Libros");
    }

    public function showListAuthor($autores, $user = null){
        $this->smarty->assign('lista',"Lista de autores");
        $this->smarty->assign('ver',"Ver libros del autor");
        $this->smarty->assign('autores', $autores);
        $this->smarty->assign('user', $user);
        $this->smarty->display('showListAuthor.tpl');
    }

    public function showListBooks($books, $user = null){
        $this->smarty->assign('lista',"Lista de libros");
        $this->smarty->assign('ver',"Ver más");
        $this->smarty->assign('books', $books);
        $this->smarty->assign('user', $user);
        $this->smarty->display('showListBooks.tpl');
    }

    public function showListBooksOfAuthor($libros, $user = null){
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('user', $user);
        $this->smarty->display('showListBookOfAuthor.tpl');
    }

    public function showInfoOfBook($libro, $user = null, $error = null){
        $this->smarty->assign('titulo', 'Libros - '.$libro->Nombre);
        $this->smarty->assign('titFotLib',"Foto del libro");
        $this->smarty->assign('libro', $libro);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('error', $error);
        $this->smarty->display('showInfoOfBook.tpl');
    }

    public function showError($msg, $user = null) {   
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('titulo', "Libros");
        $this->smarty->assign('user', $user);
        $this->smarty->display('showError.tpl');
    }

    public function showFormLoginUser($error = null, $user = null) {
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('user', $user);
        $this->smarty->display('formLoginUser.tpl');
    }

    public function showFormRegister($user = null){
        $this->smarty->assign('user', $user);
        $this->smarty->display('formRegister.tpl');
    }

    public function succesRegister($nombre, $apellido, $user = null){
        $this->smarty->assign('nombre', $nombre);
        $this->smarty->assign('apellido', $apellido);
        $this->smarty->assign('user', $user);
        $this->smarty->display('succesRegister.tpl');
    }
}