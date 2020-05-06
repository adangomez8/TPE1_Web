<?php

class HomeView{

    private function encabezado() {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/dbc9074876.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Libros</title>
        </head>
        <body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="home">LIBRERÍA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="mostrarLibros">Todos nuestros libros<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuario">Soy usuario</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="home" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lista de autores
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="librosAutor/0">Action</a>
                    <a class="dropdown-item" href="librosAutor/1">Another action</a>
                    <a class="dropdown-item" href="librosAutor/2">Something else here</a>
                    <a class="dropdown-item" href="librosAutor/3">Something else here</a>
                    <a class="dropdown-item" href="librosAutor/4">Something else here</a>
                    </div>
                </li>
                </ul>
            </div>
            </nav>';
                
        return $html;
    }

    public function showListAuthor($autores){

        echo $this->encabezado();
    
        echo '<div class="container">';

        echo'<table class="table table-striped table-dark">';
        echo '<td><h2>Lista de autores</td>';
        
        foreach($autores as $autor){
            echo '<tr>';
            echo '<td> <a href="librosAutor/'.$autor->id_autor.'">'. $autor->nombre .'</a></td>';
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
        echo '<div class = "row">';
        echo '<table class = "table table-striped table-dark">';
        echo '<td class= "col-xs-7 col-md-7"><h2>Lista de libros</h2></td>';
        echo '<td class= "col-xs-5 col-md-5"><h2>Ver más</h2></td>';
       
        foreach($books as $book){
        echo '<tr>';
        echo '<td>'.$book->nombre.'</td>';
        echo '<td> <a class="btn btn-outline-success" href="infoLibros/'.$book->id_autor_fk.'"><i class="fab fa-readme"></i></a></td>';
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
    
        echo '<div class="container">';
        
        echo '<div class = "row">';
        echo '<table class = "table table-striped table-dark">';
        echo '<td class= "col-xs-7 col-md-7"><h2>Lista de libros del autor</h2></td>';
        echo '<td class= "col-xs-5 col-md-5"><h2>Ver más</h2></td>';

        //                                                      *****************PREGUNTAR********************

        for ($i=0; $i<=array([$libros->id_autor_fk]); $i++){
        echo '<tr>';
        echo '<td><b>'.$libros->nombre.'</b></td>';
        echo '<td><a class="btn btn-outline-success" href="infoLibros/'.$libros->id_autor_fk.'"><i class="fab fa-readme"></i></a></</td>';
        echo '</tr>';
        
        }   
        echo '</div>';
        echo '</ul>';
        echo '  
        </div>          
         </body>
            </html>
            ';
    }

    public function showInfoOfBook($libro){

        echo $this->encabezado();
    
        echo '<div class="container">';

        //                                                      *****************PREGUNTAR********************


        echo '<h2>'. $libro->nombre .'</h2>';
        echo '<li Género>'. $libro->genero .'</li>';
        echo '<li Sinopsis>'. $libro->sinopsis .'</li>';
        echo '<li Año de origen>'. $libro->anio .'</li>';

        echo '  
        </div>          
         </body>
            </html>
            ';
    }
}