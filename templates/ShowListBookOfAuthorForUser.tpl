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
                                <td><input type="checkbox" name="libroLeido/{$libro->id_idLibro}"/></td  >
                            {else}
                            <td><b>Libro leido</b></td>
                            {/if}
                            
                        </tr>
                    {/foreach}
        <td></td>
        <td></td>
        <td><input type="submit" class="btn btn-danger mt-2 btnLeido" value="Marcar como leidos"></td>
        </form>
        </table>
        
{include 'footer.tpl'}


