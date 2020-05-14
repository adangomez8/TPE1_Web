{include 'navAdmin.tpl'}

<div class= "container admin">
  <h1>Zona de administración</h1>

  <h3> Seleccione la acción que desea realizar </h3>

  <div class= "row">

        <div class= "col-md-6">
            <p class= "paragrbook">Añadir un nuevo libro</p>
            <picture>
                <a href="{$base_url}nuevoLibro"><img src="img/addbook.jpg" alt="Descripción de la imagen" ></a> 
            </picture>
        </div>
        
        <div class= "col-md-6">
            <p class= "pareditbook">Eliminar o editar libros existentes</p>
            <picture>
                <a href="{$base_url}editDB"><img src="img/eddit.png" alt="Descripción de la imagen" ></a> 
            </picture>
        </div>
        
        <div class= "col-md-6">
            <p class= "paragrauth">Agregar un nuevo autor</p>
            <picture>
                <a href="{$base_url}addAuthor"><img src="img/autor.jpg" alt="Descripción de la imagen" ></a> 
            </picture>
        </div>


        <div class= "col-md-6">
            <p class= "pareditauth">Eliminar un autor</p>
            <picture>
              <a href="{$base_url}deleteAuthor"><img src="img/eliminarAutor.jpg" alt="Descripción de la imagen" ></a> 
            </picture>
        </div>
        
    </div>
</div>



{include 'footer.tpl'}