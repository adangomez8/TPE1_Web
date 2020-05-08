<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="{$base_url}">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="shortcut icon" href="img/icono.jpg" type="image/x-icon">
            <title>{$titulo}</title>
        </head>
        <body>
            {include 'nav.tpl'}

                <div class= "container text-center divError">
                    <h2>Lo siento! Esta página no está disponible <i class="far fa-sad-tear"></i></h2>
                        <h5>{$msg}</h5>
                        <img src='img/error.jpg'>
                            
                            <div class="text-center"><a class="" href="{$base_url}home">Volver</a></div>

                </div>
            {include 'footer.tpl'}

            
