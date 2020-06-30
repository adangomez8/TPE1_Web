{include 'navPublic.tpl'}

<div class=" container infoLibro">
    <h2>{$libro->Nombre}</h2>
        <li><b>Género: </b>{$libro->Genero}</li>
        <li><b>Sinopsis: </b>{$libro->sinopsis}</li>
        <li><b>Año de origen: </b>{$libro->Anio}</li>
</div>      
        
<div class= "container fotoLibro">
    <div class="row" style="HEIGHT: 100%">
        <div class="col-md-6">
            <div>
                <h3 class="titFotLib">{$titFotLib}</h3>
                <img src="{$libro->imagen}" class="tapaLibro" style="HEIGHT: 400px"/>
            </div>
            <div class="comentarioLibDiv">
                <form action="enviarComentario/{$libro->id_libro}" method="POST">
                    <div>
                        <select name="puntuacion" id="">
                            <option value="" selected>Puntuar Libro</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <input type="text" name="comentario" id="comentarioLib" placeholder="Agregar comentario sobre el libro '{$libro->Nombre}'" autocomplete="off">
                    <div class="btn btn-dark btnEnviarComLib"><input type="submit" value="Enviar Comentario" class="btn btn-dark comentario"> <i class="fas fa-paper-plane btn btn-dark"></i></div>
                </form>
            </div>
            <div>
                {if $error}
                    <div class="alert alert-warning" role="alert">
                        {$error}
                    </div>
                {/if}
            </div>
        </div>
        <div class="col-md-6">

           <ul class="list-group" id="listaLibs">
           <button id="mostrarLibs"><li class="list-group-item disabled" aria-disabled="true">Otros libros de {$libro->Autor}</li></button>
           </ul>
        </div>
    
    </div>
</div>

<script src="js/libros.js"></script>
{include 'templates/footer.tpl'}