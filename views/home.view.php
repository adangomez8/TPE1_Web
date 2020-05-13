<?php
    require_once('libs/Smarty.class.php');

class HomeView{

    private function encabezado() {
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('titulo', "Libros");
        $smarty->display('nav.tpl');
    }

    private function encabezadoUser() {
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('titulo', "Libros");
        $smarty->display('navUser.tpl');
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

    public function fomr($id){
        $this->encabezado();
        $smarty= new Smarty ();
        $smarty->assign('id', $id);
        $smarty->display('showForm.tpl');
    }

    public function option(){
        $this->encabezado();
        $smarty= new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->display('admin.tpl');
    }

    public function showEdit($libros){
        $this->encabezado();
        $smarty= new Smarty();
        $smarty->assign('info', $libros);
        $smarty->display('editDB.tpl');

    }

    public function bookdeleted(){
        $this->encabezado();
        $smarty= new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->display('bookdeleted.tpl');
    }
    
    public function showListAuthorForUser($autores){
        $this->encabezadoUser();
        $smarty= new Smarty();
        $smarty->assign('lista',"Lista de autores");
        $smarty->assign('ver',"Ver libros del autor");
        $smarty->assign('autores', $autores);
        $smarty->display('showListAuthorForUser.tpl');
    }
    
    public function showListBooksOfAuthorUser($libros){
        $this->encabezadoUser();
        $smarty= new Smarty();
        $smarty->assign('libros', $libros);
        $smarty->display('showListBookOfAuthorForUser.tpl');
    }

    public function addedBook(){
        $this->encabezado();
        $smarty= new Smarty ();
        $smarty->assign('base_url', BASE_URL);
        $smarty->display('addedBook.tpl');
    }
    
    public function formEdit($libro){
        $this->encabezado();
        $smarty= new Smarty ();
        $smarty->assign('id', $libro);
        $smarty->display('formEdit.tpl');
    }
}