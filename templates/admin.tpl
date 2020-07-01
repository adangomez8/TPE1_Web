{include 'navAdmin.tpl'}

<div class= "container admin">
  <div class="class-md-6">  
    <div>
      <h1>Zona de administración</h1>
    </div>
    <div>
      <a href="todosUsers">Ver todos los usuarios</a>
    </div>
    <div>
      {include 'vue/showListCommentarys.vue'}
    </div>
  <h3> Seleccione la acción que desea realizar </h3>
  </div>
  


<div class="container">
  <div class= "row">


        <div class= "col-md-12">
            <p class= "paragrbook">Añadir un nuevo libro</p>
            <picture>
                <a href="{$base_url}nuevoLibro"><img src="img/addbook.jpg" alt="Descripción de la imagen" ></a> 
            </picture>
        </div>
        
        <div class= "col-md-12">
            <p class= "pareditbook">Eliminar o editar libros existentes</p>
            <picture>
                <a href="{$base_url}editLibros"><img src="img/eddit.png" alt="Descripción de la imagen" ></a> 
            </picture>
        </div>
        
        <div class= "col-md-12">
            <p class= "paragrauth">Agregar un nuevo autor</p>
            <picture>
                <a href="{$base_url}agregarAutor"><img src="img/autor.jpg" alt="Descripción de la imagen" ></a> 
            </picture>
        </div>

        <div class= "col-md-12">
            <p class= "pareditauth">Eliminar o editar autores existentes</p>
            <picture>
              <a href="{$base_url}editAutor"><img src="img/eliminarAutor.jpg" alt="Descripción de la imagen" ></a> 
            </picture>
        </div>
        
    </div>
</div>
</div>

<script src="js/comentarios.js"></script>