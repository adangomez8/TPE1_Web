<?php
    require_once('libs/Smarty.class.php');

class AdminView{

    private function encabezado() {
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('titulo', "Libros");
        $smarty->display('navAdmin.tpl');
    }

    public function showError($msg) {   
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('msg', $msg);
        $smarty->assign('titulo', "Libros");
        $smarty->display('showError.tpl');
    }

    public function fomrAdd($id){
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