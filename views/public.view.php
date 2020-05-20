<?php
    require_once('libs/Smarty.class.php');

class PublicView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', "Libros");
    }

    public function showListAuthor($autores){
        $this->smarty->assign('lista',"Lista de autores");
        $this->smarty->assign('ver',"Ver libros del autor");
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('showListAuthor.tpl');
    }

    public function showListBooks($books){
        $this->smarty->assign('lista',"Lista de libros");
        $this->smarty->assign('ver',"Ver más");
        $this->smarty->assign('books', $books);
        $this->smarty->display('showListBooks.tpl');
    }

    public function showListBooksOfAuthor($libros){
        $this->smarty->assign('libros', $libros);
        $this->smarty->display('showListBookOfAuthor.tpl');
    }

    public function showInfoOfBook($libro){
        $this->smarty->assign('titFotLib',"Foto del libro");
        $this->smarty->assign('libro', $libro);
        $this->smarty->display('showInfoOfBook.tpl');
    }

    public function showError($msg) {   
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('titulo', "Libros");
        $this->smarty->display('showError.tpl');
    }

    public function showFormLoginUser($error = null) {
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('error', $error);
        $this->smarty->display('formLoginUser.tpl');
    }
}