{include 'navPublic.tpl'}

<div class="container">
    <table class="table table-striped table-dark tabLisAutores">
        <td class= "titTabla"><h2>{$lista}</h2></td>
        <td class= "titTabla"><h2>{$ver}</h2></td>

            {foreach $autores item=autor}
                <tr>
                    <td class="autores"><b>{$autor->nombre}</b></td>
                    <td> <a href="librosAutor/{$autor->id_autor}"><i class="fab fa-readme btn btn-primary" ></i></a></td>
                </tr>
            {/foreach}
    </table>
</div>

{include 'footer.tpl'}