<?php
    require_once('libs/smarty/Smarty.class.php');

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

    public function showError($msg, $user = null) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('user', $user);
        $this->smarty->display('showError.tpl');
    }

    public function optionAdmin(){
        $this->smarty->display('admin.tpl');
    }

    public function formAddBook($id, $error = null){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('error', "$error");
        $this->smarty->display('showFormAddBook.tpl');
    }

    public function showEditBooks($libros, $error = null){
        $this->smarty->assign('info', $libros);
        $this->smarty->assign('error', "$error");
        $this->smarty->display('editBooks.tpl');

    }
    
    public function formEditBook($libro, $autores, $error = null){
        $this->smarty->assign('info', $libro);
        $this->smarty->assign('autor', $autores);
        $this->smarty->assign('error', "$error");
        $this->smarty->display('formEditBook.tpl');
    }
    
    public function formAddauthor($error = null){
        $this->smarty->assign('error', "$error");
        $this->smarty->display('showFormAddAuthor.tpl');
    }
    
    public function showEditAuthor($autores, $error = null){
        $this->smarty->assign('autores', $autores);
        $this->smarty->assign('error', "$error");
        $this->smarty->display('editAuthors.tpl');
    }

    public function addedAuthor($msg){
        $this->smarty->assign('mensaje', $msg);
        $this->smarty->display('succes.tpl');
    }

    public function formEditAuthor($autores, $error = null){
        $this->smarty->assign('autor', $autores);
        $this->smarty->assign('error', "$error");
        $this->smarty->display('formEditAuthor.tpl');
    }
}