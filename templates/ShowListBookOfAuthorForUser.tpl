{include 'navUser.tpl'}
{include 'headerUser.tpl'}
<div class="container">
    
        <table class = "table table-striped table-dark">
            <td class= "titTabla"><h2>Lista de libros de {$libros[0]->Autor}</h2></td>
            <td class= "titTabla"><h2>Ver más</h2></td>
            <td class= "titTabla"><h2>Leido</h2></td>
            <form method="post" action="leido">
                {foreach $libros item=libro}
                        <tr class= "{if $libro->leido}leido{/if}">
                            <td><b>{$libro->Nombre}</b></td>
                            <td><a class="btn btn-outline-success" href="infoLibros/{$libro->id_libro}"><i class="fab fa-readme"></i></a></</td>
                            {if !$libro->leido}
                                <td><a class="btn btn-outline-info" href="leido/{$libro->id_libro}"><i class="fas fa-glasses"></i></a></td>
                            {else}
                            <td><b><i class="btn btn-outline-light fas fa-check-square"></i></b></td>
                            {/if}
                            
                        </tr>
                    {/foreach}
        </form>
        </table>
        
{include 'footer.tpl'}


