<?php
    require_once('libs/Smarty.class.php');

class AdminView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', "Libros");
    }

    public function showError($msg) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('showError.tpl');
    }

    public function showFormLoginAdmin() {
        $this->smarty->display('formLoginAdmin.tpl');
    }

    public function optionAdmin(){
        $this->smarty->display('admin.tpl');
    }

    public function formAddBook($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('showFormBook.tpl');
    }

    public function showEditBooks($libros){
        $this->smarty->assign('info', $libros);
        $this->smarty->display('editBooks.tpl');

    }

    public function bookdeleted(){
        $this->smarty->display('bookdeleted.tpl');
    }
    
    public function addedBook(){
        $this->smarty->display('addedBook.tpl');
    }
    
    public function formEditBook($libro){
        $this->smarty->assign('id', $libro);
        $this->smarty->display('formEditBook.tpl');
    }
    
    public function formAddauthor(){
        $this->smarty->display('showFormAuthor.tpl');
    }
    
    public function showEditAuthor($autores){
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('editAuthors.tpl');
    }

    public function authordeleted(){
        $this->smarty->display('authordeleted.tpl');
    }    

    public function addedAuthor($nombre){
        $this->smarty->assign('autor', $nombre);
        $this->smarty->display('newAuthor.tpl');
    }

    public function formEditAuthor($libro){
        $this->smarty->assign('id', $libro);
        $this->smarty->display('formEdit.tpl');
    }

}