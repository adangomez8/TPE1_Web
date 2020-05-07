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

        echo'<table class="table table-striped table-dark">';
        echo '<td><h2>Lista de autores</td>';
        echo '<td>Ver libros del autor</td>';
        
        foreach($autores as $autor){
            echo '<tr>';
            echo '<td>'. $autor->nombre .'</td>';
            echo '<td> <a href="librosAutor/'.$autor->id_autor.'"><i class="fab fa-readme btn btn-primary" ></i></a></td>';
            echo '</tr>';
        }
        echo'</table>';
        echo '</div>';

        echo '  
        </div>          
         </body>
            </html>
            ';
    }

    public function showListBooks($books){

        echo $this->encabezado();
    
        echo '<div class="container">';
        echo '<table class = "table table-striped table-dark">';
        echo '<div class = "row">';
        echo '<td ><h2>Lista de libros</h2></td>';
        echo '<td><h2>Autor</h2></td>';
        echo '<td><h2>Ver más</h2></td>';
       
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
        echo '  
        </div>          
         </body>
            </html>
            ';
    }

    public function showListBooksOfAuthor($libros){

        echo $this->encabezado();
        $autor= $libros[0]->Autor;

        echo '<div class="container">';
        
        echo '<div class = "row">';
        echo '<table class = "table table-striped table-dark">';
        echo "<td><h2>Lista de libros de '{$autor}'</h2></td>";
        echo '<td><h2>Ver más</h2></td>';

        
        foreach ($libros as $libro){
        echo '<tr>';
        echo '<td><b>'.$libro->Nombre.'</b></td>';
        echo '<td><a class="btn btn-outline-success" href="infoLibros/'.$libro->id_libro.'"><i class="fab fa-readme"></i></a></</td>';
        echo '</tr>';
        
        }   
        echo '</table>';
        echo '</div>';
        echo '  
        </div>          
         </body>
            </html>
            ';
    }

    public function showInfoOfBook($libro){

        echo $this->encabezado();
    
        echo '<div class="container">';

        
        echo '<h2>'. $libro->Nombre .'</h2>';
        echo '<li Género>'. $libro->Genero .'</li>';
        echo '<li Sinopsis>'. $libro->sinopsis .'</li>';
        echo '<li Año de origen>'. $libro->Anio .'</li>';

        echo '  
        </div>          
         </body>
            </html>
            ';
    }
}