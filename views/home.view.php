<?php
    require_once('libs/Smarty.class.php');

class HomeView{

    private function encabezado() {
        $smarty = new Smarty();
        $smarty->assign('base_url', BASE_URL);
        $smarty->assign('titulo', "Libros");
        $smarty->display('header.tpl');
    }

    public function showListAuthor($autores){

        echo $this->encabezado();
    
        echo '<div class="container">';

        echo'<table class="table table-striped table-dark tabLisAutores">';
        echo '<td class= "titTabla"><h2>Lista de autores</h2></td>';
        echo '<td class= "titTabla"><h2>Ver libros del autor</h2></td>';
        
        foreach($autores as $autor){
            echo '<tr>';
            echo '<td class="autores"><b>'. $autor->nombre .'</b></td>';
            echo '<td> <a href="librosAutor/'.$autor->id_autor.'"><i class="fab fa-readme btn btn-primary" ></i></a></td>';
            echo '</tr>';
        }
        echo'</table>';
        echo '</div>';
    
        include('templates/footer.tpl');
    }

    public function showListBooks($books){

        echo $this->encabezado();
    
        echo '<div class="container">';
        echo '<table class = "table table-striped table-dark">';
        echo '<div class = "row">';
        echo '<td class= "titTabla"><h2>Lista de libros</h2></td>';
        echo '<td class= "titTabla"><h2>Autor</h2></td>';
        echo '<td class= "titTabla"><h2>Ver más</h2></td>';
       
        foreach($books as $book){
        echo '<tr>';
        echo '<td >'.$book->Nombre.'</td>';
        echo '<td>'.$book->Autor.'</td>';
        echo '<td> <a class="btn btn-outline-success" href="infoLibros/'.$book->id_libro.'"><i class="fab fa-readme"></i></a></td>';
        echo '</tr>';
           
        }
        echo'</table>';
        echo '</div>';
        echo '</div>';
        
        include('templates/footer.tpl');
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

        echo '<div class=" container infoLibro">';
        echo '<h2>'. $libro->Nombre .'</h2>';
        echo '<li><b>Género: </b>'. $libro->Genero .'</li>';
        echo '<li><b>Sinopsis: </b>'. $libro->sinopsis .'</li>';
        echo '<li><b>Año de origen: </b>'. $libro->Anio .'</li>';
        echo'</div>';          
        
        echo '<div class= "container fotoLibro">';
        echo '<h3 class="titFotLib">Foto del libro</h3>';
        echo $libro->Foto;
        echo '</div>';
        //Esto lo puse para cuando podamos subir la foto ya nos quede
        
        include('templates/footer.tpl');
    }
}