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
                {if $libro->imagen}
                <img src="{$libro->imagen}" class="tapaLibro" style="HEIGHT: 400px"/>
                {if $user && $user['admin']=="1"}
                <a href="eliminarImagen/{$libro->id_libro}" class="btn btn-primary">Eliminar imagen </a>
                {/if}
                {else}
                <p> Aún no hay imagen para mostrar </p>
                {/if}
            </div>

        
                <div class="comentarioLibDiv">
                    <form id="formComent" method="POST">
                        <input type="hidden" value="{$user['id_user']}" name="usuario" id="idUser">
                        <input type="hidden" value="{$libro->id_libro}" name="usuario" id="idLibro">
                        <input type="hidden" value="{$user['admin']}" name="usuario" id="administrador">
            {if $user}
                <div>
                            <select name="puntuacion" id="puntuacion">
                                <option value="" selected>Puntuar Libro</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <input type="text" name="comentario" id="comentarioLib" placeholder="Agregar comentario sobre el libro '{$libro->Nombre}'" autocomplete="off">
                        <input type="submit" value="Enviar Comentario" class="btn btn-dark comentario"> 
            {/if}
                </form>
            </div>

        </div>

        {if $user && $user['admin']=="1"}
            <form action='nuevaImagen/{$libro->id_libro}' method="POST" enctype="multipart/form-data">
                <input type="file" name="imagen" id="imageToUpload" class="form-control" >
                <input type="submit" id="imageToUpload" class="form-control" value="Subir imagen">
            </form>
        {/if}
</div>

    <div>
        {include 'vue/comentsOfBook.vue'}
    </div>

<script src="js/comentarios.js"></script>

{include 'templates/footer.tpl'}