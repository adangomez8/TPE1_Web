{literal}
<section id="take-comments">
    <div>
        <h2> Promedio= {{ promedio }} </h2>
        <table class = "table table-striped table-dark">
        <div class = "row">
            <td class= "titTabla"><h2>Comentario</h2></td>
            <td class= "titTabla"><h2>Puntuación</h2></td>
            <td v-if="user == 1"class= "titTabla"><h2>Borrar comentario</h2></td>

            <tr v-if="comentario.texto" v-for="comentario in comentarios">
            <td>{{ comentario.texto }}</td>
            <td>{{ comentario.puntuacion }}</td>
            <td> <a v-if="user == 1" v-on:click="deleteComentario(comentario.id_comentario)" class="btn btn-outline-success"><i class="fas fa-trash-alt"></i></a></td> 
            </tr>

        </div>
        </table>

    </div>
</section>
{/literal}