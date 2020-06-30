{include 'navAdmin.tpl'}
    <div class="container">
        <table class="table table-striped table-dark tabLisUsuarios">
            <td class= "titTabla"><h2>Apellido</h2></td>
            <td class= "titTabla"><h2>Nombre</h2></td>
            <td class= "titTabla"><h2>Mail</h2></td>
            <td class= "titTabla"><h2>Permisos de administración</h2></td>

                {foreach $usuarios item=usuario}
                    <tr>
                        <td class="usuarios"><b>{$usuario->apellido}</b></td>
                        <td class="usuarios"><b>{$usuario->nombre}</b></td>
                        <td class="usuarios">{$usuario->mail}</td>
                        {if !$usuario->admin}
                            
                        <td> <a href="darPermisosAdmin/{$usuario->id_usuario}">Habilitar permisos</i></a></td>
                        
                        {else}
                            <td> <a href="quitarPermisosAdmin/{$usuario->id_usuario}">Quitar permisos</i></a></td>
                        {/if}
                    </tr>
                {/foreach}
        </table>
    </div>
{include 'footer.tpl'}