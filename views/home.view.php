<?php
    require_once('libs/Smarty.class.php');

class HomeView{

    private function encabezado() {
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('titulo', "Libros");
        $smarty->display('nav.tpl');
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
        echo $this->encabezado();
        $smarty= new Smarty();
        $smarty->assign('lista',"Lista de libros");
        $smarty->assign('ver',"Ver más");
        $smarty->assign('books', $books);
        $smarty->display('showListBooks.tpl');
    }

    public function showListBooksOfAuthor($libros){

        echo $this->encabezado();
        $autor= $libros[0]->Autor;

        echo '<div class="container">';
        
        echo '<div class = "row">';
        echo '<table class = "table table-striped table-dark">';
        echo '<td class= "titTabla"><h2>Lista de libros de '.$autor.'</h2></td>';
        echo '<td class= "titTabla"><h2>Ver más</h2></td>';

        
        foreach ($libros as $libro){
        echo '<tr>';
        echo '<td><b>'.$libro->Nombre.'</b></td>';
        echo '<td><a class="btn btn-outline-success" href="infoLibros/'.$libro->id_libro.'"><i class="fab fa-readme"></i></a></</td>';
        echo '</tr>';
        
        }   
        echo '</table>';
        echo '</div>';
        
        include('templates/footer.tpl');
    }

    public function showInfoOfBook($libro){
        echo $this->encabezado();
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