{include 'navPublic.tpl'}

<div class=" container infoLibro">
    <h2>{$libro->Nombre}</h2>
        <li><b>Género: </b>{$libro->Genero}</li>
        <li><b>Sinopsis: </b>{$libro->sinopsis}</li>
        <li><b>Año de origen: </b>{$libro->Anio}</li>
</div>      
        
<div class= "container fotoLibro">
    <h3 class="titFotLib">{$titFotLib}</h3>
    {if isset($libro->imagen)}
        <img scr="{$libro->imagen}"/>
    {/if}
</div>


{include 'templates/footer.tpl'}