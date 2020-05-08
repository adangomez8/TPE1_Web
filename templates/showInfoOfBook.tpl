<div class=" container infoLibro">
    <h2>{$libro->Nombre}</h2>
        <li><b>Género: </b>{$libro->Genero}</li>
        <li><b>Sinopsis: </b>{$libro->sinopsis}</li>
        <li><b>Año de origen: </b>{$libro->Anio}</li>
</div>      
        
<div class= "container fotoLibro">
    <h3 class="titFotLib">{$titFotLib}</h3>
        {$libro->Foto}
</div>

<!--Esto lo puse para cuando podamos subir la foto ya nos quede-->
{include 'templates/footer.tpl'}