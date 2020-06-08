 {include 'navAdmin.tpl'}

<div class="container">
    <table class = "table table-striped table-dark">
        <div class = "row">
            {if $error}
                <div class="alert alert-success" role="alert">
                    {$error}
                </div>
            {/if}
            <td class= "titTabla"><h2>Autor</h2></td>
            <td class= "titTabla"><h2>Eliminar</h2></td>
            <td class= "titTabla"><h2>Editar</h2></td>
       
            {foreach $autores item=autor}
            <tr>
                <td >{$autor->nombre}</td>
                <td> <a class="btn btn-outline-danger" href="borrarAutor/{$autor->id_autor}"><i class="fas fa-trash-alt"></i></a></td>
                <td> <a class="btn btn-warning" href="modificarAutor/{$autor->id_autor}"><i class="fas fa-edit"></i></a></td>
            </tr>
            {/foreach}
        </div>
    </table>
</div>
        
{include 'footer.tpl'}