<?php
    require_once('libs/Smarty.class.php');

class UserView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
    }//navUser

    public function showError($msg) {   
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('titulo', "Libros");
        $this->smarty->display('showError.tpl');
    }

    public function showFormLoginUser() {
        $this->smarty->display('formLoginUser.tpl');
    }
    
    public function showListAuthorForUser($autores){
        $this->smarty->assign('lista',"Lista de autores");
        $this->smarty->assign('ver',"Ver libros del autor");
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('showListAuthorForUser.tpl');
    }
    
    public function showListBooksOfAuthorUser($libros){
        $this->smarty->assign('libros', $libros);
        $this->smarty->display('showListBookOfAuthorForUser.tpl');
    }
}