<?php
    require_once('libs/Smarty.class.php');

class AdminView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', "Libros");
        $userName = HelperAutenticacion::getUserName();
        $this->smarty->assign('username', $userName);
        $userSurname = HelperAutenticacion::getUserSurname();
        $this->smarty->assign('usersurname', $userSurname);
    }

    public function showError($msg) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('showError.tpl');
    }

    public function optionAdmin(){
        $this->smarty->display('admin.tpl');
    }

    public function formAddBook($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('showFormAddBook.tpl');
    }

    public function showEditBooks($libros){
        $this->smarty->assign('info', $libros);
        $this->smarty->display('editBooks.tpl');

    }

    public function bookdeleted($msg){
        $this->smarty->assign('mensaje', $msg);
        $this->smarty->display('succes.tpl');
    }
    
    public function addedBook($msg){
        $this->smarty->assign('mensaje', $msg);
        $this->smarty->display('succes.tpl');
    }
    
    public function formEditBook($libro, $autores){
        $this->smarty->assign('info', $libro);
        $this->smarty->assign('autor', $autores);
        $this->smarty->display('formEditBook.tpl');
    }
    
    public function formAddauthor(){
        $this->smarty->display('showFormAddAuthor.tpl');
    }
    
    public function showEditAuthor($autores){
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('editAuthors.tpl');
    }

    public function authordeleted($msg){
        $this->smarty->assign('mensaje', $msg);
        $this->smarty->display('succes.tpl');
    }    

    public function addedAuthor($msg){
        $this->smarty->assign('mensaje', $msg);
        $this->smarty->display('succes.tpl');
    }

    public function formEditAuthor($autores){
        $this->smarty->assign('autor', $autores);
        $this->smarty->display('formEditAuthor.tpl');
    }

    public function showSuccesChane($msg){
        $this->smarty->assign('mensaje', $msg);
        $this->smarty->display('succes.tpl');
    }

    public function succesEditBook($msg){
        $this->smarty->assign('mensaje', $msg);
        $this->smarty->display('succes.tpl');
    }
}