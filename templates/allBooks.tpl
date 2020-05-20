{include 'navAdmin.tpl'}

<div class="container">';
    <table class = "table table-striped table-dark">
        <div class = "row">
            <td class= "titTabla"><h2>Autor</h2></td>
            <td class= "titTabla"><h2>Libro</h2></td>
       
            {foreach $libro item=$libros}
            <tr>
                <td >{$libros->autor}</td>
                <td>{$libros->nombre}</td>
            </tr>
            {/foreach}
        </div>
    </table>
</div>
        
{include 'footer.tpl'}