{include 'navPublic.tpl'}

<div class="container">';
    <table class = "table table-striped table-dark">
        <div class = "row">
            <td class= "titTabla"><h2>{$lista}</h2></td>
            <td class= "titTabla"><h2>Autor</h2></td>
            <td class= "titTabla"><h2>{$ver}</h2></td>
       
            {foreach $books item=$book}
            <tr>
                <td >{$book->Nombre}</td>
                <td>{$book->Autor}</td>
                <td> <a class="btn btn-outline-success" href="infoLibros/{$book->id_libro}"><i class="fab fa-readme"></i></a></td>
            </tr>
            {/foreach}
        </div>
    </table>
</div>
        
{include 'footer.tpl'}