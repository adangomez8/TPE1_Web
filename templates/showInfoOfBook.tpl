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
                {else}
                <p> Aún no hay imagen para mostrar </p>
                {/if}
            </div>
            {if $user}
            <div class="comentarioLibDiv">
                <form id="formComent" method="POST">
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
                    <input type="hidden" value="{$user['id_user']}" name="usuario" id="idUser">
                    <input type="hidden" value="{$libro->id_libro}" name="usuario" id="idLibro">
                    <input type="text" name="comentario" id="comentarioLib" placeholder="Agregar comentario sobre el libro '{$libro->Nombre}'" autocomplete="off">
                    <input type="submit" value="Enviar Comentario" class="btn btn-dark comentario"> 
                </form>
            </div>
            {/if}
        </div>
        <div class="col-md-6">
            {include 'vue/asideBooks.vue'}
        </div>

        {if $user && $user['admin']=="1"}
            <form action='nuevaImagen/{$libro->id_libro}' method="POST" enctype="multipart/form-data">
                <input type="file" name="imagen" id="imageToUpload" class="form-control" >
                <input type="submit" id="imageToUpload" class="form-control" value="Subir imagen">
            </form>
            <form action='eliminarImagen/{$libro->id_libro}' method="POST">
                <input type="hidden" value="{$libro->imagen}" name="delete_file">
                <input type="submit" value="Eliminar imagen">
            </form>
        {/if}
</div>

<script src="js/libros.js"></script>
<script src="js/comentarios.js"></script>
{include 'templates/footer.tpl'}