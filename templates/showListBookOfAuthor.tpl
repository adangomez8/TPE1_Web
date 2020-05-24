{include 'navPublic.tpl'}

<div class="container">
    
    <div class = "row">
        <table class = "table table-striped table-dark">
            <td class= "titTabla"><h2>Lista de libros de {$libros[0]->Autor}</h2></td>
            <td class= "titTabla"><h2>Ver más</h2></td>

                {foreach $libros item=libro}
                    <tr>
                        <td><b>{$libro->Nombre}</b></td>
                        <td><a class="btn btn-outline-success" href="infoLibros/{$libro->id_libro}"><i class="fab fa-readme"></i></a></</td>
                    </tr>
                {/foreach}
        </table>
    </div>
        
{include 'footer.tpl'}