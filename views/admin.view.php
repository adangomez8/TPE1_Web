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

    public function fomrAdd($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('showForm.tpl');
    }

    public function option(){
        $this->smarty->display('admin.tpl');
    }

    public function showEdit($libros){
        $this->smarty->assign('info', $libros);
        $this->smarty->display('editDB.tpl');

    }

    public function bookdeleted(){
        $this->smarty->display('bookdeleted.tpl');
    }
    
    public function addedBook(){
        $this->smarty->display('addedBook.tpl');
    }
    
    public function formEdit($libro){
        $this->smarty->assign('id', $libro);
        $this->smarty->display('formEdit.tpl');
    }
}