<?php
    require_once('libs/Smarty.class.php');

class PublicView{

    private function encabezado() {
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('titulo', "Libros");
        $smarty->display('navPublic.tpl');
    }

    public function showListAuthor($autores){
        $this->encabezado();
        $smarty= new Smarty();
        $smarty->assign('lista',"Lista de autores");
        $smarty->assign('ver',"Ver libros del autor");
        $smarty->assign('autores', $autores);
        $smarty->display('showListAuthor.tpl');
    }

    public function showListBooks($books){
        $this->encabezado();
        $smarty= new Smarty();
        $smarty->assign('lista',"Lista de libros");
        $smarty->assign('ver',"Ver más");
        $smarty->assign('books', $books);
        $smarty->display('showListBooks.tpl');
    }

    public function showListBooksOfAuthor($libros){
        $this->encabezado();
        $smarty= new Smarty();
        $smarty->assign('libros', $libros);
        $smarty->display('showListBookOfAuthor.tpl');
    }

    public function showInfoOfBook($libro){
        $this->encabezado();
        $smarty= new Smarty();
        $smarty->assign('titFotLib',"Foto del libro");
        $smarty->assign('libro', $libro);
        $smarty->display('showInfoOfBook.tpl');
    }

    public function showError($msg) {   
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('msg', $msg);
        $smarty->assign('titulo', "Libros");
        $smarty->display('showError.tpl');
    }
}