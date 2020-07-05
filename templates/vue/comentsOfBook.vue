{literal}
<section id="take-comments">
    <div>
        <table class = "table table-striped table-dark">
        <div class = "row">
            <td class= "titTabla"><h2>Comentario</h2></td>
            <td class= "titTabla"><h2>Puntuación</h2></td>
            <td v-if="user == 1"class= "titTabla"><h2>Borrar comentario</h2></td>

            <tr v-for="comentario in comentarios">
            <td>{{ comentario.texto }}</td>
            <td>{{ comentario.puntuacion }}</td>
            <td> <a v-if="user == 1" class="btn btn-outline-success" :href="'borrarComentario/'+comentario.id_comentario"><i class="fas fa-trash-alt"></i></a></td> 
            </tr> <!--v-onclick-->
            </div>
        </table>

    </div>
</section>
{/literal}