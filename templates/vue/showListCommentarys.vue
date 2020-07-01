{literal}
<section id="add-comments">
    
        <div>

        <button id="mostrarComen"><li class="list-group-item disabled" aria-disabled="true">Ver comentarios de libros</li></button>
        <table v-if="verCom" class = "table table-striped table-dark">
            <div class = "row">
                <td class= "titTabla"><h2>Libro comentado</h2></td>
                <td class= "titTabla"><h2>comentario</h2></td>
                <td class= "titTabla"><h2>puntuación</h2></td>
                <td class= "titTabla"><h2>Borrar comentario</h2></td>

                <tr v-for="comentario in comentarios">
                    <td >{{ comentario.nombre }}</td>
                    <td>{{ comentario.texto }}</td>
                    <td>{{ comentario.puntuacion }}</td>
                    <td> <a class="btn btn-outline-success" :href="'borrarComentario/'+comentario.id_comentario"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            </div>
        </table>
           
        </div>
    
    </div>
</section>
{/literal}