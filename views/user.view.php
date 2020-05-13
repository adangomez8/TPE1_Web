<?php
    require_once('libs/Smarty.class.php');

class UserView{

    private function encabezadoUser() {
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('titulo', "Libros");
        $smarty->display('navUser.tpl');
    }

    public function showError($msg) {   
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('msg', $msg);
        $smarty->assign('titulo', "Libros");
        $smarty->display('showError.tpl');
    }

    public function showFormLoginUser() {
        $this->encabezadoUser();
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->display('formLoginUser.tpl');
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
}