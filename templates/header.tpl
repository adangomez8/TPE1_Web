<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="{$base_url}">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/dbc9074876.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>{$titulo}</title>
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
            </nav>