{literal}
<section id="add-books">
    
        <div>

           <ul class="list-group" id="listaLibs">
           <button id="mostrarLibs"><li class="list-group-item disabled" aria-disabled="true">Otros libros</li></button>
           <a v-for="libro in libros" class="btn btn-outline-success" href="infoLibros/{{libro.id_libro}}">
           
                <li>{{ libro.Nombre }}</li>
           
           </a>
           
           </ul>
        </div>
    
    </div>
</section>
{/literal}