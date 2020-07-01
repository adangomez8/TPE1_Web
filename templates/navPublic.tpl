<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="{$base_url}">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/dbc9074876.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="shortcut icon" href="img/icono.jpg" type="image/x-icon">
            <link rel="stylesheet" href="css/stylePublic.css">
            <!-- development version, includes helpful console warnings -->
            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
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
                </ul>
                <ul class="navbar-nav ml-auto">
                    {if $user && $user['admin']=="1"}
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-danger" href="admin"><i class="fas fa-users-cog"></i>Administración</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary" href="logoutUser"><i class="fas fa-sign-out-alt"></i>Finalizar sesión</a>
                    </li>
                    {/if}
                    {if $user &&  $user['admin']=="0"}
                    <li class="nav-item datosUsuarioNav">
                        <label><i class="fas fa-user"></i> {$user['username']} {$user['usersurname']}</label>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary" href="logoutUser"><i class="fas fa-sign-out-alt"></i>Finalizar sesión</a>
                    </li>
                    {/if}
                    {if !$user}
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-danger" href="loginUser"><i class="fas fa-users-cog"></i>Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-danger" href="registro"><i class="fas fa-users-cog"></i>Registrarse</a>
                    </li>
                    {/if}
                </ul>
            </div>
            </nav>